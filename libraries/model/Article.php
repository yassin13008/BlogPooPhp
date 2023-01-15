<?php 

// Injetction des names spaces 

namespace Model; 

// Injection des dépendances 

require_once('libraries/model/Model.php');

class Article extends Model {

    // Redefinition de la propriété table

    protected $table = "articles";

    // Fonction pour trouver tous les articles retour variable sous forme de tableau associatif


}