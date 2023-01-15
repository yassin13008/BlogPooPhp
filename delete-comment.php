<?php

// Injection de l'auto loading 

require_once ('libraries/autoload.php');

// Injection fonction 

require_once('libraries/databases.php');
require_once ('libraries/utils.php');

// Injection dependance du controller

require_once('libraries/controller/Comment.php');



$controller = new \Controller\Comment();

$controller->delete();

