<?php

namespace Controllers;

class HomeViewController extends Controller
{
    public function lastsArticles($article)
    {
        require('views\viewAccueil.php');
        require_once('template.php');
        $count = $this->article->countArticles();
        $articles = $this->article->readAll();
        require('views\viewLastsArticles.php');
        require('views\viewCreateArticle.php');
    }

}