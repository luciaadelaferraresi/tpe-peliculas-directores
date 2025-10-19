<?php
require_once "app/views/view.php";

class ErrorController {
    private $view;

    public function __construct() {
        $this->view = new View();
    }

    
    public function showError($mensaje = "Ocurrió un error inesperado") {
        $this->view->showError($mensaje);
    }

    
    public function show404() {
        $this->view->showError("Error 404 - Página no encontrada");
    }

    
    public function showPermissionError() {
        $this->view->showError("No tenés permiso para acceder a esta página");
    }
}