<?php
namespace App\Interfaces;

interface AbstractDatabaseInterface{

    public function createNewDbAbstract($db);
    public function createNewTableAbstract($db, $table);
    public function getAll();
    public function getOne($id);
    public function updateTableAbstract($db, $table);
    public function dropTableAbstract($db, $table);

}