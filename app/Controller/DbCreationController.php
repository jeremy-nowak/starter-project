<?php
namespace App\Controller;
use App\Model\DataBaseCreation;


class DbCreationController{


    public function controllerCreateNewDb(string $connServername, string $connUsername,string $connPassword, string $db){

        $connServername = trim(htmlspecialchars($connServername));
        $connUsername = trim(htmlspecialchars($connUsername));
        $connPassword = trim(htmlspecialchars($connPassword));
        $db = trim(htmlspecialchars($db));
        $dbName = str_replace(' ', '_', $db);

        $dbCreation = new DataBaseCreation($connServername, $connUsername, $connPassword);

        if($dbCreation->createNewDb($dbName) == true){
            echo "Database controller successfull";
            return true;
        }
        else{
            echo "Database controller failed";
            return false;
        }

    }



}
