<?php

namespace App\Model;

use App\Database\AbstractDatabase;
use PDO;


class User extends AbstractDatabase
{

    private $login;
    private $id;

    public function __construct()
    {
        parent::__construct();
    }
    public function getLogin()
    {
        return $this->login;
    }

    public function setLogin($login)
    {
        $this->login = $login;
    }

    public function getId()
    {
        return $this->id;
    }


    public function checkLogin($login)
    {

        $sql = "SELECT login FROM users WHERE login = :login";
        $stmt = $this->bdd->prepare($sql);
        $stmt->execute([':login' => $login]);
        $student = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($student) {
            echo "existing";
            return "existing";
        } else {
            echo "notexisting";
            return "notexisting";
        }
    }



    public function checkIdUser($userId)
    {

        $sql = "SELECT id_user FROM users WHERE id_user = :id_user";
        $stmt = $this->bdd->prepare($sql);
        $stmt->execute([':id_user' => $userId]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user) {
            echo "existing";
            return "existing";
        } else {
            echo "notexisting";
            return "notexisting";
        }
    }


    public function register($login, $password)
    {
        $sql = "INSERT INTO `users`(`login`, `password`) VALUES (:login, :password)";
        $prepare = $this->bdd->prepare($sql);
        $prepare->execute([':login' => $login, ':password' => $password]);

        echo "registerOK";
        return "registerOK";
    }


    public function update($login, $password, $id)
    {
        $login = htmlspecialchars($login);
        $password = htmlspecialchars($password);
        $password = password_hash($password, PASSWORD_DEFAULT);

        $sql = "UPDATE `users` SET `login`=:login, `password`=:password WHERE id_user = :id";
        $prepare = $this->bdd->prepare($sql);
        $prepare->execute([':login' => $login, ':password' => $password, ':id' => $id]);
        if ($prepare) {
            echo "update success";
            return "update success";
        } else {
            echo "update failed";
            return "update failed";
        }
    }


    public function login($login, $password)
    {


        $sql = "SELECT * FROM users WHERE login = :login";
        $stmt = $this->bdd->prepare($sql);
        $stmt->execute([':login' => $login]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user) {
            if (password_verify($password, $user["password"])) {

                $_SESSION["user"]["id_user"] = $user["id_user"];
                $_SESSION["user"]["login"] = $user["login"];
                echo "loginOK";
                // return "loginOK";
                return true;
            } else {
                echo "loginFailpass";
                // return "loginFaipassl";
                return false;
            }
        } else {
            echo "loginFail";
            // return "loginFail";
            return false;
        }
    }
    
    public function createNewTableAbstract(string $db, string $table){

    }
    public function getAll(){

    }
    public function getOne(int $id){

    }
    public function updateTableAbstract(string $db, string $table){

    }
    public function dropTableAbstract(string $db, string $table){

    }
}
