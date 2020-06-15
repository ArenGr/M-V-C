<?php
use system\Routes;
session_start();

spl_autoload_register(function($class_name){
    include './'.str_replace("\\", DIRECTORY_SEPARATOR,  $class_name) .".php";
});

$url_path = explode('/', substr($_SERVER['REQUEST_URI'], 1));

$routes = new Routes($url_path);


