<?php
namespace Controllers;

require_once('models\ArticleManager.php');

abstract class Controller {

    protected $article;
    protected $comment;

    public function __construct()
    {
        $this->article = new \Models\ArticleManager();
    }

}