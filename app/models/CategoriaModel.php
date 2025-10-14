<?php
require_once 'ModelBase.php';
class ListaDirModel extends modelBase{

    public function GetDirectores(){
        $query = $this->db->prepare("
        SELECT d.id, d.nombre, COUNT(p.id) AS peliculas_count
        FROM directores d
        LEFT JOIN peliculas p ON d.id = p.id_director
        GROUP BY d.id, d.nombre
        ");
        $query->execute();

        $directores= $query->fetchALL(PDO::FETCH_OBJ);
        return $directores;
    }

    public function GetDirector($id){
        $query = $this->db->prepare("
        SELECT * FROM directores WHERE id = ?
        ");
        $query->execute([$id]);

        $director= $query->fetch(PDO::FETCH_OBJ);
        return $director;
    }

    public function InsertDirector($nombre){
        $query = $this->db->prepare('INSERT INTO directores (nombre) VALUES (?)');
        $query->execute([$nombre]);
    }

    public function updateDirector($id, $nombre){
        $query = $this->db->prepare('UPDATE directores SET nombre=? WHERE id=?');
        $query->execute([$nombre, $id]);
    }
    public function deleteDirector($id){
        $query = $this->db->prepare('DELETE FROM directores WHERE id=?');
        $query->execute([$id]);
    }
}