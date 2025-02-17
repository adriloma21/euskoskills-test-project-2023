<?php

require_once "model/Usuario.php";

class UsuarioController {
    public $page_title;
    public $page_description;
    public $view;
    public $model;
    public $areaModel;

    public function __construct(){
        $this -> view = "login";
        $this -> page_title="Login de Usuarios";
        $this -> model = new Usuario();
    }

    public function login() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $usuario = $_POST['usuario'];
            $password = $_POST['password'];

            $usuarioModel = new Usuario();
            $usuarioData = $usuarioModel->getUsuarioByNombre($usuario);

            if ($usuarioData && password_verify($password, $usuarioData['password'])) {
                session_start();
                $_SESSION['admin'] = $usuarioData;
                header("Location: index.php?controller=admin&action=dashboard");
            } else {
                $error = "Usuario o contraseña incorrectos";
                print_r($error);
                die();
            }
        } else {
        }
    }

    public function register() {
        $usuario = "admin";
        $password = password_hash("secreto", PASSWORD_BCRYPT);

        $usuarioData = $this->model->getUsuarioByNombre($usuario);

        if (!$usuarioData) {
            $this->model->registerUsuario($usuario, $password);
            echo "Usuario registrado correctamente.";
        } else {
            echo "El usuario ya existe.";
        }
    }
}