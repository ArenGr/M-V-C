<?php

namespace controllers;

use system\Controller;

class Auth extends Controller
{
    function index()
    {
        var_dump($_POST);
        $this->view->render('login'); //Second param default true

    }

    function reg()
    {
        var_dump($_POST);
        $this->view->render('reg');

    }

}
