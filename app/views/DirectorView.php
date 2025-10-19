<?php
class DirectorView
{
    public function ShowDirectores($directores)
    {
        require './templates/header.phtml';
        require './templates/directores.phtml';
        require './templates/footer.phtml';
    }
    public function ShowDetalleDir($director)
    {
        require './templates/header.phtml';
        require './templates/detalleDirectores.phtml';
        require './templates/footer.phtml';
    }



    public function showForm($director = null)
    {
        require './templates/header.phtml';
        require './templates/directorForm.phtml';
        require './templates/footer.phtml';
    }
}
