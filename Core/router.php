<?php


namespace Core;

class Router{

    protected $routes = [];

    public function get($uri , $controllers)
    {
        $this->routes[] = [
            'uri' => $uri,
            'controllers' => $controllers,
            'method' => 'GET'
        ];
            
    }

    public function post($uri , $controllers)
    {
        $this->routes[] = [
            'uri' => $uri,
            'controllers' => $controllers,
            'method' => 'POST'
        ];
    }

    public function delete($uri , $controllers)
    {
        $this->routes[] = [
            'uri' => $uri,
            'controllers' => $controllers,
            'method' => 'DELETE'
        ];
    }

    public function patch($uri , $controllers)
    {
        $this->routes[] = [
            'uri' => $uri,
            'controllers' => $controllers,
            'method' => 'PATCH'
        ];
    }

    public function put($uri , $controllers)
    {
        $this->routes[] = [
            'uri' => $uri,
            'controllers' => $controllers,
            'method' => 'PUT'
        ];
    }

    public function route($uri, $method)
    {
        {
          foreach ($this->routes as $route){
            if ($route['uri'] === $uri && $route['method'] === strtoupper($method)){
                return require base_path($route['controllers']);
            }
          }
        }

        $this->abort();
    }

    protected function abort($code = 404)
    {
        http_response_code($code);

        require base_path("views/{$code}.php");

        die();
    }
}




