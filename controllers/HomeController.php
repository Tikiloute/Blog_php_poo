<?php
namespace Controllers;

class HomeController
{
    protected $article;

    public function __construct()
    {
        $this->article = new \Models\ArticleManager();
    }

    public function homePage()
    {
        //$articles = $this->article->readAll();
        $article = $this->article->readNumber();
        require_once('views\viewHome.php');
        require_once('template.php');
    }

}