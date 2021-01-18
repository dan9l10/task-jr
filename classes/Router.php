<?php
namespace classes;


class Router {

    private $params = [];
    private $routes = [];

    public function __construct()
    {
        $this->routes = include('config/routes.php');
    }

    private function getUri(){
        if(!empty($_SERVER['REQUEST_URI'])){
            $uri = trim($_SERVER['REQUEST_URI'],'/');
        }
        return $uri;
    }

    private function findMatches(){
        $uri = $this->getUri();
        foreach ($this->routes as $path => $controller){
            if(preg_match("~^$path$~",$uri)){
                $this->params = $controller;
                return true;
            }
        }
        return false;
    }

    public function run(){
        if($this->findMatches()){
            $controllerName = ucfirst($this->params['controller']).'Controller';
            $actionName = $this->params['action'].'Action';
            $path = 'controllers\\'.$controllerName;

            if(class_exists($path)){
                $objController = new $path($this->params);
                $objController->$actionName();
            }
        }else{
            echo  "404";
        }
    }


}