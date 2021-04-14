<?php 
namespace Models;

class ArticleManager extends Manager
{

    public function readAll(): array
    {
        $stm = $this->db->prepare('SELECT id, titre, SUBSTRING(contenu, 1, 250) AS contenu from article ORDER BY id DESC');
        $stm->execute();
        $articles = $stm->fetchAll();
        return $articles; 
    }

    public function read($id): array
    {
        $stm = $this->db->prepare('SELECT id, titre, contenu from article WHERE id = :id');
        $stm->bindParam(":id", $id);
        $stm->execute();
        $articles = $stm->fetch();
        return $articles; 
    }

    public function countArticles()
    {   
        $stm = $this->db->prepare('SELECT count(*) from article');
        $stm->execute();
        $count = $stm->fetch();
        return $count; 
    }

    public function newArticle(string $title, string $content): void 
    {
        $stm = $this->db->prepare("INSERT INTO article(titre, contenu) VALUES(:title, :content)");
        $stm->bindParam(":title", $title);
        $stm->bindParam(":content", $content);
        $stm->execute();
    }

}