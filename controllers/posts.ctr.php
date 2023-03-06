<?php


$cssLinks = [];
$jsLinks = ["js/comment.js"];


use Core\App;
use Core\Container;
use Core\Database;


$userId = (isset($_SESSION["uid"])) ? $_SESSION["uid"] : "";


$db = App::resolve(Database::class);
$posts = $db->findAll("
    select *, (select count(*) from plike where plike.pid=p.pid) as c from post as p 
    inner join user as u on u.uid=p.uid
    where p.uid=:uid    
    order by p.pid desc;
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
