<?php 

require_once('models/Manager.php');
require_once('models/ArticleManager.php');
require_once('models/AdministratorManager.php');
require_once('models/CommentManager.php');
require_once('controllers\homeView.php');
require_once('template.php');

$art = new ArticleManager();
$administrator = new AdministratorManager();
$comment = new CommentManager();

$homeView = new HomeViewController();

$homeView-> affichageAccueil();
$homeView->read($art);

