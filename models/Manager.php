<?php 
namespace Models;

abstract class Manager 
{
    protected $db;
    protected $numberArticlesPerPage;

    public function __construct()
    {
        try {
            $this->db = new \PDO('mysql:host=localhost;dbname=projet4;charset=utf8', 'root', ''); 
        } catch(\PDOException $e) {
            print "erreur".$e->getMessage();
            die();
        }
    }

}