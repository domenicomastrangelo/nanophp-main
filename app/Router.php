<?php

namespace App;

class Router
{
    private $URI;
    private $routes = [];

    public function __construct(string $URI, array $routes)
    {
        $this->URI = $URI;
        $this->routes = $routes;
        
        try {
            $this->checkRouteExists();
            $this->route($routes[$URI]);
        } catch (\Exception $e) {
            if (Config::DEBUG_MODE) {
                echo $e;
            } else {
                echo "404 - Page not found";
            }
        }
    }

    private function checkRouteExists()
    {
        if (!in_array($this->URI, array_keys($this->routes))) {
            throw new \Exception("Route $this->URI does not exist");
        }
    }

    private function route(string $controllerAndFunction)
    {
        try {
            $controller = '';
            $function   = '';
            list($controller, $function) = explode("@", $controllerAndFunction);
            $controller = "App\\Controllers\\" . $controller;
            
            if (!class_exists($controller)) {
                throw new \Exception("Class $controller not found");
            }
            
            $controllerObject = new $controller();

            if (!method_exists($controllerObject, $function)) {
                throw new \Exception("Method $function not found");
            }

            echo $controllerObject->$function();
        } catch (\Exception $e) {
            if (Config::DEBUG_MODE) {
                echo $e;
            } else {
                echo "500 - Internal Server Error";
            }
        }
    }
}
