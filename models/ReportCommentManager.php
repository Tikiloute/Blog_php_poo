<?php 
namespace Models;

class ReportCommentManager extends Manager
{
    public function readAll($limit, $offset): array
    {
        $stm = $this->db->prepare('SELECT id, identifiant, commentaire, date, nomArticle, idCommentaire, idArticle, nombre_Id_Report from commentaire_moderation LIMIT :limit OFFSET :offset');
        $stm->bindParam(":offset", $offset,\PDO::PARAM_INT);
        $stm->bindParam(":limit", $limit,\PDO::PARAM_INT);
        $stm->execute();
        $comments = $stm->fetchAll();
        return $comments; 
    }

    public function readAllbyID($idComment): array
    {
        $stm = $this->db->prepare('SELECT id, identifiant, commentaire, date, nomArticle, idCommentaire, idArticle, nombre_Id_Report from commentaire_moderation where idComment = :idComment');
        $stm->bindParam(":idComment", $idComment);
        $stm->execute();
        $comments = $stm->fetchAll();
        return $comments; 
    }

    public function report(mixed $id, mixed $comment, mixed $idComment, mixed $date, mixed $nomArticle, mixed $idArticle, mixed $nombre_Id_Report): void
    {
        $stm = $this->db->prepare('INSERT INTO commentaire_moderation(identifiant, commentaire, idCommentaire, date, nomArticle, idArticle, nombre_Id_Report) VALUES( :id, :comment, :idComment, :dateComment, :nomArticle, :idArticle, :nombre_Id_Report)');
        $stm->bindParam(":id", $id);
        $stm->bindParam(":comment", $comment);
        $stm->bindParam(":idComment", $idComment);
        $stm->bindParam(":dateComment", $date);
        $stm->bindParam(":nomArticle", $nomArticle);
        $stm->bindParam(":idArticle", $idArticle);
        $stm->bindParam(":nombre_Id_Report", $nombre_Id_Report);
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
        $stm = $this->db->prepare("DELETE FROM commentaire_moderation WHERE idCommentaire = :id");
        $stm->bindParam(":id", $id);
        $stm->execute();
    }

    public function updateReportComment(int $countReportComment, int $idCommentaire): void
    {   
        $stm = $this->db->prepare("UPDATE commentaire_moderation SET nombre_Id_Report = :countReportComment WHERE idCommentaire = :idCommentaire");
        $stm->bindParam(":countReportComment", $countReportComment);
        $stm->bindParam(":idCommentaire", $idCommentaire);
        $stm->execute();
    }

    public function round($numberCommentsPerPage): int
    {
        $count = $this->count();
        $numberCommentPerPage = $numberCommentsPerPage;
        return ceil($count[0]/$numberCommentPerPage); 
    }

}