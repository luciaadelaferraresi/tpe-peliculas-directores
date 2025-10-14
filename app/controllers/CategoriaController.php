<?php 
require_once __DIR__ . '/../models/CategoriaModel.php';
require_once __DIR__ . '/../views/CategoriaView.php';
class DirectorController{
    private $model;
    private $view;

    public function __construct()
    {
        $this->model= new ListaDirModel();
        $this->view= new ViewDir();
    }

    public function showDirectores(){
        $directores = $this->model->GetDirectores();
        $this->view->ShowDirectores($directores);
    }

    public function showDirectorById($id){
        $director= $this->model->GetDirector($id);
        if($director){
            $this->view->ShowDetalleDir($director);
        } else {
            $this->view->showError("El director no existe");
        }
    }

    public function addDirector(){
        if(!isset($_POST['nombre']) || empty($_POST['nombre'])){
            return $this->view->showError('Falta completar el titulo');
        }

        $nombre =  $_POST['nombre'];

        $this->model->InsertDirector($nombre);
        header("Location: " . BASE_URL . "peliculas");
        exit();
    }

    public function showForm($id=null){
        $director = null;
        if($id){
            $director = $this->model->GetDirector($id);
        }
        $this->view->showForm($director);
    }

    public function updateDirector($id){
        $nombre = $_POST['nombre'];

        $this->model->updateDirector($id, $nombre);
        header("Location: " . BASE_URL . "directores");
        exit();
    }
    
    public function deleteDirector($id){
        $this->model->deleteDirector($id);
        header("Location: " . BASE_URL . "directores");
        exit();
    }
}