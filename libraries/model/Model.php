<?php 

require_once('libraries/databases.php');

class Model {


    protected $pdo;

    public function __construct()
    {
        $this->pdo = getPDO();
    }

}