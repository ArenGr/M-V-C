<?php

namespace controllers;

use system\Controller;

class Auth extends Controller
{
    function index()
    {
        var_dump($_POST);
        $this->view->render('login');

    }

    function reg()
    {
        var_dump($_POST);
        $this->view->render('reg');

    }

}
