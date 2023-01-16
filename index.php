<?php

// Injection du controller article 

// require_once ('libraries/controller/Article.php');
require_once ('libraries/autoload.php'); // Ici je fais appel à la fonction spl que j'avais mis dans autoload via le required

\Application::process();

// $controller = new \Controller\Article();

// $controller->index();