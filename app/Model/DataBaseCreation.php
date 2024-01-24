<?php
namespace App\Model;
use PDO;
use PDOException;
use App\Model\Database;

class DataBaseCreation extends Database {

    private string $connServername;
    private string $connUsername;
    private string $connPassword;

    public function __construct($connServername = null, $connUsername = null, $connPassword = null) {
        
        $this->connServername = $connServername;
        $this->connUsername = $connUsername;
        $this->connPassword = $connPassword;
        parent::__construct();
    } 
    
    public function createNewDb($db) {

        return $this->createNewDbAbstract($db);

    }
}
?>
