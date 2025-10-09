<?php
require_once __DIR__ . '/../models/ItemModel.php';
require_once __DIR__ . '/../views/ItemsView.php';
class PeliculaController{
    private $model;
    private $view;
   
    public function __construct(){
        $this->model= new ListaModel();
        $this->view= new View();
      
    }
    public function showPeliculas(){
        $peliculas= $this->model->GetPeliculas();
        $this->view->ShowPeliculas($peliculas);
    }
    public function showHome(){
        $destacadas = $this->model->GetPeliculasDestacadas(); 
        $this->view->ShowPeliculasDestacadas($destacadas);
    }
    public function showPeliculaById($id){
        $pelicula= $this->model->GetPelicula($id);
        if ($pelicula) {
         $this->view->ShowDetalle($pelicula);
        } else {
           $this->view->showError("La pelicula no existe");
        }
      
    }
    public function addPelicula(){
      
        if (!isset($_POST['titulo']) || empty($_POST['titulo'])) {
            return $this->view->showError('Falta completar el título');
        }
    
        if (!isset($_POST['anio']) || empty($_POST['anio'])) {
            return $this->view->showError('Falta completar el año');
        }

    

        $titulo = $_POST['titulo'];
       $anio = $_POST['anio'];
       $duracion = $_POST['duracion'];       
       $id_director = $_POST['director']??1;  
       

        $this->model->InsertPelicula($titulo, $anio, $duracion, $id_director);
         header("Location: " . BASE_URL . "peliculas");
         exit();
    }
    public function showForm($id=null){
        $pelicula = null;
        if ($id) {
            $pelicula = $this->model->GetPelicula($id);
           
        }
        $this->view->showForm($pelicula);
    }
    public function updatePelicula($id){
        $titulo = $_POST['titulo'];
        $anio = $_POST['anio'];
     
     $this->model->updatePelicula($id, $titulo, $anio);
     header("Location: " . BASE_URL . "peliculas");
     exit();
    }
    public function deletePelicula($id) {
        $this->model->deletePelicula($id);
        header("Location: " . BASE_URL . "peliculas");
        exit();
    }

}

?>