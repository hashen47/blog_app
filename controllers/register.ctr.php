<?php


$cssLinks = ["css/register.css"];
$jsLinks = ["js/register.js"];


use Core\App;
use Core\Database;
use Core\Response;


$db = App::resolve(Database::class);


if ($_SERVER["REQUEST_METHOD"] == "POST")
{
    if (!isset($_POST["username"]) && !isset($_POST["password"]) && !isset($_POST["repassword"]))
    {
        echo response(Response::BAD_REQUEST, "error", "bad request");
        die();
    }

    $username = htmlspecialchars(trim($_POST["username"]));
    $password = htmlspecialchars(trim($_POST["password"]));
    $repassword = htmlspecialchars(trim($_POST["repassword"]));


    if (empty($username) && empty($password) && empty($repassword))
    {
        echo response(Response::SUCCESS, "error", "All fields are required");
        die();
    }

    
    // check whether this username is already exists in the user table
    $records = $db->find("select * from user where name=:name", [":name" => $username]);
    $alreadyExists = ($records) ? true : false; 

    if ($alreadyExists)
    {
        echo response(Response::SUCCESS, "error", "username is already exists"); 
        die();
    }


    // check password and re-password are same
    if ($password != $repassword)
    {
        echo response(Response::SUCCESS, "error", "passwords are not equal"); 
        die();
    }


    // save the new user
    $hash = password_hash($password, PASSWORD_DEFAULT);
    $db->find("insert into user(hash, name) values (:hash, :name)", [
        ":hash" => $hash,
        ":name" => $username
    ]);


    echo response(Response::SUCCESS, "success", "successfully register the user"); 
    die();

}


view("register", [
    "title" => "Register", 
    "logged" => Database::authorized(),
    "cssLinks" => $cssLinks,
    "jsLinks" => $jsLinks
]);
