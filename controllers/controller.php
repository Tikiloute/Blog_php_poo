<?php
namespace Controllers;

abstract class Controller {

    protected $article;
    protected $comment;
    protected $admin;
    protected $report;

    public function __construct()
    {
        $this->article = new \Models\ArticleManager();
        $this->comment = new \Models\CommentManager();
        $this->admin = new \Models\AdministratorManager();
        $this->report = new \Models\ReportCommentManager();
    }

}