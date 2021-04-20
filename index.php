<?php 
session_start();
require_once('controllers\autoload.php');

$homeController = new \Controllers\HomeController();
$articleController = new \Controllers\ArticleController();
$administratorController = new \Controllers\AdministratorController();
$commentController = new \Controllers\CommentController();

if(empty($_GET["action"])){
    $homeController->homePage();
} else{
   switch($_GET["action"]){
        case "accueil" :
            $homeController->homePage();
        break;

        case "article" :
            if(isset($_GET['id']) && $_GET['id'] > 0){
                $commentController->comment();
                $articleController->article();
            }else{
                require_once('views\view404.php');
                die();
            }
        break;

        case "articles" : 
            $articleController->allArticle();
        break;

        case "admin" : 
            $administratorController->connection();
        break;

        case "logout" : 
            $administratorController->logout();
        break;

        case "report" : 
            $administratorController->reportComments();
        break;

        case "modify" :
            $articleController->modifyArticle();
        break;

        case "deleteArticle" :
            $administratorController->deleteArticle();
        break;

        case "deleteReportComment" :
            $administratorController->deleteReportComment();
        break;

        case "validateReportComment" :
            $administratorController->validateReportComment();
        break;

        case "update" :
            $administratorController->updateArticle();
        break;

        case "deleteComment" :
            $administratorController->deleteComment();
        break;
        

   }
}




