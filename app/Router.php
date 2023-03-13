<?php

namespace Miniframework;

use Miniframework\Exceptions\MethodNotAllowedException;
use Miniframework\Exceptions\RouteNotFoundException;

class Router
{
    protected array $routes = [];
    protected array $methods = [];
    protected string $path;
    public function setPath($path = '/')
    {
        $this->path = $path;
    }
    public function addRoute($uri, $handler, array $methods = ['GET'])
    {
        $this->routes[$uri] = $handler;
        $this->methods[$uri] = $methods;
    }
    public function getResponse()
    {
        if(!isset($this->routes[$this->path]))
        {
            throw new RouteNotFoundException();
        }
        if(!in_array($_SERVER['REQUEST_METHOD'], $this->methods[$this->path]))
        {
            throw new MethodNotAllowedException();
        }
        return $this->routes[$this->path];
    }
}