<?php

namespace Controllers;

class ArticleController extends Controller
{
    public function article()
    {   
        $art = $this->article->read($_GET['id']);
        $count = $this->comment->countComment($_GET['id']);
        $comments = $this->comment->readAll($_GET['id']);
        require('views\viewArticle.php');
    }

    public function allArticle()
    {
        $count = $this->article->countArticles();
        $articles = $this->article->readAll();
        require('views\viewAllArticles.php');
    }


}