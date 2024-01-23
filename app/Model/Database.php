<?php
namespace App\Model;
use PDO;
use PDOException;

abstract class Database{
    protected $bdd;
    public $host;
    public $dbname;
    public $dbUser;
    public $dbPass;

    private $newServername;
    private $newUsername;
    private $newPassword;

    public function __construct(){
        
        $this->host = 'localhost';
        $this->dbname = 'nom de la base de donnée';
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

    public function createNewDb($newServername, $newUsername, $newPassword, $db){
        $this->newServername = $newServername;
        $this->newUsername = $newUsername;
        $this->newPassword = $newPassword;
    
        try {
            $conn = new PDO("mysql:host=$this->newServername", $this->newUsername, $this->newPassword);
        
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
            // Creating a database named with $db variable
            $sql = "CREATE DATABASE IF NOT EXISTS $db";
            $conn->exec($sql);
            
            echo "Database created successfully with the name $db";
        } catch (PDOException $e) {
            echo "Error creating database: " . $e->getMessage();
        }
        
        $conn = null;
    }
    
    }
?>
