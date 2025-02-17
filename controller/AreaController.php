<?php
require_once "model/Mujer.php";

class AreaController{
    public $page_title;
    public $page_description;
    public $view;
    public $model;

    public function __construct(){
        $this -> view = "list";
        $this -> page_title="";
        $this -> page_description="";
        $this -> model = new Area();
    }

    public function list() {
        $this -> page_title = "Listado de Áreas";
        $this -> page_description = "En esta pagina se listan todas las áreas de la base de datos.";
        return [
            'areas' => $this -> model -> getAreas()
        ];
    }
}
