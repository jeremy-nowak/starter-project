<?php
namespace App\Controller;
use App\Model\DataBaseCreation;


class DbCreationController{



    public function controllerCreateNewDb($newServername, $newUsername, $newPassword, $db){

        $dbCreation = new DataBaseCreation();
        $dbCreation->createNewDb($newServername, $newUsername, $newPassword, $db);


    }


}