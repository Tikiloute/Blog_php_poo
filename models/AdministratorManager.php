<?php 
namespace Models;

class AdministratorManager extends Manager
{   
    public function adminProfile(): array
    {
        $stm = $this->db->prepare('SELECT * from administrateur');
        $stm->execute();
        $articles = $stm->fetch();
        return $articles; 
    }
    
}


?>