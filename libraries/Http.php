<?php 

class Http {

    public static function redirect($path) {
        header('Location: ' . $path);
        exit();
    }
}