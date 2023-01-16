<?php 
// Injetction des names spaces 

namespace Model; 

// Injection des dépendances 


require_once('libraries/databases.php');

abstract class Model {


    protected $pdo;
    protected $table;

    public function __construct()
    {
        $this->pdo = \Database::getPDO();
    }


    function find(int $id) {
    
    
    
        $query = $this->pdo->prepare("SELECT * FROM {$this->table} WHERE id = :id");
        
        // On exécute la requête en précisant le paramètre :article_id 
        $query->execute(['id' => $id]);
        
        // On fouille le résultat pour en extraire les données réelles de l'article
        $item = $query->fetch();
        
        return $item;
        
    }

    function delete(int $comment): void {

   

        $query = $this->pdo->prepare("DELETE FROM {$this->table} WHERE id = :id");
        $query->execute(['id' => $comment]);
    }

    function findAll(?string $order = ""): array { // si pas public = public


        $sql = "SELECT * FROM {$this->table}";

        if ($order) {
            $sql .= " ORDER BY " . $order;
        }

        $resultats = $this->pdo->query($sql);
        // On fouille le résultat pour en extraire les données réelles
        $articles = $resultats->fetchAll();
    
        return $articles;
    }
}