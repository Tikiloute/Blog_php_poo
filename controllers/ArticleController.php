<?php

namespace Controllers;

class ArticleController
{
    protected $article;
    protected $comment;

    public function __construct()
    {
        $this->article = new \Models\ArticleManager();
        $this->comment = new \Models\CommentManager();
    }

    public function article() : void
    {   
        $id = $_GET['id'];
        $art = $this->article->read($id);
        $count = $this->comment->countComment($id);
        $comments = $this->comment->readAll($id);
        if($art === null){
            require_once('views\view404.php');
        }else{
            require_once('views\viewArticle.php');
        }
    }

    public function allArticle() : void
    {
        $count = $this->article->countArticles();
        $articles = $this->article->readAll();
        require_once('views\viewAllArticles.php');
    }

    public function modifyArticle() : void
    {
        $id = $_GET['id'];
        $art = $this->article->read($id);
        require_once('views\viewModifyArticle.php');
    }

}