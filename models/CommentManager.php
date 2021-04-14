<?php 
namespace Models;

class CommentManager extends Manager
{   
    public function readAll(int $id): array
    {
        $stm = $this->db->prepare('SELECT id, identifiant, commentaire, DATE_FORMAT(date, "%d/%m/%Y %Hh%imin%ss") AS date, idArticle from commentaire WHERE idArticle = :id');
        $stm->bindParam(":id", $id);
        $stm->execute();
        $comments = $stm->fetchAll();
        return $comments; 
    }

    public function read():array
    {
        $stm = $this->db->prepare('SELECT * from commentaire INNER JOIN WHERE idArticle = :id');
        $stm->bindParam(":id", $id);
        $stm->execute();
        $count = $stm->fetch();
        return $count; 
    }

    public function countComment(int $id) : array
    {   
        $stm = $this->db->prepare('SELECT count(idArticle) from commentaire WHERE idArticle = :id');
        $stm->bindParam(":id", $id);
        $stm->execute();
        $count = $stm->fetch();
        return $count; 
    }

    public function newCommentary($pseudo, $comment, int $idArticle): void
    {
        $stm = $this->db->prepare('INSERT INTO commentaire(identifiant, commentaire, idArticle, date) VALUES(:id, :comment, :idArticle, NOW())');
        $stm->bindParam(":id", $pseudo);
        $stm->bindParam(":comment", $comment);
        $stm->bindParam(":idArticle", $idArticle);
        $stm->execute();        
    }


}

?>