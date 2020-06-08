<?php
namespace controllers;

use system\Controller;

class Settings extends Controller
{
    public function general()
    {
        echo "general method";
    }

    public function index()
    {
        $this->view->new_prop;
        $this->view->rop;
        $this->view->render('settings');
    }
}
