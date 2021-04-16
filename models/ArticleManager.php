<?php 
namespace Models;

class ArticleManager extends Manager
{

    public function readAll(): array
    {
        $stm = $this->db->prepare('SELECT id, titre, SUBSTRING(contenu, 1, 500) AS contenu from article ORDER BY id DESC');
        $stm->execute();
        $articles = $stm->fetchAll();
        return $articles; 
    }

    public function readNumber(): array
    {
        $stm = $this->db->prepare('SELECT id, titre, SUBSTRING(contenu, 1, 500) AS contenu from article ORDER BY id DESC LIMIT 3');
        $stm->execute();
        $articles = $stm->fetchAll();
        return $articles; 
    }

    public function read(int $id) //impossible à hint ?
    {
        $stm = $this->db->prepare('SELECT id, titre, contenu from article WHERE id = :id');
        $stm->bindParam(":id", $id);
        $stm->execute();
        $article = $stm->fetch();
        if($article === false){
            $article = null;
        }else{
            return $article;
        } 
    }

    public function countArticles(): array
    {   
        $stm = $this->db->prepare('SELECT count(*) from article');
        $stm->execute();
        $count = $stm->fetch();
        return $count; 
    }

    public function newArticle(mixed $title, mixed $content): void 
    {
        $stm = $this->db->prepare("INSERT INTO article(titre, contenu) VALUES(:title, :content)");
        $stm->bindParam(":title", $title);
        $stm->bindParam(":content", $content);
        $stm->execute();
    }

    public function deleteArticle(int $id): void
    {
        $stm = $this->db->prepare("DELETE FROM article WHERE id = :id");
        $stm->bindParam(":id", $id);
        $stm->execute();
    }

    public function updateArticle(mixed $titre, mixed $contenu, int $id): void
    {   
        $stm = $this->db->prepare("UPDATE article SET titre= :title, contenu= :content WHERE id= :id");
        $stm->bindParam(":title", $titre);
        $stm->bindParam(":content", $contenu);
        $stm->bindParam(":id", $id);
        $stm->execute();
    }

}