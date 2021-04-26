<?php

spl_autoload_register(function($className){
    // le var_dump($className) = Controllers\HomeController
    // donc si on veut require_once("controllers\HomeController.php"); on fait :
    require_once("/homepages/32/d733915466/htdocs/$className.php");
});