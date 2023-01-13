<?php

require_once('libraries/databases.php');
require_once ('libraries/utils.php');

require_once('libraries/model/Comment.php');

/**
 * DANS CE FICHIER ON CHERCHE A SUPPRIMER LE COMMENTAIRE DONT L'ID EST PASSE EN PARAMETRE GET !
 * 
 * On va donc vérifier que le paramètre "id" est bien présent en GET, qu'il correspond bien à un commentaire existant
 * Puis on le supprimera !
 */

/**
 * 1. Récupération du paramètre "id" en GET
 */
if (empty($_GET['id']) || !ctype_digit($_GET['id'])) {
    die("Ho ! Fallait préciser le paramètre id en GET !");
}

$id = $_GET['id'];


// Insertion de la class comment

$model = new Comment();


/**
 * 3. Vérification de l'existence du commentaire
 */
$commentaire = $model->find($id);

if (!$commentaire) {
    die("Aucun commentaire n'a l'identifiant $id !");
}

/**
 * 4. Suppression réelle du commentaire
 * On récupère l'identifiant de l'article avant de supprimer le commentaire
 */


$article_id = $commentaire['article_id'];

$model->delete($id);

/**
 * 5. Redirection vers l'article en question
 */
redirect("article.php?id=" . $article_id);
