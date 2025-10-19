<?php
class PeliculaView
{
    public function ShowPeliculas($peliculas, $directores)
    {
        require './templates/header.phtml';
        require './templates/peliculas.phtml';
        require './templates/footer.phtml';
    }
    public function ShowDetalle($pelicula)
    {
        require './templates/header.phtml';
        require './templates/detallePeliculas.phtml';
        require './templates/footer.phtml';
    }
    public function showForm($pelicula = null, $directores = [])
    {
        require './templates/header.phtml';
        require './templates/peliculaForm.phtml';
        require './templates/footer.phtml';
    }
}
