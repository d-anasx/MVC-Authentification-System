<?php
require_once "vendor/autoload.php";

use App\Router\Router;
use App\Controllers\AuthController;
use App\Middleware\AuthMiddleware;


$request = $_SERVER["REQUEST_URI"];

$script_name = '/MVC-Authentification-System/';

$url = str_replace($script_name, '', $request);

$url = parse_url($url, PHP_URL_PATH);

$url = trim($url, '/');

$Router = new Router();

$Router->add("register", function () {
    echo "Hello";
    // $auth = new AuthController;
    // $auth->register();
});
$Router->add("login", function () {
    echo "Hello";
    // $auth = new AuthController;
    // $auth->login();
});
$Router->add("admin", function () {
    // $midWare = new AuthMiddleware;
    // $midWare->Check();
});
$Router->add("company", function () {
    // $midWare = new AuthMiddleware;
    // $midWare->Check();
});
$Router->add("candidate", function () {
    // $midWare = new AuthMiddleware;
    // $midWare->Check();
});

$Router->dispatch($url);
