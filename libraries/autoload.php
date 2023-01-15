<?php 

spl_autoload_register(function($className){ 

// spl_autoload_register est une fonction qui nous permet de charger des class selon la page ou est (s'il y a biensur des class qu'on utilise dans la page en question)
// => cela évite de faire des requires à la longue 
//  Par exemple dans index => on appel bien la class article du Controller.

//(y a aussi la technique du contrôller et des routes comme çelle du prof de wbf3 )

// C'est une fonction qui prends en paramettre une fonction qui va s'occuper de faire le chargement de la page depuis une class d'objet
// la variable className corresponds à la class en question et c'est elle qu'on insère dans le paramètre de la fonction qu'on appelle dans le spl_auto...

var_dump($className); // le resultat est => "Controller\Article"

// On remarque qu'ici y a des anti slash \ Nous on veux le chemin 
// Rappel, les anti slash \ c'est pour les class
// C'est slash / c'est pour les chemins des dossiers 
// Donc on veux que cela apparaissent en libraries/controller/Article 

//ATTENTION, FAIRE ATTENTION AU NOMS D'APPEL DES FICHIERS

// On va changer les slash dans un premier temps

$className = str_replace("\\","/", $className); // fonctions qui change les éléments dans une chaine de caractere
// 1er parametre => la valeur qu'on veut changer
// 2eme "" => ceux avec quoi on va le changer
// 3eme ""=> La chaine de caractère en question => ici elle est contenue dans la variable classe name (qui contient => Controller\Article )

// Cela va donner controller/Article

// Une fois ça fait on va faire le require ici ( de base, sur la page en question on appeler le controller via le require )

require_once ("libraries/$className.php"); // Ce qui donne libraries/Controller/Article 

// Apres il nous suffira d'appeler seulement cette page sur les pages php qu'on aura besoin 
// plus de 600 require_once à faire => pas de repetition

});