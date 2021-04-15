<?php
namespace Controllers;

class HomeController extends Controller
{
    public function homePage()
    {
        $count = $this->article->countArticles();
        $articles = $this->article->readAll();
        require_once('views\viewHome.php');
        require_once('template.php');
    }

}