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


// ------------------------------------------------------------------------------------------------------
// ----------------------------------------------- Login start ------------------------------------------
// ------------------------------------------------------------------------------------------------------

$router->map( 'GET', '/login', function(){
    require_once "app/View/login.php";
}, "loginForm");

$router->map( 'POST', '/login/loginValidate',function(){

    $authController = new AuthController();
    $authController->authLogin();

},  "loginValidate");

// ------------------------------------------------------------------------------------------------------
// ----------------------------------------------- Login end ------------------------------------------
// ------------------------------------------------------------------------------------------------------


// ------------------------------------------------------------------------------------------------------
// ----------------------------------------------- Register start ---------------------------------------
// ------------------------------------------------------------------------------------------------------

$router->map( 'GET', '/register', function(){
    require_once "app/View/register.php";
}, "registerForm");

$router->map( 'POST', '/register/registerValidate', function(){
    $authModel = new AuthController();
    $login = $_POST["login"];
    $password = $_POST["password"];

    $authModel->ControllerRegister($login, $password);
}, "registerValidate");


$router->map( 'POST', '/register/verifLog', function(){
    $authController = new AuthController();
    $login = $_POST["login"];
    $authController->ControllerCheckLoginAuth($login);
}, "checkLogin");


// ------------------------------------------------------------------------------------------------------
// ----------------------------------------------- Register end -----------------------------------------
// ------------------------------------------------------------------------------------------------------


$router->map( 'POST', '/starter-project/dbCreation', function(){
    $authController = new DataBaseCreate();
    $newServername = $_POST["newServername"];
    $newUsername = $_POST["newUsername"];
    $newPassword = $_POST["newPassword"];
    $db = $_POST["db"];
    $authController->createNewDb($newServername, $newUsername, $newPassword, $db);
}, "dbCreation");













// Matcher les routes
$match = $router->match();

// Vérifier si une route correspond
if($match && is_callable($match['target'])) {
    call_user_func_array($match['target'], $match['params']);
} else {
    // Aucune route correspondante trouvée
    header($_SERVER["SERVER_PROTOCOL"] . ' 404 Not Found');
}
