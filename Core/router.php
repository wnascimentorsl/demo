<?php


namespace Core;

class router{

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
            'method' => 'GET'
        ];
    }

    public function patch($uri , $controllers)
    {
        $this->routes[] = [
            'uri' => $uri,
            'controllers' => $controllers,
            'method' => 'GET'
        ];
    }

    public function put($uri , $controllers)
    {
        $this->routes[] = [
            'uri' => $uri,
            'controllers' => $controllers,
            'method' => 'GET'
        ];
    }

    public function route($uri)
    {
        {
          foreach ($this->routes as $route){
            if ($route['uri'] === $uri $$ $route['method'] === strtoupper($method)){
                return require base_path($route['controller']);
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




