<?php
namespace system;
use controllers\Default_Ctrl;

class Routes {

    function __construct($components){

        if (!empty($components[0])) {

            $components = explode('/', $components);
            array_shift($components);

            $file = 'controllers'.DIRECTORY_SEPARATOR.ucfirst($components[0].'.php');

            if (file_exists($file)) {
                $ctrl_class = 'controllers\\'.ucfirst($components[0]);

                if (class_exists($ctrl_class)){
                    $ctrl_obj = new $ctrl_class();

                    if (!empty($components[1])){
                        $ctrl_method = $components[1];
                        if (method_exists($ctrl_obj, $ctrl_method)){
                            $ctrl_method_args = array_slice($components, 2);
                            call_user_func_array(array($ctrl_obj, $ctrl_method), $ctrl_method_args);
                        }else{
                            echo "ERROR: method dosn't exist";
                        }
                    }else{
                        if (method_exists($ctrl_obj, 'index')) {
                            $ctrl_obj->index();
                        }else{
                            echo "ERROR: method index not found";
                        }
                    }
                }else{
                    echo "ERROR: Class dosn't exist";
                }
            }else{
                if(class_exists('controllers\\Default_Ctrl')){
                    $default_ctrl_obj = new Default_Ctrl();
                    $default_ctrl_obj->default_method();
                }else{
                    echo "ERROR: default class dosn't exist";
                }
            }
        }else{
            if(class_exists('controllers\\Default_Ctrl')){
                $default_ctrl_obj = new Default_Ctrl();
                $default_ctrl_obj->default_method();
            }else{
                echo "ERROR: default class dosn't exist";
            }
        }
    }
}

