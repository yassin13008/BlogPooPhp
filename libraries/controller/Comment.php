<?php

// Injetction des names spaces 

namespace Controller; 

// Injection des dépendances 
// require_once('libraries/utils.php'); // fonction concernant les utilitaires du site (redirection, affichage)
// require_once('libraries/model/Article.php'); // Class concernant les articles
// require_once('libraries/model/Comment.php'); // Class concernant les commentaires
// require_once('libraries/controller/Controller.php'); // Class concernant le controler

class Comment extends Controller{

    protected $modelName = \model\Comment::class;

    // Ici je déclare la fonction inserer un commentaire 

    public function insert() {

        $author = null;
if (!empty($_POST['author'])) {
    $author = $_POST['author'];
}

// Ensuite le contenu
$content = null;
if (!empty($_POST['content'])) {
    // On fait quand même gaffe à ce que le gars n'essaye pas des balises cheloues dans son commentaire
    $content = htmlspecialchars($_POST['content']);
}

// Enfin l'id de l'article
$article_id = null;
if (!empty($_POST['article_id']) && ctype_digit($_POST['article_id'])) {
    $article_id = $_POST['article_id'];
}

// Vérification finale des infos envoyées dans le formulaire (donc dans le POST)
// Si il n'y a pas d'auteur OU qu'il n'y a pas de contenu OU qu'il n'y a pas d'identifiant d'article
if (!$author || !$article_id || !$content) {
    die("Votre formulaire a été mal rempli !");
}

// Insertion des models en questions 

$modelArticle = new \Model\Article();



$pdo = \Database::getPDO();

$article = $modelArticle->find($article_id);

// Si rien n'est revenu, on fait une erreur
if (!$article) {
    die("Ho ! L'article $article_id n'existe pas boloss !");
}

// 3. Insertion du commentaire
$this->model->insert($author,$content,$article_id);

// 4. Redirection vers l'article en question :
\Http::redirect("index.php?controller=article&task=show&id=" . $article_id);

    }


    // Ici je vais inserer une fonction delete 
    public function delete(){


        if (empty($_GET['id']) || !ctype_digit($_GET['id'])) {
            die("Ho ! Fallait préciser le paramètre id en GET !");
        }
        
        $id = $_GET['id'];
        
        
        // Insertion de la class comment
        
      
        
        
        /**
         * 3. Vérification de l'existence du commentaire
         */
        $commentaire = $this->model->find($id);
        
        if (!$commentaire) {
            die("Aucun commentaire n'a l'identifiant $id !");
        }
        
        /**
         * 4. Suppression réelle du commentaire
         * On récupère l'identifiant de l'article avant de supprimer le commentaire
         */
        
        
        $article_id = $commentaire['article_id'];
        
        $this->model->delete($id);
        
        /**
         * 5. Redirection vers l'article en question
         */
        \Http::redirect("index.php?controller=article&task=show&id=" . $article_id);
        
    }


}