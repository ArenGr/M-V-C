<?php
namespace system;

use Exception;

class View
{

    public function render($view_file, $access = true)
    {
        if ($access)
        {
            $view_file = "views/auth/".$view_file.".php";
            if (file_exists($view_file))
            {
                include 'views/layouts/main.php';
            }
            else
            {
                throw new Exception("{$view_file} not found");
            }
        }
        include $view_file;

    }

    function __get($name)
    {
        $this->name = null;
    }
}
