<?php
namespace Controllers;

class HomeController extends Controller
{
    public function homePage()
    {
        require('views\viewHome.php');
        require_once('template.php');
        $count = $this->article->countArticles();
        $articles = $this->article->readAll();
        require('views\viewLastsArticles.php');
    }

}