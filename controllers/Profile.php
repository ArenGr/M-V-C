<?php
namespace controllers;

use system\Controller;

class Profile extends Controller
{
    function __construct()
    {
        if (!isset($_SESSION['user_id']))
        {
            header("Location: /");
        }
        parent::__construct();
    }

    public function index()
    {
        $this->view->user_name = $_SESSION['user_name'];
        $this->view->user_email = $_SESSION['user_email'];
        $this->view->avatar = $_SESSION['avatar'];
        $this->view->render('profile');
    }
}

