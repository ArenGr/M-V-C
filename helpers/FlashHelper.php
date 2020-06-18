<?php
namespace helpers;

class FlashHelper
{
    static function setFlash($key, $value)
    {
        $_SESSION['message'][$key] = $value;
    }

    static function getFlash($key)
    {
        if(isset($_SESSION['message'][$key]))
        {
            $message = $_SESSION['message'][$key];
            unset($_SESSION['message'][$key]);
            return $message;
        }
        return null;
    }
}
