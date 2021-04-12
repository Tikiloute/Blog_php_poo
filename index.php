<?php 
require_once("controllers\HomeViewController.php");
require_once("controllers\ArticleController.php");
$homeController = new HomeViewController();
$articleController = new ArticleController();

if(empty($_GET["action"])){
    $homeController->lastsArticles($article);
} else{
   switch($_GET["action"]){
        case "accueil" :
            $homeController->lastsArticles($article);
        break;

        case "article" : 
            $articleController->article($article);
        break;

        case "articles" : 
            $articleController->allArticle($article);
        break;

        case "admin" : 
            $articleController->writeArticle($article);
        break;
   }
}




