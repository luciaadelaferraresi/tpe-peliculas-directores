<?php
require_once 'ModelBase.php';
class UserModel extends modelBase {
 
    public function getUserByEmail($email) {    
        $query = $this->db->prepare("SELECT * FROM usuarios WHERE email = ?");
        $query->execute([$email]);
    
        $user = $query->fetch(PDO::FETCH_OBJ);
    
        return $user;
    }
}