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


function urlIs($url)
{
    return parse_url($_SERVER["REQUEST_URI"])["path"] === $url;
}


// linking a css file 
function linkCss($href)
{
    return "<link rel='stylesheet' href='{$href}' />";
}  


// linking js file
function linkJs($src)
{
    return "<script type='text/javascript' defer src='{$src}'></script>";
}  