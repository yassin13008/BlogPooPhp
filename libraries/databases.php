<?php 

// Fonction qui va créer une connexion à la base de donnée => retour d'un objet de class PDO (class native de PHP)

function getPDO():PDO {
    
    $pdo = new PDO('mysql:host=localhost;dbname=blogpoo;charset=utf8', 'root', '', [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    ]);

    return $pdo;
}


// Fonction pour trouver tous les articles retour variable sous forme de tableau associatif

function findAllArticle(): array {

    $pdo = getPDO();

    $resultats = $pdo->query('SELECT * FROM articles ORDER BY created_at DESC');
    // On fouille le résultat pour en extraire les données réelles
    $articles = $resultats->fetchAll();

    return $articles;
}


// Fonction pour trouver un article retour  variable sous forme de tableau associatif

function findArticle(int $id) {
    
    $pdo = getPDO();
    
    $query = $pdo->prepare("SELECT * FROM articles WHERE id = :article_id");
    
    // On exécute la requête en précisant le paramètre :article_id 
    $query->execute(['article_id' => $id]);
    
    // On fouille le résultat pour en extraire les données réelles de l'article
    $article = $query->fetch();
    
    return $article;
    
}

// Fonction pour trouver un commentaire retour variable sous forme de tableau associatif 

function findComment(int $id) {

    $pdo = getPDO();

    $query = $pdo->prepare('SELECT * FROM comments WHERE id = :id');
    $query->execute(['id' => $id]);

    $comment = $query->fetch();

    return $comment;

}

// Fonction pour récuper tout les commentaires retour variable sous tableau associatif

function findAllcomments(int $article_id) :array{

    $pdo = getPDO();

    $query = $pdo->prepare("SELECT * FROM comments WHERE article_id = :article_id");
    $query->execute(['article_id' => $article_id]);
    $commentaires = $query->fetchAll();

    return $commentaires;
}

// Fonction pour supprimer un article

function deleteArticle(int $id): void {

    $pdo= getPDO();

    $query = $pdo->prepare('DELETE FROM articles WHERE id = :id');
    $query->execute(['id' => $id]);

}

// Fonction pour supprimer un commentaire

function deleteComment(int $comment): void {

    $pdo = getPDO();

    $query = $pdo->prepare('DELETE FROM comments WHERE id = :id');
    $query->execute(['id' => $comment]);
}


// Fonction pour insérer un commentaire


function insertComment(string $author, string $content, int $article_id) {

    $pdo = getPDO();


    $query = $pdo->prepare('INSERT INTO comments SET author = :author, content = :content, article_id = :article_id, created_at = NOW()');
    $query->execute(compact('author', 'content', 'article_id'));

}