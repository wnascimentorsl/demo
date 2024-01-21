<?php


namespace Core;

use Core\Middleware\Authenticated;
use Core\Middleware\Guest;
use Core\Middleware\Middleware;


class Router
{

    protected $routes = [];

    public function add($method, $uri, $controllers)
    {
        $this->routes[] = [
            'uri' => $uri,
            'controllers' => $controllers,
            'method' => $method,
            'middleware' => null
        ];

        return $this;
    }

    public function get($uri, $controllers)
    {
        return $this->add('GET', $uri, $controllers);
    }

    public function post($uri, $controllers)
    {
        return $this->add('POST', $uri, $controllers);
    }

    public function delete($uri, $controllers)
    {
        return $this->add('DELETE', $uri, $controllers);
    }

    public function patch($uri, $controllers)
    {
        return $this->add('PATCH', $uri, $controllers);
    }

    public function put($uri, $controllers)
    {
        return $this->add('PUT', $uri, $controllers);
    }

    public function only($key)
    {
        $this->routes[array_key_last($this->routes)]['middleware'] = $key;

        return $this;
    }

    public function route($uri, $method)
    { {
            foreach ($this->routes as $route) {
                if ($route['uri'] === $uri && $route['method'] === strtoupper($method)) {
                    Middleware::resolve($route['middleware']);

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
