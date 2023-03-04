<?php 


use Core\Database; 
use Core\Container;


$db = new Database();


$container = new Container();
$container->bind("model", $db);

