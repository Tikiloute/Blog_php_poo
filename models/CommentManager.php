<?php 
namespace Models;

class CommentManager extends Manager
{   
    public function readAll(int $id): array
    {
        $stm = $this->db->prepare('SELECT id, identifiant, commentaire, DATE_FORMAT(date, "%d/%m/%Y %Hh%imin%ss") AS date, idArticle, nombre_Id_Report from commentaire WHERE idArticle = :id');
        $stm->bindParam(":id", $id);
        $stm->execute();
        $comments = $stm->fetchAll();
        return $comments; 
    }

    public function readAllPaging(int $id, int $limit, int $offset): array
    {
        $stm = $this->db->prepare('SELECT id, identifiant, commentaire, DATE_FORMAT(date, "%d/%m/%Y %Hh%imin%ss") AS date, idArticle, nombre_Id_Report from commentaire WHERE idArticle = :id LIMIT :limite OFFSET :offset');
        $stm->bindParam(":offset", $offset,\PDO::PARAM_INT);
        $stm->bindParam(":limite", $limit,\PDO::PARAM_INT);
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

    public function newCommentary(mixed $pseudo, mixed $comment, int $idArticle): void
    {
        $stm = $this->db->prepare('INSERT INTO commentaire(identifiant, commentaire, idArticle, date) VALUES(:id, :comment, :idArticle, NOW())');
        $stm->bindParam(":id", $pseudo);
        $stm->bindParam(":comment", $comment);
        $stm->bindParam(":idArticle", $idArticle);
        $stm->execute();        
    }

    public function updateReportComment(int $countReportComment, int $idCommentaire): void
    {   
        $stm = $this->db->prepare("UPDATE commentaire SET nombre_Id_Report = :countReportComment WHERE id = :idCommentaire");
        $stm->bindParam(":countReportComment", $countReportComment);
        $stm->bindParam(":idCommentaire", $idCommentaire);
        $stm->execute();
    }


    public function round($id,$numberArticlesPerPage): int
    {
        $count = $this->countComment($id);
        $numberArtPerPage = $numberArticlesPerPage;
        return ceil($count[0]/$numberArtPerPage); 
    }


}

?>