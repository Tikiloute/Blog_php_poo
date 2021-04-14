<?php
namespace Controllers;

abstract class Controller {

    protected $article;
    protected $comment;

    public function __construct()
    {
        $this->article = new \Models\ArticleManager();
        $this->comment = new \Models\CommentManager();
    }

}