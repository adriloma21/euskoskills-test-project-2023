<?php
require_once "model/Mujer.php";
require_once "model/Area.php";

class MujerController{
    public $page_title;
    public $page_description;
    public $view;
    public $model;
    public $areaModel;

    public function __construct(){
        $this -> view = "list";
        $this -> page_title="";
        $this -> page_description="";
        $this -> model = new Mujer();
        $this -> areaModel = new Area();
    }

    public function list($area = null) {
        $this -> page_title = "Listado de Mujeres";
        $this -> page_description = "En esta pagina se listan todas las mujeres de la base de datos.";
        
        $area = isset($_GET['area']) ? $_GET['area'] : null;

        $areas = $this -> areaModel -> getAreas();
        $mujeres = $area ? $this -> model -> getMujeresByArea($area) : $this -> model -> getMujeres();
        
        $dataToView = [
            'areas' => $areas,
            'mujeres' => $mujeres
        ];
        
        return $dataToView;
    }

    public function search() {
        $this->page_title = "Buscar Mujeres";
        $this->page_description = "Resultados de la búsqueda de mujeres.";
        
        $keyword = isset($_GET['keyword']) ? $_GET['keyword'] : '';
        $mujeres = $this->model->searchMujeres($keyword);
        
        $dataToView = [
            'mujeres' => $mujeres
        ];
        
        return $dataToView;
    }

    public function edit() {
        $this->view = "edit";
        $this->page_title = "Editar Mujer";
    
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $params = [
                'id' => $_POST['id'],
                'nombre' => $_POST['nombre'],
                'apellidos' => $_POST['apellidos'],
                'nacimiento' => $_POST['nacimiento'],
                'defuncion' => $_POST['defuncion'],
                'nacionalidad' => $_POST['nacionalidad'],
                'area' => $_POST['area'],
                'enlace' => $_POST['enlace'],
                'fotografia' => $_POST['fotografia'],
                'descripcion' => $_POST['descripcion']
            ];
            $this->model->updateMujer($params);
    
            // Redirigir al dashboard del admin
            header("Location: index.php?controller=admin&action=dashboard");
            exit(); // Asegúrate de usar exit después de header para evitar la ejecución de código posterior.
        } else {
            $id = $_GET['id'];
            $mujer = $this->model->getMujerById($id);
            $dataToView = [
                'data' => $mujer
            ];
        }
    
        return $dataToView;
    }

    public function delete() {
            $id = $_GET['id'];
            $this->model->deleteMujer($id);
            header("Location: index.php?controller=admin&action=dashboard");
    }

    public function create() {
        $this->view = "create";
        $this->page_title = "Crear Mujer";
    
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $fotografia = '';
            if (isset($_FILES['fotografia']) && $_FILES['fotografia']['error'] === UPLOAD_ERR_OK) {
                $uploadDir = 'recursos/images/';
                $uploadFile = $uploadDir . basename($_FILES['fotografia']['name']);
                if (move_uploaded_file($_FILES['fotografia']['tmp_name'], $uploadFile)) {
                    $fotografia = $_FILES['fotografia']['name'];
                }
            }
    
            $params = [
                'nombre' => $_POST['nombre'],
                'apellidos' => $_POST['apellidos'],
                'nacimiento' => $_POST['nacimiento'],
                'defuncion' => $_POST['defuncion'],
                'nacionalidad' => $_POST['nacionalidad'],
                'area' => $_POST['area'],
                'enlace' => $_POST['enlace'],
                'fotografia' => $fotografia,
                'descripcion' => $_POST['descripcion']
            ];
            $this->model->createMujer($params);
    
            header("Location: index.php?controller=admin&action=dashboard");
            exit();
        } else {
            $areas = $this->areaModel->getAreas();
            $dataToView = [
                'areas' => $areas
            ];
        }
    
        return $dataToView;
    }

    public function juego() {
        $this->view = "juego";
        $this->page_title = "Juego de Asociación";
    
        $mujeres = $this->model->getRandomMujeres(10);
        $areas = $this->areaModel->getAreas();
    
        $dataToView = [
            'mujeres' => $mujeres,
            'areas' => $areas
        ];
    
        return $dataToView;
    }

    public function asociar() {

       return json_encode( $this->model->getRandomMujeres(10));
    }
}