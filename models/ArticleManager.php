<?php 

class ArticleManager extends Manager
{

    const LIMIT = 4;

    public function read(): array
    {
        $stm = $this->db->prepare('SELECT * from article');
        $stm->execute();
        $articles = $stm->fetchAll();
        return $articles; 
    }

    public function countArticles()
    {   
        $stm = $this->db->prepare('SELECT count(*) from article');
        $stm->execute();
        $count = $stm->fetch();
        return $count; 
    }

}