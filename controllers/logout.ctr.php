<?php

$title = "Logout";


if (isset($_SESSION["uid"])) 
{
    session_unset();
    session_destroy();
}


header("location: /home");
die();