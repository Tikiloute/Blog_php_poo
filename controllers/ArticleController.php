<?php

namespace Controllers;

class ArticleController extends Controller
{
    public function article() : void
    {   
        $art = $this->article->read($_GET['id']);
        $count = $this->comment->countComment($_GET['id']);
        $comments = $this->comment->readAll($_GET['id']);
        require_once('views\viewArticle.php');
    }

    public function allArticle() : void
    {
        $count = $this->article->countArticles();
        $articles = $this->article->readAll();
        require_once('views\viewAllArticles.php');
    }

    public function modifyArticle(): void
    {
        $art = $this->article->read($_GET['id']);
        require_once('views\viewModifyArticle.php');
    }


}