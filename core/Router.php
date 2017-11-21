<?php

namespace App\Core;

class Router
{
    public $routes = ['GET' => [],
                      'POST' => []
                     ];
        
    public  static function load($file)
    {
        $router = new static;
        require $file;     
        return $router;
    }

    public function get($uri, $controller)
    {
	$this->routes['GET'][$uri] = $controller;
    }

    public function post($uri, $controller)
    {
    	$this->routes['POST'][$uri] = $controller;
    }   
        
    public function direct($uri, $requestType)
    {
        $rest = explode('/', $uri);                
        if(empty($rest[1]))
        {
            $fg = explode('@', $this->routes[$requestType][$rest[0]]);
        }
        else
        {
            $fg = explode('@', $this->routes[$requestType][$rest[0]."/".$rest[1]]);
        }         
        if(!empty($rest[1]))
        {
            $tmp = $rest[0] . "/" . $rest[1];
        }
        else 
        {
            $tmp = $rest[0];
        }
	if(array_key_exists($tmp, $this->routes[$requestType]))
	{
            return $this->callAction($fg[0], $fg[1]);              
	} 
	throw new \Exception('Route not defined!');	
    }

    protected function callAction($controller, $action)
    {
        $controller = "App\\Controllers\\{$controller}";
        $controller = new $controller;
        if (! method_exists($controller, $action)) 
        {
            throw new \Exception("Chosen controller doesnt have {$action} method! ");	
        }
        return $controller->$action();
    }
}