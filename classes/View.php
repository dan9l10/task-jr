<?php
namespace classes;

class View{

    private $path=[];

    public function __construct($params){
        $this->path = $params['controller'].'/'.$params['action'];
    }


    public function render($title, $vars=[]){
        $pathToView ='views/'.$this->path.".php";
        include ($pathToView);
    }
}