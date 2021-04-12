<?php
require_once('models\ArticleManager.php');
require_once('controllers\controller.php');
$article = new ArticleManager();

class HomeViewController extends Controller
{
    public function lastsArticles($article)
    {
        require('views\viewAccueil.php');
        require_once('template.php');
        $count = $article->countArticles();
        $articles = $article->readAll();
        require('views\viewLastsArticles.php');
        require('views\viewCreateArticle.php');
    }

}