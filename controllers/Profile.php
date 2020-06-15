<?php
namespace controllers;

use models\User;
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
        $user = new User;
        $dir = "../public/images/";
        $avatar = $user->avatar($_SESSION['user_id'])->fetch_assoc()['avatar'];
        $avatar = $dir.$avatar;

        $this->view->user_name = $_SESSION['user_name'];
        $this->view->user_email = $_SESSION['user_email'];
        $this->view->avatar = $avatar;
        $this->view->render('profile');
    }
}

