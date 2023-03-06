<?php 


use Core\App;
use Core\Database;
use Core\Response;


$db = App::resolve(Database::class);


if ($_SERVER["REQUEST_METHOD"] == "POST") 
{

    if (!isset($_POST["pid"]) || !isset($_POST["comment"]))
    {
        echo response(Response::BAD_REQUEST, "error", "bad request");
        die();
    }
    else if (empty($_POST["pid"]) || empty($_POST["comment"]))
    {
        echo response(Response::BAD_REQUEST, "error", "bad request");
        die();
    }


    if (!Database::authorized()) 
    {
        echo response(Response::FORBIDDEN, "error", "Can't comment without login");
        die();
    }


    $userId = $_SESSION["uid"];
    $pid = $_POST["pid"];
    $comment = $_POST["comment"];


    if (count($db->find("select * from post where pid=:pid", [":pid" => $pid])) == 0)
    {
        echo response(Response::BAD_REQUEST, "error", "invalid post id");
        die();
    }


    $db->find("insert into comment(pid, uid, text) values (:pid, :uid, :text);", [":pid" => $pid, ":uid" => $userId, ":text" => $comment]);


    echo response(Response::SUCCESS, "success", "comment successfully");
    die();

}
