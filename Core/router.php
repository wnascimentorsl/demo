<?php


namespace Core;

class Router{

    protected $routes = [];

    public function add($method, $uri, $controllers)
    {
        $this->routes[] = [
            'uri' => $uri,
            'controllers' => $controllers,
            'method' => $method
        ];
    }

    public function get($uri , $controllers)
    {
        $this->add('GET', $uri, $controllers);          
    }

    public function post($uri , $controllers)
    {
        $this->add('POST', $uri, $controllers);    
    }

    public function delete($uri , $controllers)
    {
        $this->add('DELETE', $uri, $controllers);    
    }

    public function patch($uri , $controllers)
    {
        $this->add('PATCH', $uri, $controllers);    
    }

    public function put($uri , $controllers)
    {
        $this->add('PUT', $uri, $controllers);    
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




