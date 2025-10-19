<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
require_once "config.php";
require_once "app/controllers/AuthController.php";
require_once "app/controllers/DirectorController.php";
require_once "app/controllers/PeliculaController.php";
require_once "app/controllers/HomeController.php";
require_once "app/controllers/errorController.php";



$action = !empty($_GET['action']) ? $_GET['action'] : 'home';


$params = explode("/", $action);

switch ($params[0]) {
    case 'home':
        $controller = new HomeController();
        $controller->showHome();
        break;
    case 'peliculas':
        $controller = new PeliculaController();
        if (empty($params[1])) {
            $controller->showPeliculas();
        } else {
            $controller->showPeliculaByDirector($params[1]);
        }
        break;
    case 'pelicula':
        $controller = new PeliculaController();
        if (!empty($params[1]) && is_numeric($params[1])) {
            $controller->showPeliculaById($params[1]);
        } else {
            $controller->showPeliculas();
        }
        break;
    case 'directores':
        $controller = new DirectorController();
        $controller->showDirectores();
        break;
    case 'director':
        $controller = new DirectorController();
        if (!empty($params[1]) && is_numeric($params[1])) {
            $controller->showDirectorById($params[1]);
        } else {
            $home = new HomeController();
            $home->showHome();
        }
        break;
    case 'login':
        $controller = new AuthController();
        $controller->showLogin();
        break;

    case 'verify':
        $controller = new AuthController();
        $controller->login();
        break;

    case 'logout':
        $controller = new AuthController();
        $controller->logout();
        break;

    case 'addPelicula':
        $controller = new PeliculaController();
        $controller->addPelicula();
        break;
    case 'peliculaForm':
        $controller = new PeliculaController();
        $controller->showForm();
        break;
    case 'editPelicula':
        if (!empty($params[1]) && is_numeric($params[1])) {
            $controller = new PeliculaController();
            $controller->showForm($params[1]);
        } else {
            $controller = new ErrorController();
            $controller->showError("Película no encontrada");
        }
        break;
    case 'updatePelicula':
        if (!empty($params[1]) && is_numeric($params[1])) {
            $controller = new PeliculaController();
            $controller->updatePelicula($params[1]);
        }
        break;
    case 'deletePelicula':
        if (!empty($params[1]) && is_numeric($params[1])) {
            $controller = new PeliculaController();
            $controller->deletePelicula($params[1]);
        } else {
            $controller = new ErrorController();
            $controller->showError("Película no encontrada");
        }
        break;
    case 'addDirector':
        $controller = new DirectorController();
        $controller->addDirector();
        break;
    case 'directorForm':
        $controller = new DirectorController();
        $controller->showForm();
        break;
    case 'editDirector':
        if (!empty($params[1]) && is_numeric($params[1])) {
            $controller = new DirectorController();
            $controller->showForm($params[1]);
        } else {
            $controller = new ErrorController();
            $controller->showError("Director no encontrado");
        }
        break;
    case 'updateDirector':
        if (!empty($params[1]) && is_numeric($params[1])) {
            $controller = new DirectorController();
            $controller->updateDirector(($params[1]));
        }
        break;
    case 'deleteDirector':
        if (!empty($params[1]) && is_numeric($params[1])) {
            $controller = new DirectorController();
            $controller->deleteDirector(($params[1]));
        } else {
            $controller = new ErrorController();
            $controller->showError("Director no encontrado");
        }
        break;
    default:
        $controller = new ErrorController();
        $controller->show404();
        break;
}
