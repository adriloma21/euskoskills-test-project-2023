<?php

require_once "model/Usuario.php";
require_once "model/Mujer.php";

class AdminController {
    public $page_title;
    public $page_description;
    public $view;
    public $model;
    public $mujerModel;

    public function __construct(){
        $this -> view = "dashboard";
        $this -> page_title="Administracion del Sitio";
        $this -> model = new Usuario();
        $this -> mujerModel = new Mujer();
    }

    public function dashboard() {
        session_start();
        if (!isset($_SESSION['admin'])) {
            header("Location: index.php?controller=usuario&action=login");
            exit();
        }

        $mujeres = $this->mujerModel->getMujeres();

        $dataToView = [
            'mujeres' => $mujeres
        ];

        return $dataToView;
    }

    public function logout() {
        session_start();
        session_destroy();
        header("Location: index.php?controller=usuario&action=login");
    }
}