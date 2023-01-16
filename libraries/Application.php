<?php 

class Application {

    public static  function process(){

        $controllerName = "article";
        $task = "index";

        if(!empty($_GET['controller'])) { // ucfirst => transforme la premier lettre en majuscule
            $controllerName = ucfirst($_GET['controller']);
        }
        if(!empty($_GET['task'])) {
            $task = $_GET['task'];
        }

        $controllerName = "\Controller\\" . $controllerName;

        $controller = new $controllerName();
        $controller->$task();
    }
}