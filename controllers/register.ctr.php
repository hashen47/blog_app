<?php


$cssLinks = ["css/register.css"];
$jsLinks = [];


view("register", [
    "title" => "Register", 
    "logged" => false,
    "cssLinks" => $cssLinks,
    "jsLinks" => $jsLinks
]);