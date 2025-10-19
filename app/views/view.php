<?php
class View
{

    public function showError($mensaje)
    {

        require './templates/header.phtml';
        require './templates/error404.phtml';
        require './templates/footer.phtml';
    }
}
