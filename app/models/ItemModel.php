<?php
require_once 'ModelBase.php';
require_once 'CategoriaModel.php';
class ListaModel extends modelBase{
   
    public function GetPeliculas() {
        $query = $this->db->prepare("
        SELECT p.id, p.titulo, p.anio, d.nombre AS director
        FROM peliculas p
        JOIN directores d ON p.id_director = d.id
         ");
        $query->execute();

        $peliculas= $query->fetchALL(PDO::FETCH_OBJ);

        return $peliculas;
    }
    public function GetPeliculasDestacadas(){
        $query = $this->db->prepare("
        SELECT p.id, p.titulo, p.anio, p.duracion, d.nombre AS director
        FROM peliculas p
        JOIN directores d ON p.id_director = d.id
        ORDER BY p.id DESC
        LIMIT 5
    ");
        $query->execute();

        $peliculasDestacadas= $query->fetchALL(PDO::FETCH_OBJ);

        return $peliculasDestacadas;
    }
    public function GetPelicula($id) {
        $query = $this->db->prepare("
        SELECT p.*, d.nombre AS director
        FROM peliculas p
        JOIN directores d ON p.id_director = d.id
        WHERE p.id = ?
         ");
        $query->execute([$id]);

        $pelicula= $query->fetch(PDO::FETCH_OBJ);

        return $pelicula;
    }
    public function GetPeliculasByDirector($id){
        $query = $this->db->prepare("
        SELECT p.*, d.nombre AS director 
        FROM peliculas p 
        JOIN directores d ON p.id_director = d.id 
        WHERE p.id_director = ?
        ");
        $query->execute([$id]);
        return $query->fetchALL(PDO::FETCH_OBJ);
    }

    public function InsertPelicula($titulo, $anio, $duracion, $id_director) {
        $query = $this->db->prepare('INSERT INTO peliculas (titulo, anio, duracion, id_director) VALUES (?, ?,?,?)');
        $query->execute([$titulo, $anio, $duracion, $id_director]);
    }
    public function updatePelicula($id, $titulo, $anio) {
        $query = $this->db->prepare('UPDATE peliculas SET titulo=?, anio=?  WHERE id=?');
        $query->execute([$titulo, $anio, $id]);
    }
    public function deletePelicula($id) {
        $query = $this->db->prepare('DELETE FROM peliculas WHERE id=?');
        $query->execute([$id]);
    }
    
   
}

?>