<?php

abstract class Controller {

    public function __construct()
    {
        
    }

    public function affiche()
    {
        require_once('views\viewAccueil.php');
    }
}