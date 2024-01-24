<?php
namespace App\Model;
use PDO;
use PDOException;

abstract class Database {
    protected $bdd;
    public $host;
    public $dbname;
    public $dbUser;
    public $dbPass;

    public function __construct() {
        $this->host = 'localhost';
        $this->dbname = '';
        $this->dbUser = 'root';
        $this->dbPass = '';

        try {
            $this->bdd = new PDO("mysql:host=$this->host;dbname=$this->dbname;charset=utf8", $this->dbUser, $this->dbPass);
            $this->bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->bdd->exec("set names utf8");
        } catch (PDOException $e) {
            echo "Error : " . $e->getMessage();
            die();
        }
    }

    // Méthode non statique
    public function createNewDb($db) {
        try {
            $this->bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
            // Creating a database named with $db variable
            $sql = "CREATE DATABASE IF NOT EXISTS $db";
            $this->bdd->exec($sql);
            
            echo "Database created successfully with the name $db";

            return true;

        } catch (PDOException $e) {
            echo "Error creating database: " . $e->getMessage();

            return false;
        }
    }
}
?>
