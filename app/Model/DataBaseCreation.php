<?php
namespace App\Model;
use PDO;
use PDOException;
use App\Model\Database;

class DataBaseCreation extends Database {

    private string $connServername;
    private string $connUsername;
    private string $connPassword;

    public function __construct($connServername, $connUsername, $connPassword) {
        $this->connServername = $connServername;
        $this->connUsername = $connUsername;
        $this->connPassword = $connPassword;
        parent::__construct(); // Appeler le constructeur de la classe abstraite
    } 
    
    // Méthode spécifique à la classe concrète
    public function createNewDb($db) {
        // Appel de la méthode non statique de la classe abstraite
        return $this->createNewDb($db);
    }
}
?>
