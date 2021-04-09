<?php
require_once('models\ArticleManager.php');

class HomeViewController
{
    public $art;
    public $administrator;
    public $comment;
    public $limit;
    public $countArray;
    public $count;
    public $round;
    public $articles;

    
    public function __construct()
    {

    }

    public function affichageAccueil()
    {
        require_once('views\viewAccueil.php');
        echo $contenu;
    }


    public function read($art)
    {
        $count = $art->countArticles();
        print_r($count);
        $test = $art->read();
        print_r($test);
    }


}