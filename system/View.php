<?php
namespace system;

use Exception;

class View
{

    public function render($view_file, $switch = true)
    {
        $view_file = "views/auth/".$view_file.".php";

        if ($switch)
        {
            if (file_exists($view_file))
            {
                include 'views/layouts/main.php';
                return true;
            }
            else
            {
                throw new Exception("{$view_file} not found");
            }
        }
            
        try 
        {
            include $view_file;
        } 
        catch (Exception $e) 
        {
            echo $e->getMessage();
        }

    }

    function __get($name)
    {
        $this->name = null;
    }
}
