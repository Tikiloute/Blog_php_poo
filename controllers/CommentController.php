<?php

namespace Controllers;

class CommentController
{
    protected $comment;

    public function __construct()
    {
        $this->comment = new \Models\CommentManager();
    }

    public function comment()
    {   
        if (!empty($_POST['pseudo']) && !empty($_POST['content'])){
            $this->comment->newCommentary($_POST['pseudo'], $_POST['content'], $_GET['id']);
            header("Location: article&id=".$_GET['id']."&pagingComment=".$_GET['pagingComment']."&addComment=ok");
            exit();
        }
    }
}

