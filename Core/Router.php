<?php 


namespace Core;


use Core\Response;
use Core\Database;


class Router {

    protected ?array $routes;


    public function get($uri, $controller, $logRequired=false) 
    {
        $this->set("GET", $uri, $controller, $logRequired);
    }


    public function post($uri, $controller, $logRequired=false) 
    {
        $this->set("POST", $uri, $controller, $logRequired);
    }


    public function patch($uri, $controller, $logRequired=false) 
    {
        $this->set("PATCH", $uri, $controller, $logRequired);
    }


    public function delete($uri, $controller, $logRequired=false) 
    {
        $this->set("DELETE", $uri, $controller, $logRequired);
    }


    public function route($method, $uri) 
    {
        foreach($this->routes as $route) 
        {
            if ($route["uri"] === $uri && $route["method"] == strtoupper($method)) {
                if ($route["loggingRequired"])
                {
                    if (!Database::authorized())
                    {
                        $this->abort($code=Response::FORBIDDEN);
                        die();
                    }
                }

                require base_path($route["controller"]);
                die();
            }
        }

        $this->abort();
    }


    protected function set($method, $uri, $controller, $logRequired) 
    {
        $this->routes[] = [
            "method" => strtoupper($method),
            "uri" => $uri,
            "controller" => $controller,
            "loggingRequired" => $logRequired
        ];
    }


    protected function abort($code=Response::NOT_FOUND)
    {
        http_response_code($code);
        require base_path("views/errors/{$code}.php");
        die();
    }
}