<?php
class ModelBase {
    protected $db;

    public function __construct() {
        $this->db = new PDO('mysql:host=localhost;charset=utf8', 'root', '');
        $this->_deploy();
    }

    protected function _deploy() {
        // Crear DB si no existe
        $this->db->exec("CREATE DATABASE IF NOT EXISTS cine CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci");
        $this->db->exec("USE cine");

        // Verificar tablas
        $query = $this->db->query('SHOW TABLES');
        $tables = $query->fetchAll();

        if(count($tables) === 0){
            $sqlFile = __DIR__ . '/../../database.sql';
            if(file_exists($sqlFile)){
                $sql = file_get_contents($sqlFile);
               $this->db->exec($sql);
            } else {
                throw new Exception("Archivo database.sql no encontrado");
            }
        }
        $this->db = new PDO('mysql:host=localhost;dbname=cine;charset=utf8', 'root', '');
    }
}
?>