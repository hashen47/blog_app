<?php


$cssLinks = ["css/login.css"];
$jsLinks = ["js/login.js"]; 


use Core\App;
use Core\Database;


$db = App::resolve(Database::class);


if ($_SERVER["REQUEST_METHOD"] == "POST")
{
    if (!isset($_POST["username"]) || !isset($_POST["password"])) 
    {
        echo json_encode(["status" => "error", "msg" => "usrename or password is empty"]);
        die();
    }
    else 
    {
        $username = htmlspecialchars(trim($_POST["username"])) ?? "";
        $password = htmlspecialchars(trim($_POST["password"])) ?? "";

        $status = $db->loging($username, $password);
        echo json_encode($status);
        die();
    }
}


view("login", [
    "title" => "Login", 
    "logged" => false,
    "cssLinks" => $cssLinks,
    "jsLinks" => $jsLinks
]);
