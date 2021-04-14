<?php

namespace Controllers;

class CommentController extends Controller
{
    public function comment()
    {   
        if (!empty($_POST['pseudo']) && !empty($_POST['content'])){
            $this->comment->newCommentary($_POST['pseudo'], $_POST['content'], $_GET['id']);
            echo "<div class='alert alert-success text-center'>Votre article a bien été envoyé</div>";
        }
        $count = $this->comment->countComment($_GET['id']);
        $comments = $this->comment->readAll($_GET['id']);
        require('views\viewCreateComment.php');
        require('views\viewAllComments.php');
        die();
    }
}

