<?php
require_once __DIR__ . '/../../config.php';


class modelBase {
    protected $db;

    public function __construct() {
        
        $this->db = new PDO(
            "mysql:host=" . MYSQL_HOST . ";charset=utf8",
            MYSQL_USER,
            MYSQL_PASS
        );

       
        $this->db->exec("CREATE DATABASE IF NOT EXISTS " . MYSQL_DB . " CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci");

        
        $this->db = new PDO(
            "mysql:host=" . MYSQL_HOST . ";dbname=" . MYSQL_DB . ";charset=utf8",
            MYSQL_USER,
            MYSQL_PASS
        );

        
        $this->_deploy();
    }

    protected function _deploy() {
        $query = $this->db->query('SHOW TABLES');
        $tables = $query->fetchAll();

        if (count($tables) == 0) {
            $sqlFile = __DIR__ . '/../../database.sql';
            if (file_exists($sqlFile)) {
                $sql = file_get_contents($sqlFile);
                $this->db->exec($sql);
            } else {
                die("Archivo database.sql no encontrado");
            }
        }
    }
}
