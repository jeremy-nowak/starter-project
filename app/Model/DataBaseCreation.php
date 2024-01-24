<?php

namespace App\Model;
use PDO;
use PDOException;

class DataBaseCreation{

    private string $connServername;
    private string $connUsername;
    private string $connPassword;

    public function __construct($connServername, $connUsername, $connPassword){
        
        $this->connServername = $connServername;
        $this->connUsername = $connUsername;
        $this->connPassword = $connPassword;
    } 
    
    public function createNewDb($db){

    
        try {
            $conn = new PDO("mysql:host=$this->connServername", $this->connUsername, $this->connPassword);
        
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
            // Creating a database named with $db variable
            $sql = "CREATE DATABASE IF NOT EXISTS $db";
            $conn->exec($sql);
            
            echo "Database created successfully with the name $db";

            return $conn;

        } catch (PDOException $e) {
            echo "Error creating database: " . $e->getMessage();
            return $conn;
            
        }
        
        $conn = null;
    }
}

