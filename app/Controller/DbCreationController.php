<?php
namespace App\Controller;
use App\Database\DataBaseCreation;


class DbCreationController{


    public function controllerCreateNewDb(string $connServername, string $connUsername,string $connPassword, string $db){

        $connServername = trim(htmlspecialchars($connServername));
        $connUsername = trim(htmlspecialchars($connUsername));
        $connPassword = trim(htmlspecialchars($connPassword));
        $db = trim(htmlspecialchars($db));
        $dbName = str_replace(' ', '_', $db);

        $dbCreation = new DataBaseCreation($connServername, $connUsername, $connPassword);
        $dbCreation->createNewDb($dbName);
        // if ($dbCreation->createNewDb($dbName)) {
        //     echo json_encode(['success' => true, 'message' => "Database controller successful"], JSON_PRETTY_PRINT);
        // } else {
        //     echo json_encode(['success' => false, 'message' => "Database controller failed"], JSON_PRETTY_PRINT);
        // }
        

    }



}
