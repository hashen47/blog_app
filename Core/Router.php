<?php 


namespace Core;


use Core\Response;


class Router {

    protected ?array $routes;


    public function get($uri, $controller) 
    {
        $this->set("GET", $uri, $controller);
    }


    public function post($uri, $controller) 
    {
        $this->set("POST", $uri, $controller);
    }


    public function patch($uri, $controller) 
    {
        $this->set("PATCH", $uri, $controller);
    }


    public function delete($uri, $controller) 
    {
        $this->set("DELETE", $uri, $controller);
    }


    public function route($method, $uri) 
    {
        foreach($this->routes as $route) 
        {
            if ($route["uri"] === $uri && $route["method"] == strtoupper($method)) {
                require base_path($route["controller"]);
                die();
            }
        }

        $this->abort();
    }


    protected function set($method, $uri, $controller) 
    {
        $this->routes[] = [
            "method" => strtoupper($method),
            "uri" => $uri,
            "controller" => $controller
        ];
    }


    protected function abort($code=Response::NOT_FOUND)
    {
        http_response_code($code);
        require base_path("views/errors/{$code}.php");
        die();
    }
}