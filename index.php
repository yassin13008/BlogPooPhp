<?php

// Injection du controller article 

require_once ('libraries/controller/Article.php');

$controller = new \Controller\Article();

$controller->index();