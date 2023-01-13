<?php 


require_once('libraries/model/Model.php');

class Article extends Model {

    // Insertion de la propriété pdo

   

    // Fonction pour trouver tous les articles retour variable sous forme de tableau associatif

function findAll(): array { // si pas public = public

    

    $resultats = $this->pdo->query('SELECT * FROM articles ORDER BY created_at DESC');
    // On fouille le résultat pour en extraire les données réelles
    $articles = $resultats->fetchAll();

    return $articles;
}

function find(int $id) {
    
    
    
    $query = $this->pdo->prepare("SELECT * FROM articles WHERE id = :article_id");
    
    // On exécute la requête en précisant le paramètre :article_id 
    $query->execute(['article_id' => $id]);
    
    // On fouille le résultat pour en extraire les données réelles de l'article
    $article = $query->fetch();
    
    return $article;
    
}


function delete(int $id): void {


    $query = $this->pdo->prepare('DELETE FROM articles WHERE id = :id');
    $query->execute(['id' => $id]);

}



}