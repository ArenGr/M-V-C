<?php
namespace controllers;

use system\Controller;

class Settings extends Controller{

    public function general(){

        echo "general method";
    }

    public function index()
    {
        //$this->view->some_arg = 'some_text';
        array_push($this->view->attr, $this->view->arg1, $this->view->arg2, $this->view->arg3);

        $this->view->render('settings');
    }
}
