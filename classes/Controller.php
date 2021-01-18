<?php
namespace classes;

class Controller{
    protected $view;
    private $params=[];

    public function __construct($params){
        $this->params = $params;
        $this->view = new View($this->params);

    }

}