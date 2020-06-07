<?php
namespace system;

class View {

    public $arg1 = "test1";
    public $arg2 = "test2";
    public $arg3 = "test3";
    public $attr = [];

    public function render($view_file, $attr = null){
        $view_file = "views/".$view_file.".php";
        if (file_exists($view_file)) {
            include $view_file;
            if (isset ($attr) && is_array($attr)){
                $this->attr = $attr; 
            }
        }else{
            echo "ERROR: file not found";
        }
    }
}