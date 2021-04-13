<?php 
require_once("controllers\HomeController.php");
require_once("controllers\ArticleController.php");
$homeController = new HomeController();
$articleController = new ArticleController();

if(empty($_GET["action"])){
    $homeController->homePage();
} else{
   switch($_GET["action"]){
        case "accueil" :
            $homeController->homePage();
        break;

        case "article" : 
            $articleController->article();
        break;

        case "articles" : 
            $articleController->allArticle();
        break;

        case "admin" : 
            $articleController->writeArticle();
        break;
   }
}




