<?php


$cssLinks = ["css/login.css"];
$jsLinks = [];


view("login", [
    "title" => "Login", 
    "logged" => false,
    "cssLinks" => $cssLinks,
    "jsLinks" => $jsLinks
]);
