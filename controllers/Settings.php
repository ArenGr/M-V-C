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
        $this->view->new_prop = 'some_text';
        $this->view->render('settings');
    }
}
