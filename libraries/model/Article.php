<?php 

// Injetction des names spaces 

namespace Model; 

// Injection des dépendances 

// Injection de l'auto loading 

require_once ('libraries/autoload.php');


class Article extends Model {

    // Redefinition de la propriété table

    protected $table = "articles";

    // Fonction pour trouver tous les articles retour variable sous forme de tableau associatif


}