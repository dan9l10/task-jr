<?php
namespace controllers;

use classes\Controller;
use classes\View;

class MainController extends Controller {

    public function showAction(){
        $this->view->render('Hello');
    }

    public function addAction(){

        $this->view->render('Hello');
    }

}
