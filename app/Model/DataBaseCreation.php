


<?php


class DataBaseCreate{



    private $newServername;
    private $newUsername;
    private $newPassword;
    
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

