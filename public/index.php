<?php 


session_start();


require "../Core/functions.php";
require base_path("Core/Validator/vendor/autoload.php"); // external validator autoloader 


spl_autoload_register(function($class) {
    $path = str_replace("\\", DIRECTORY_SEPARATOR, $class);
    require base_path("{$path}.php");
});


require base_path("bootstrap.php");


// Handle Routes
$router = new \Core\Router();
require base_path("routes.php");

$uri = parse_url($_SERVER["REQUEST_URI"])["path"];
$method = $_SERVER["REQUEST_METHOD"];

$router->route($method, $uri);