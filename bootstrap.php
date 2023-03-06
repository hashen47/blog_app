<?php 


use Core\App;
use Core\Database; 
use Core\Container;
use Core\Validate;


$container = new Container();


$container->bind(Database::class, function () {
    return new Database();
});


$container->bind(Validate::class, function () {
    return new Validate();
});


App::setContainer($container);

