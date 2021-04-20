<?php

namespace Controllers;

class ArticleController
{
    protected $article;
    protected $comment;
    protected $report;

    public function __construct()
    {
        $this->article = new \Models\ArticleManager();
        $this->comment = new \Models\CommentManager();
        $this->report = new \Models\ReportCommentManager();
    }

    public function article() : void
    {   
        if(!isset($_GET['pagingComment'])){
            $_GET['pagingComment']=1;
        };
        $id = $_GET['id'];
        $numberCommentsPerPage=4;
        $offset =($_GET['pagingComment']-1)*$numberCommentsPerPage;
        $round = $this->comment->round($id,$numberCommentsPerPage);
        if(isset($_GET['pagingComment']) && $_GET['pagingComment'] < 1){
            $offset = 0;
        };
        $art = $this->article->read($id);
        $count = $this->comment->countComment($id);
        if(isset($_GET['pagingComment'])){
           $comments = $this->comment->readAllPaging($id, $numberCommentsPerPage, $offset);
        }else{
            require_once('views\view404.php');
        }
        if($art === null ){
            require_once('views\view404.php');
            die();
        }else{
            require_once('views\viewArticle.php');
        }
    }

    public function allArticle() : void
    {
        $numberArticlesPerPage = 3;
        if($_GET['page'] > 1){
            $offset =($_GET['page']-1)*$numberArticlesPerPage;
        }else{
            $offset = 0;   
        }
        $round = $this->article->round($numberArticlesPerPage);
        if($_GET['page']>$round){
            $offset =($round-1)*$numberArticlesPerPage;
            $_GET['page']=$round;
        }
        $count = $this->article->countArticles();
        if($_GET['page'] <1){
            $_GET['page']=1;
        }
        if(isset($_GET['page'])){
        $articles = $this->article->paging($numberArticlesPerPage,$offset);
        }
        require_once('views\viewAllArticles.php');
    }

    public function modifyArticle() : void
    {
        $id = $_GET['id'];
        $art = $this->article->read($id);
        require_once('views\viewModifyArticle.php');
    }

}