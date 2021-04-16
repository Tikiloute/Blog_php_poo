<?php 
namespace Models;

class ReportCommentManager extends Manager
{
    public function readAll(): array
    {
        $stm = $this->db->prepare('SELECT id, identifiant, commentaire, date, nomArticle, idCommentaire, idArticle from commentaire_moderation');
        $stm->execute();
        $comments = $stm->fetchAll();
        return $comments; 
    }

    public function report(mixed $id, mixed $comment, mixed $idComment, mixed $date, mixed $nomArticle, mixed $idArticle): void
    {
        $stm = $this->db->prepare('INSERT INTO commentaire_moderation(identifiant, commentaire, idCommentaire, date, nomArticle, idArticle) VALUES( :id, :comment, :idComment, :dateComment, :nomArticle, :idArticle)');
        $stm->bindParam(":id", $id);
        $stm->bindParam(":comment", $comment);
        $stm->bindParam(":idComment", $idComment);
        $stm->bindParam(":dateComment", $date);
        $stm->bindParam(":nomArticle", $nomArticle);
        $stm->bindParam(":idArticle", $idArticle);
        $stm->execute();
    }

    public function count(): ?array
    {
        $stm = $this->db->prepare('SELECT count(id) from commentaire_moderation');
        $stm->execute();
        $count = $stm->fetch();
        return $count; 
    }

    public function deleteReportComment(int $id): void
    {
        $stm = $this->db->prepare("DELETE FROM commentaire WHERE id = :id");
        $stm->bindParam(":id", $id);
        $stm->execute();
    }

    public function validateReportComment(int $id) : void
    {
        $stm = $this->db->prepare("DELETE FROM commentaire_moderation WHERE id = :id");
        $stm->bindParam(":id", $id);
        $stm->execute();
    }


    public function sum($numberIdComment): ?array
    {
        $stm = $this->db->prepare('SELECT count(idCommentaire) from commentaire_moderation where idCommentaire = :id');
        $stm->bindParam(":id", $numberIdComment);
        $stm->execute();
        $count = $stm->fetch();
        return $count;
    }

    public function readDifferentReportComment(): array
    {
        $stm = $this->db->prepare('SELECT distinct identifiant, commentaire, date, idArticle, nomArticle, id, idCommentaire from commentaire_moderation ');
        $stm->execute();
        $comments = $stm->fetchAll();
        return $comments; 
    }

}