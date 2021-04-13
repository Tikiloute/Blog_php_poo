<?php
require_once('models\ArticleManager.php');

abstract class Controller {

    protected $article;

    public function __construct()
    {
        $this->article = new ArticleManager();
    }

}