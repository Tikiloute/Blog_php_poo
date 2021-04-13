<?php
require_once('models\ArticleManager.php');
require_once('controllers\Controller.php');

class ArticleController extends Controller
{
    public function article()
    {
        $art = $this->article->read($_GET['id']);
        require('views\viewArticle.php');
    }

    public function allArticle()
    {
        $count = $this->article->countArticles();
        $articles = $this->article->readAll();
        require('views\viewAllArticles.php');
    }

    public function writeArticle()
    {
        require('views\viewCreateArticle.php');
        if (!empty($_POST['titre']) && !empty($_POST['contenu'])){
            $this->article->new_article($_POST['titre'], $_POST['contenu']);
            echo "<div class='alert alert-success text-center'>Votre article a bien été envoyé</div>";
        }
    }

}