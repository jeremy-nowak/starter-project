<?php
namespace App\Model;
use PDO;
use PDOException;
use App\Model\AbstractDatabase;

class DataBaseCreation extends AbstractDatabase {



    public function __construct() {

        parent::__construct();
    } 
    
    public function createNewDb($db) {

        return $this->createNewDbAbstract($db);

    }


    public function createNewDbAbstract($db){

    }
    public function createNewTableAbstract($db, $table){

    }
    public function getAll(){

    }
    public function getOne($id){

    }
    public function updateTableAbstract($db, $table){

    }
    public function dropTableAbstract($db, $table){
        
    }
}
?>
