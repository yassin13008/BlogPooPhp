<?php 

// Injetction des names spaces 

namespace Controller; 

// Injection des dépendances 


require_once('libraries/utils.php'); // fonction concernant les utilitaires du site (redirection, affichage)
require_once('libraries/model/Article.php'); // Class concernant les articles
require_once('libraries/model/Comment.php'); // Class concernant les commentaires
require_once('libraries/controller/Controller.php'); // Class concernant le controler

class Article extends Controller{

    protected $modelName = \model\Article::class;

    // La fonction index aura pour but de montrer la liste des articles 
    public function index() {


// $model = new \Model\Article();

$articles = $this->model->findAll("created_at DESC");

/**
 * 3. Affichage
 */
$pageTitle = "Acceuil";

render('articles/index', compact('pageTitle','articles'));

}

    // La fonction showArticle va nous permettre de voir un article 
    public function show(){


    $commentModel = new \Model\Comment();
// On part du principe qu'on ne possède pas de param "id"
    $article_id = null;

// Mais si il y'en a un et que c'est un nombre entier, alors c'est cool
if (!empty($_GET['id']) && ctype_digit($_GET['id'])) {
    $article_id = $_GET['id'];
}

// On peut désormais décider : erreur ou pas ?!
if (!$article_id) {
    die("Vous devez préciser un paramètre `id` dans l'URL !");
}


$pdo = getPDO();


$article = $this->model->find($article_id);


$commentaires = $commentModel->findAllWithArticle($article_id);


$pageTitle = $article['title'];

render('articles/show', compact('pageTitle','article','commentaires','article_id'));

    }

    // Ici je vais avoir la fonction qui supprime un article : delete()
    public function delete(){
        if (empty($_GET['id']) || !ctype_digit($_GET['id'])) {
            die("Ho ?! Tu n'as pas précisé l'id de l'article !");
        }
        
        $id = $_GET['id'];
        
        // Insertion de la class Article
        
        
        
        
        
        $article = $this->model->find($id);
        
        if (!$article) {
            die("L'article $id n'existe pas, vous ne pouvez donc pas le supprimer !");
        }
        
        /**
         * 4. Réelle suppression de l'article
         */
        $this->model->delete($id);
        
        /**
         * 5. Redirection vers la page d'accueil
         */
        redirect("index.php" );
        
    }

}