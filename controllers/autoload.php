<?php

spl_autoload_register(function($className){
    // le var_dump($className) = Controllers\HomeController
    // donc si on veut require_once("controllers\HomeController.php"); on fait :
    require_once("$className.php");
});