<?php
class View {
    public function ShowPeliculas($peliculas, $directores) {
        require './templates/header.phtml';
        require './templates/peliculas.phtml';
        require './templates/footer.phtml';
    }
    public function ShowPeliculasDestacadas($peliculasDestacadas){
        require './templates/header.phtml';
        require './templates/home.phtml';
        require './templates/footer.phtml';
    }
    public function ShowDetalle($pelicula){
        require './templates/header.phtml';
        require './templates/detallePeliculas.phtml';
        require './templates/footer.phtml';
     }
     public function showError($mensaje){
        require './templates/header.phtml';
        require './templates/error404.phtml';
        require './templates/footer.phtml';
    }
    public function showForm($pelicula=null){
        require './templates/header.phtml';
        require './templates/peliculaForm.phtml';
        require './templates/footer.phtml';
    }
}
?>