<?php 


$router->get("/", "controllers/index.ctr.php");
$router->get("/home", "controllers/index.ctr.php");
$router->get("/posts", "controllers/posts.ctr.php", $logRequired=true);


$router->get("/update", "controllers/update.ctr.php", $logRequired=false);
$router->post("/update", "controllers/update.ctr.php", $logRequired=false);


$router->get("/create", "controllers/create.ctr.php", $logRequired=true);
$router->post("/create", "controllers/create.ctr.php", $logRequired=true);


$router->get("/login", "controllers/login.ctr.php");
$router->post("/login", "controllers/login.ctr.php");


$router->get("/register", "controllers/register.ctr.php");
$router->post("/register", "controllers/register.ctr.php");


$router->get("/logout", "controllers/logout.ctr.php");


$router->delete("/delete", "controllers/delete.ctr.php");


$router->post("/comment", "controllers/comment.ctr.php");
