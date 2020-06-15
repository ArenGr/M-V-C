<?php
namespace controllers;

class Logout
{
    function __construct()
    {
        unset($_SESSION['user_id']);
        header('Location: /');
    }
}

