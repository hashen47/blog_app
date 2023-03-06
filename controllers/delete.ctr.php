<?php


use Core\App;
use Core\Database;
use Core\Response;


$db = App::resolve(Database::class);


if ($_SERVER["REQUEST_METHOD"] == "DELETE") {

    parse_str(file_get_contents("php://input"), $variables);
    extract($variables);


    if (!isset($pid))
    {
        echo response(Response::BAD_REQUEST, "error", "bad request");
        die();
    }


    $uid = $_SESSION["uid"];


    if (empty($pid))
    {
        echo response(Response::BAD_REQUEST, "error", "bad request");
        die();
    }


    // check whether that post is exists and current user have persmission to delete it  
    if (count($db->find("select * from post where pid=:pid and uid=:uid", [":pid" => $pid, ":uid" => $uid])) == 0)
    {
        echo response(Response::BAD_REQUEST, "error", "bad request");
        die();
    }


    // delete the post 
    $db->find("delete from post where pid=:pid", [":pid" => $pid ]);


    echo response(Response::SUCCESS, "success", "successfully delete the post");
    die();
}

