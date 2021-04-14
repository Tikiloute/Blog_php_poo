<?php

namespace Controllers;

class AdministratorController extends Controller
{
    public function connection()
    {
        require_once('views\viewAdminDisconnected.php');
        require_once('views\viewLogin.php');
        if(!empty($_POST['identifiant']) && !empty($_POST['password'])){
            echo 'coucou';
        }elseif(!empty($_SESSION['identifiant']) && !empty($_SESSION['password']) ){
            echo "re coucou";
        }else{
            echo "veuillez rentrez vos identifiants";
        }
    }

    public function writeArticle()
    {
        require('views\viewCreateArticle.php');
        if (!empty($_POST['titre']) && !empty($_POST['contenu'])){
            $this->article->newArticle($_POST['titre'], $_POST['contenu']);
            echo "<div class='alert alert-success text-center'>Votre article a bien été envoyé</div>";
        }
    }
}