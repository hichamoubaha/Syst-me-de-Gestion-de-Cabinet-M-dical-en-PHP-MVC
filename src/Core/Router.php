<?php
namespace App\Core;

class Router
{
    private $routes = [];

    public function addRoute($method, $path, $handler)
    {
        $this->routes[$method][$path] = $handler;
    }

    public function dispatch($method, $uri)
    {
        $path = parse_url($uri, PHP_URL_PATH);
        if (isset($this->routes[$method][$path])) {
            [$controller, $action] = $this->routes[$method][$path];
            $controllerInstance = new $controller();
            $controllerInstance->$action();
        } else {
            // Handle 404
            header("HTTP/1.0 404 Not Found");
            echo "404 Not Found";
        }
    }
}

