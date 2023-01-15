<?php 
// Injetction des names spaces 

namespace Model; 

// Injection des dépendances 

// Injection de l'auto loading 

require_once ('libraries/autoload.php');


class Comment extends Model {

    protected $table = "comments";


// Fonction pour récuper tout les commentaires retour variable sous tableau associatif

function findAllWithArticle(int $article_id) :array{

    

    $query = $this->pdo->prepare("SELECT * FROM comments WHERE article_id = :article_id");
    $query->execute(['article_id' => $article_id]);
    $commentaires = $query->fetchAll();

    return $commentaires;
}


// Fonction pour insérer un commentaire


function insert(string $author, string $content, int $article_id) {

    


    $query = $this->pdo->prepare('INSERT INTO comments SET author = :author, content = :content, article_id = :article_id, created_at = NOW()');
    $query->execute(compact('author', 'content', 'article_id'));

}


}

