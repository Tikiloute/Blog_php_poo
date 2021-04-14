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
            $articleController->article();
            $commentController->comment(); 
        break;

        case "articles" : 
            $articleController->allArticle();
        break;

        case "admin" : 
            $administratorController->writeArticle();
            $administratorController->connection();
        break;
   }
}




