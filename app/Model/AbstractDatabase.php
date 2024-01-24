<?php
namespace App\Model;
use App\Interface\DatabaseInterface;
use PDO;
use PDOException;

abstract class AbstractDatabase implements DatabaseInterface{
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
            if ($this->bdd) {
                echo "Connected to the <strong>$this->dbname</strong> database successfully!";
            }
        } catch (PDOException $e) {
            echo "Error : " . $e->getMessage();
            die();
        }
    }

    public function createNewDbAbstract($db) {
        try {
            $this->bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
            $sql = "CREATE DATABASE IF NOT EXISTS $db";
            $this->bdd->exec($sql);
            
            echo "Database created successfully with the name $db";

            return true;

        } catch (PDOException $e) {
            echo "Error creating database: " . $e->getMessage();

            return false;
        }
    }


    public function createNewTable($db, $table) {
        try {
            $this->bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
            $sql = "CREATE TABLE IF NOT EXISTS $db.$table (
                id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                firstname VARCHAR(30) NOT NULL,
                lastname VARCHAR(30) NOT NULL,
                email VARCHAR(50),
                reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
                )";
            $this->bdd->exec($sql);
            
            echo "Table $table created successfully in $db database";

            return true;

        } catch (PDOException $e) {
            echo "Error creating table: " . $e->getMessage();

            return false;
        }
    }

    public function dropTable($db, $table) {
        try {
            $this->bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
            $sql = "DROP TABLE $db.$table";
            $this->bdd->exec($sql);
            
            echo "Table $table dropped successfully in $db database";

            return true;

        } catch (PDOException $e) {
            echo "Error dropping table: " . $e->getMessage();

            return false;
        }
    }


}
?>
