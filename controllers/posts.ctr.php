<?php


use Core\App;
use Core\Container;
use Core\Database;


$cssLinks = [];
$jsLinks = [];


$userId = $_SESSION["uid"];


$db = App::resolve(Database::class);
$posts = $db->findAll("
    select *, (select count(*) from plike where plike.pid=p.pid) as c from post as p 
    inner join user as u on u.uid=p.puid
    where p.puid=:uid;
", [ ":uid" => $userId ]);


foreach($posts as $key => $post)
{
    $posts[$key]["comments"] = $db->findAll("select * from comment where pid=:pid", [":pid" => $post["pid"]]);
}


view("index", [
    "title" => "Home", 
    "logged" => true,
    "cssLinks" => $cssLinks,
    "jsLinks" => $jsLinks,
    "posts" => $posts,
    "userId" => $userId
]);