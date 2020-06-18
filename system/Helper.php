<?php
namespace system;
use Exception;

class Helper
{
  public function render($helper_file)
  {
    $view_file = "helpers/".$helper_file.".php";

    if (file_exists($view_file))
    {
      include $view_file;
      return true;
    }
    else
    {
      throw new Exception("{$view_file} not found");
    }
  }

  function __get($name)
  {
    $this->name = null;
  }
}

