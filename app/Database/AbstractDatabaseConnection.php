<?php
namespace App\Database;
use PDO;
use PDOException;

abstract class DatabaseConnection {
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
            die();
        }
    }



    public function getHostConnection() {
        return $this->host;
    }   
    public function setHostConnection($host) {
        $this->host = $host;
    }

    public function getDbNameConnection() {
        return $this->dbname;
    }
    public function setDbNameConnection($dbname) {
        $this->dbname = $dbname;
    }

    public function getDbUserConnection() {
        return $this->dbUser;
    }
    public function setDbUserConnection($dbUser) {
        $this->dbUser = $dbUser;
    }

    public function setDbPassConnection($dbPass) {
        $this->dbPass = $dbPass;
        }
}