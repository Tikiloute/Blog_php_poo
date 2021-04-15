<?php

namespace Controllers;

class CommentController extends Controller
{
    public function comment()
    {   
        if (!empty($_POST['pseudo']) && !empty($_POST['content'])){
            $this->comment->newCommentary($_POST['pseudo'], $_POST['content'], $_GET['id']);
            header("Location: article&id=".$_GET['id']."&addComment=ok");
            exit();
        }
    }
}

