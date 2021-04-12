<?php
require_once('models\ArticleManager.php');
require_once('controllers\controller.php');
$article = new ArticleManager();

class ArticleController extends Controller
{
    public function article($article)
    {
        $art = $article->read($_GET['id']);
        require('views\viewArticle.php');
    }

    public function allArticle($article)
    {
        $count = $article->countArticles();
        $articles = $article->readAll();
        require('views\viewAllArticles.php');
    }

    public function writeArticle($article)
    {
        require('views\viewCreateArticle.php');
        if (!empty($_POST['titre']) && !empty($_POST['contenu'])){
            $article->new_article($_POST['titre'], $_POST['contenu']);
            echo "<div class='alert alert-success text-center'>Votre article a bien été envoyé</div>";
        }
    }

}