<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

require_once "app/controllers/AuthController.php";
require_once "app/controllers/CategoriaController.php";
require_once "app/controllers/ItemController.php";

define('BASE_URL', 'http://localhost/tpe-web2/');
$action= 'home';
if(!empty($_GET['action'])){
    $action= $_GET['action'];
}else{
    $action= "home";
}
$params= explode("/", $action);

switch($params[0]){
 case 'home':
    $controller= new PeliculaController();
    $controller->showHome();
    break;
 case 'peliculas':
    $controller= new PeliculaController();
    if(empty($params[1])){
        $controller->showPeliculas();
    } else {
        $controller->showPeliculaByDirector($params[1]);
    }
    break;
 case 'pelicula':
    $controller= new PeliculaController();
    if(!empty($params[1])&& is_numeric($params[1])){
        $controller->showPeliculaById($params[1]);
    }else{
        $controller->showHome();
    }
    break;
 case 'directores':
    $controller = new DirectorController();
    $controller->showDirectores();
    break;
 case 'director':
    $controller= new DirectorController();
    $controller2= new PeliculaController();
    if(!empty($params[1])&& is_numeric($params[1])){
        $controller->showDirectorById($params[1]);
    }else{
        $controller2->showHome();
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
          $view = new View();
       $view->showError("Película no encontrada");
       }
      
            break;
 case 'editarPelicula': 
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
        $view = new View();
        $view->showError("Película no encontrada");
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
        $view = new View();
        $view->showError("Director no encontrado");
    }
    break;
 case 'editarDirector':
    if(!empty($params[1]) && is_numeric($params[1])) {
        $controller = new DirectorController();
        $controller->updateDirector(($params[1]));
    }
    break;
 case 'deleteDirector':
    if(!empty($params[1]) && is_numeric($params[1])) {
        $controller = new DirectorController();
        $controller->deleteDirector(($params[1]));
    } else {
        $view = new View();
        $view->showError("Director no encontrado");
    }
    break;
 default:
    $view = new View();
    $view->showError("Error 404 - Página no encontrada");
    break;
}

?>