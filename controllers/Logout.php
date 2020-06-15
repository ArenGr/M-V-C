<?php
namespace controllers;

class Logout
{
    function __construct()
    {
        unset($_SESSION['user_id']);
        unset($_SESSION['file_type_err']);
        unset($_SESSION['file_size_err']);
        header('Location: /');
    }
}

