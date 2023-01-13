<?php 

require_once('libraries/databases.php');

class Article {


    // Fonction pour trouver tous les articles retour variable sous forme de tableau associatif

function findAllArticle(): array { // si pas public = public

    $pdo = getPDO();

    $resultats = $pdo->query('SELECT * FROM articles ORDER BY created_at DESC');
    // On fouille le résultat pour en extraire les données réelles
    $articles = $resultats->fetchAll();

    return $articles;
}

function findArticle(int $id) {
    
    $pdo = getPDO();
    
    $query = $pdo->prepare("SELECT * FROM articles WHERE id = :article_id");
    
    // On exécute la requête en précisant le paramètre :article_id 
    $query->execute(['article_id' => $id]);
    
    // On fouille le résultat pour en extraire les données réelles de l'article
    $article = $query->fetch();
    
    return $article;
    
}


function deleteArticle(int $id): void {

    $pdo= getPDO();

    $query = $pdo->prepare('DELETE FROM articles WHERE id = :id');
    $query->execute(['id' => $id]);

}



}