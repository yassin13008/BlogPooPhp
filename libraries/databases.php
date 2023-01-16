<?php 

// Fonction qui va créer une connexion à la base de donnée => retour d'un objet de class PDO (class native de PHP)

// Je vais créer une class statique 

class Database {

    public static function getPDO():PDO {
    
        $pdo = new PDO('mysql:host=localhost;dbname=blogpoo;charset=utf8', 'root', '', [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ]);
    
        return $pdo;
    }
    
    

}



