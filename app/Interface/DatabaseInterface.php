<?php
namespace App\Interfaces;

interface DatabaseInterface{

    public function createNewDbAbstract(string $db);
    public function createNewTableAbstract(string $db, string $table);
    public function getAll();
    public function getOne(int $id);
    public function updateTableAbstract(string $db, string $table);
    public function dropTableAbstract(string $db, string $table);

}