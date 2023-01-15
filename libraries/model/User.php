<?php 

// Injection des names spaces pour les classes

namespace Model;

// Injection de l'auto loading 

require_once ('libraries/autoload.php');

// require_once('libraries/model/Model.php');

class User extends Model {

    protected $table = "users";

}