<?php
class ViewDir{
    public function ShowDirectores($directores){
        require './templates/header.phtml';
        require './templates/directores.phtml';
        require './templates/footer.phtml';
    }

    public function ShowDirectoresDestacados($directoresDestacados){
        require './templates/header.phtml';
        require './templates/home.phtml';
        require './templates/footer.phtml';
    }

    public function ShowDetalleDir($director){
        require './templates/header.phtml';
        require './templates/detalleDirectores.phtml';
        require './templates/footer.phtml';
    }

    public function showError($mensaje){
        require './templates/header.phtml';
        require './templates/error404.phtml';
        require './templates/footer.phtml';
    }

    public function showForm($director=null){
        require './templates/header.phtml';
        require './templates/directorForm.phtml';
        require './templates/footer.phtml';
    }
}