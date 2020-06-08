<?php
namespace system;

use Exception;

class View 
{

    public function render($view_file)
    {
        $view_file = "views/".ucfirst($view_file).".php";

        if (file_exists($view_file)) 
        {
            include $view_file;
            echo $this->new_prop;
        }
        else
        {
            throw new Exception("{$view_file} not found");
        }
    }
}
