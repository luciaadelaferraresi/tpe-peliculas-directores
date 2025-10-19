<?php

class AuthView
{
    private $user = null;

    public function showLogin($error = '')
    {
        require './templates/header.phtml';
        require 'templates/formLogin.phtml';
        require './templates/footer.phtml';
    }
}
