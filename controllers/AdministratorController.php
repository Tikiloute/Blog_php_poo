<?php

namespace Controllers;

class AdministratorController
{
    protected $article;
    protected $admin;
    protected $report;
    protected $comment;

    public function __construct()
    {
        $this->article = new \Models\ArticleManager();
        $this->admin = new \Models\AdministratorManager();
        $this->report = new \Models\ReportCommentManager();
        $this->comment = new \Models\CommentManager();
    }

    public function connection(): void
    {
        $adm = $this->admin->adminProfile();
        if(!empty($_POST['identifiant']) && !empty($_POST['password'])){
            $username = $_POST['identifiant'];
            $password = $_POST['password'];
            $_SESSION['identifiant'] = $username;
            $_SESSION['password'] = $password;
        }
        if(!empty($_POST['identifiant']) && !empty($_POST['password']) && empty($_SESSION['identifiant']) && empty($_SESSION['password'])){
            require_once('views\viewAdminDisconnected.php');
        }elseif(!empty($_SESSION['identifiant']) && !empty($_SESSION['password'])){
            if($_SESSION['identifiant'] === $adm["identifiant"] && password_verify($_SESSION['password'], $adm["password"]) === true){
                $_SESSION['connected'] = true;
                $this->readReportComment();
                $this->writeArticle();
            }else{
                require_once('views\viewAdminDisconnected.php');
            }
        }else{
            require_once('views\viewAdminDisconnected.php');
        }
    }

    public function writeArticle(): void
    {
        if (!empty($_POST['titre']) && !empty($_POST['contenu'])){
            $this->article->newArticle($_POST['titre'], $_POST['contenu']);
            echo "<div class='alert alert-success text-center'>Votre article a bien été envoyé</div>";
        }
    }

    public function logout(): void
    {
        $this->admin->logout();
    }

    public function reportComments(): void
    { // nombre commentaire signalé < 2 alors on update+1 ---- sinon update nombre commentaire signalé +1
        $countIdReport = $_GET['NombreIdReport']+1;
        if($_GET['NombreIdReport'] >= 1){
        $this->report->updateReportComment($countIdReport, $_GET['idComment']);
        $this->comment->updateReportComment($countIdReport, $_GET['idComment']);
        header("Location: article&id=".$_GET['id']."&report=ok");
        exit();
        }else {
        $this->comment->updateReportComment($countIdReport, $_GET['idComment']);
        $this->report->report($_GET['identifiant'],$_GET['comment'], $_GET['idComment'], $_GET['date'], $_GET['articleName'], $_GET['id'], $_GET['NombreIdReport']+1);
        header("Location: article&id=".$_GET['id']."&report=ok");
        exit();
        }
    }

    public function readReportComment() : void
    {
        $arrayIdComment = [];
        $adm = $this->admin->adminProfile();
        $reportComment = $this->report->readAll();
        require_once('views\viewAdminConnected.php');
    }

    public function deleteArticle() : void
    {
        $this->article->deleteArticle($_GET['id']);
        header("Location: articles");
        exit();
    }

    public function deleteReportComment() : void
    {
        $this->report->deleteReportComment($_GET['id']);
        header("Location: admin");
        exit();
    }

    public function validateReportComment() : void
    {
        $this->report->validateReportComment($_GET['id']);
        header("Location: admin");
        exit();
    }

    public function updateArticle(): void
    {
        $id= $_GET['id'];
        $art = $this->article->read($id);
        if(isset($_POST['titreArticle'], $_POST['contenuArticle'], $id) && ($_POST['titreArticle'] != $art['titre'] || $_POST['contenuArticle'] != $art['contenu'])){
            $this->article->updateArticle($_POST['titreArticle'], $_POST['contenuArticle'], $id);
            header("Location: modify&id=".$id."&success=ok");
            exit();
        }else{
            header("Location: modify&id=".$id."&success=notOk");
            exit();
        }
    }

}