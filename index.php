<?php
require 'vendor/autoload.php';
session_start();
$router = new AltoRouter();
$router->setBasePath('/starter-project');
use App\Model\Model;
use App\View\View;
use App\Controller\AuthController;
use App\Controller\TodoController;
use App\Model\User;


$router->map( 'GET', '/', function(){
    require_once "app/View/home.php";
});

$router->map( 'GET', '/login', function(){
    require_once "app/View/login.php";
}, "loginForm");

$router->map( 'GET', '/register', function(){
    require_once "app/View/register.php";
}, "registerForm");



















// Matcher les routes
$match = $router->match();

// Vérifier si une route correspond
if($match && is_callable($match['target'])) {
    call_user_func_array($match['target'], $match['params']);
} else {
    // Aucune route correspondante trouvée
    header($_SERVER["SERVER_PROTOCOL"] . ' 404 Not Found');
}
