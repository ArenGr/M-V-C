<?php
use system\Routes;

spl_autoload_register(function($class_name){
    include str_replace("\\", DIRECTORY_SEPARATOR,  $class_name) .".php";

});

$url_path = $_SERVER['REQUEST_URI'];

$routes = new Routes($url_path);
