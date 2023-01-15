<?php 

// Injection des names spaces pour les classes

namespace Model;

require_once('libraries/model/Model.php');

class User extends Model {

    protected $table = "users";

}