<?php

// Injection des dependances

require_once('libraries/databases.php');
require_once('libraries/utils.php');

//Injection du contrôleur

require_once('libraries/Controller/Article.php');

$controller = new \Controller\Article();
$controller->delete();
