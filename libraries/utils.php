<?php 

function render(string $path, array $variables = []) {

    extract($variables);

    ob_start();
    require('templates/' . $path . '.html.php');
    $pageContent = ob_get_clean();
    
    require('templates/layout.html.php');
    }

    function redirect($path) {
        header('Location: ' . $path);
        exit();
    }