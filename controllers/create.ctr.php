<?php 


$cssLinks = [];
$jsLinks = ["js/create.js"];


$title = "Create";
$errors = [];


use Core\App;
use Core\Database;
use Core\Response;
use Core\Validate;


$db = App::resolve(Database::class);
$validator = App::resolve(Validate::class);


if ($_SERVER["REQUEST_METHOD"] == "POST")
{

    if (!isset($_POST["title"]) || !isset($_POST["content"]))
    {
        echo response(Response::BAD_REQUEST, "error", "bad request");
        die();
    }


    $ptitle = $_POST["title"];
    $content = $_POST["content"];
    $uid = $_SESSION["uid"]; 


    if (empty($_POST["title"]) || empty($_POST["content"]))
    {
        $titleValidate = $validator->title($ptitle);
        $contentValidate = $validator->content($content);

        if ($titleValidate["status"] == "error")
            $errors["title"] = "*" . $titleValidate["output"];

        if ($contentValidate["status"] == "error")
            $errors["content"] = "*" . $contentValidate["output"];
        
        echo response(Response::SUCCESS, "error", $errors);
        die();
    }


    date_default_timezone_set("Asia/Colombo");
    $date = date("Y-m-d");


    // calculate the puid
    $puid = ++$db->find("select count(*) as c from post where uid=:uid", [":uid" => $uid])["c"];


    $db->find("insert into post(title, content, uid, cdate, puid) values (:title, :content, :uid, :cdate, :puid);", [
        ":title" => $ptitle, 
        ":content" => $content, 
        ":uid" => $uid,
        ":cdate" => $date,
        ":puid" => $puid
    ]);


    echo response(Response::SUCCESS, "success", "successfully posted");
    die();
}


view("/create", [
    "title" => $title,
    "cssLinks" => $cssLinks,
    "jsLinks" => $jsLinks,
    "logged" => Database::authorized()
]);
