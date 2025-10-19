<?php
require_once __DIR__ . '/../models/PeliculaModel.php';
require_once __DIR__ . '/../models/DirectorModel.php';
require_once __DIR__ . '/../views/PeliculaView.php';
require_once __DIR__ . '/../views/view.php';
require_once __DIR__ . '/../controllers/errorController.php';
class PeliculaController
{
    private $model;
    private $modelD;
    private $view;
    private $errorView;

    public function __construct()
    {
        $this->model = new PeliculaModel();
        $this->modelD = new DirectorModel();
        $this->view = new PeliculaView();
        $this->errorView = new errorController();
    }
    private function checkLogin()
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        if (empty($_SESSION['EMAIL_USER'])) {
            $this->errorView->showPermissionError();
            exit();
        }
    }
    public function showPeliculas()
    {
        $peliculas = $this->model->GetPeliculas();
        $directores = $this->modelD->GetDirectores();
        $this->view->ShowPeliculas($peliculas, $directores);
    }
    public function showPeliculaById($id)
    {
        $pelicula = $this->model->GetPelicula($id);
        if ($pelicula) {
            $this->view->ShowDetalle($pelicula);
        } else {
            $this->errorView->showError("La pelicula no existe");
        }
    }
    public function showPeliculaByDirector($id)
    {
        $peliculas = $this->model->GetPeliculasByDirector($id);
        $directores = $this->modelD->GetDirectores();
        return $this->view->showPeliculas($peliculas, $directores);
    }

    public function addPelicula()
    {
        $this->checkLogin();
        if (!isset($_POST['titulo']) || empty($_POST['titulo'])) {
            return $this->errorView->showError('Falta completar el título');
        }

        if (!isset($_POST['anio']) || empty($_POST['anio'])) {
            return $this->errorView->showError('Falta completar el año');
        }

        if (!isset($_POST['duracion']) || empty($_POST['duracion'])) {
            return $this->errorView->showError('Falta completar la duracion');
        }



        $titulo = $_POST['titulo'];
        $anio = $_POST['anio'];
        $duracion = $_POST['duracion'];
        $id_director = $_POST['director'] ?? 1;


        $this->model->InsertPelicula($titulo, $anio, $duracion, $id_director);
        header("Location: " . BASE_URL . "peliculas");
        exit();
    }
    public function showForm($id = null)
    {
        $this->checkLogin();
        $pelicula = null;
        if ($id) {
            $pelicula = $this->model->GetPelicula($id);
        }
        $directores = $this->modelD->GetDirectores();
        $this->view->showForm($pelicula, $directores);
    }
    public function updatePelicula($id)
    {
        $this->checkLogin();
      if (
        empty($_POST['titulo']) ||
        empty($_POST['anio']) ||
        empty($_POST['duracion']) ||
        empty($_POST['director'])
    ) {
        return $this->errorView->showError("Faltan datos para actualizar la película");
    }
        $titulo = $_POST['titulo'];
        $anio = $_POST['anio'];
         $duracion = $_POST['duracion'];
         $id_director = $_POST['director'];

        $this->model->updatePelicula($id, $titulo, $anio,$duracion,$id_director);
        header("Location: " . BASE_URL . "peliculas");
        exit();
    }
    public function deletePelicula($id)
    {
        $this->checkLogin();
        $this->model->deletePelicula($id);
        header("Location: " . BASE_URL . "peliculas");
        exit();
    }
}
