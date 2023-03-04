<?php


$BASE_PATH = __DIR__ . "/../";


function base_path($path)
{
    global $BASE_PATH;
    return $BASE_PATH . $path;
}


function view($path, array $params = [])
{
    extract($params);
    require base_path("views/{$path}.view.php");
}


function dd($value)
{
    echo "<pre>";
    var_dump($value);
    echo "</pre>";
    die();
}