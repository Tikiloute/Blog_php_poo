<?php 
namespace Models;

class ReportCommentManager extends Manager
{
    public function readAll(): array
    {
        $stm = $this->db->prepare('SELECT id, identifiant, commentaire, DATE_FORMAT(date, "%d/%m/%Y %Hh%imin%ss") AS date, idArticle from commentaire_moderation');
        $stm->execute();
        $comments = $stm->fetchAll();
        return $comments; 
    }

    public function report(int $id, mixed $comment, mixed $idComment, mixed $date, mixed $nomArticle, mixed $idArticle): void
    {
        $stm = $this->db->prepare('INSERT INTO commentaire_moderation(identifiant, commentaire, idCommentaire, date, NomArticle, idArticle) VALUES( :id, :comment, :idComment, :dateComment, :nomArticle, :idArticle)');
        $stm->bindParam(":id", $id);
        $stm->bindParam(":comment", $comment);
        $stm->bindParam(":idComment", $idComment);
        $stm->bindParam(":dateComment", $date);
        $stm->bindParam(":nomArticle", $nomArticle);
        $stm->bindParam(":idArticle", $idArticle);
        $stm->execute();
    }

}