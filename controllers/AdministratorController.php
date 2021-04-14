<?php

namespace Controllers;

class AdministratorController extends Controller
{
    public function connection()
    {
        require_once('views\viewLogin.php');
        $adm = $this->admin->adminProfile();
        if(empty($_SESSION['identifiant']) && empty($_SESSION['password'])){
            require_once('views\viewAdminDisconnected.php');
            echo "veuillez vous connecter";
        }elseif(!empty($_SESSION['identifiant']) && !empty($_SESSION['password']) && $_SESSION['identifiant'] === $adm["identifiant"] && password_verify($_POST['password'], $adm["password"]) === true){
            $mdp = $_POST['password'];
            $this->writeArticle();
            require_once('views\viewAdminConnected.php');
            echo "connecté";
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