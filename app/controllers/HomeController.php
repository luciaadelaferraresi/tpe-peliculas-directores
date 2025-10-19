<?php
require_once __DIR__ . '/../models/PeliculaModel.php';
require_once __DIR__ . '/../views/PeliculaView.php';
require_once __DIR__ . '/../views/HomeView.php';
require_once __DIR__ . '/../models/DirectorModel.php';
require_once __DIR__ . '/../views/DirectorView.php';
class HomeController
{

    private $peliculaModel;
    private $directorModel;
    private $destacadosView;

    public function __construct()
    {
        $this->peliculaModel = new PeliculaModel();
        $this->directorModel = new DirectorModel();
        $this->destacadosView = new destacadosView();
    }

    public function showHome()
    {
        
        $peliculas = $this->peliculaModel->getPeliculasDestacadas();
        $directores = $this->directorModel->getDirectoresDestacados();
        $this->destacadosView->ShowDestacados($peliculas, $directores);
    }
}
