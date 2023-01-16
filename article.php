<?php

// Injection de l'auto loading 

require_once ('libraries/autoload.php');

// Injection du controller
require_once('libraries/controller/Article.php');


// Injection des dependance 
// require_once('libraries/databases.php');
// require_once('libraries/utils.php');
require_once('libraries/model/Article.php');
require_once('libraries/model/Comment.php');

$controller = new \Controller\Article();

$controller->show();
