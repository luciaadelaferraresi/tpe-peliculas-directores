<?php
require_once __DIR__ . '/../models/DirectorModel.php';
require_once __DIR__ . '/../views/DirectorView.php';
class DirectorController
{
    private $model;
    private $view;
    private $errorView;

    public function __construct()
    {
        $this->model = new DirectorModel();
        $this->view = new DirectorView();
        $this->errorView = new View();
    }

    public function showDirectores()
    {
        $directores = $this->model->GetDirectores();
        $this->view->ShowDirectores($directores);
    }

    public function showDirectorById($id)
    {
        $director = $this->model->GetDirector($id);
        if ($director) {
            $this->view->ShowDetalleDir($director);
        } else {
            $this->errorView->showError("El director no existe");
        }
    }

    public function addDirector()
    {
        if (!isset($_POST['nombre']) || empty($_POST['nombre'])) {
            return $this->errorView->showError('Falta completar el titulo');
        }
        if (!isset($_POST['nacionalidad']) || empty($_POST['nacionalidad'])) {
            return $this->errorView->showError('Falta completar la nacionalidad');
        }

        $nombre =  $_POST['nombre'];
        $nacionalidad =  $_POST['nacionalidad'];


        $this->model->InsertDirector($nombre, $nacionalidad);
        header("Location: " . BASE_URL . "directores");
        exit();
    }

    public function showForm($id = null)
    {
        $director = null;
        if ($id) {
            $director = $this->model->GetDirector($id);
        }
        $this->view->showForm($director);
    }

    public function updateDirector($id)
    {
        $nombre = $_POST['nombre'];
        $nacionalidad = $_POST['nacionalidad'];


        $this->model->updateDirector($id, $nombre, $nacionalidad);
        header("Location: " . BASE_URL . "directores");
        exit();
    }

    public function deleteDirector($id)
    {
        $this->model->deleteDirector($id);
        header("Location: " . BASE_URL . "directores");
        exit();
    }
}
