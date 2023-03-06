<?php


$cssLinks = [];
$jsLinks = ["js/comment.js", "js/delete.js"];


use Core\App;
use Core\Container;
use Core\Database;


$userId = (isset($_SESSION["uid"])) ? $_SESSION["uid"] : "";


// database connection
$db = App::resolve(Database::class);


$posts = $db->findAll("
    select p.*, u.name, (select count(*) from plike where plike.pid=p.pid) as c from post as p 
    inner join user as u on u.uid=p.uid
    order by p.pid desc;
");


foreach($posts as $key => $post)
{
    $posts[$key]["comments"] = $db->findAll("select * from comment where pid=:pid", [":pid" => $post["pid"]]);
}


view("index", [
    "title" => "Home", 
    "logged" => $db::authorized(),
    "cssLinks" => $cssLinks,
    "jsLinks" => $jsLinks,
    "posts" => $posts,
    "userId" => $userId
]);
