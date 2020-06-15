<?php
namespace controllers;

use models\User;
use system\Controller;

class ProfileImage extends Controller
{
    function __construct()
    {
        if($_SERVER["REQUEST_METHOD"] == "POST")
        {
            if (isset($_POST['change'])) 
            {
                if(isset($_FILES["image"]) && !empty($_FILES["image"]))
                {
                    $allowed_types = array("jpg" => "image/jpg", "jpeg" => "image/jpeg", "gif" => "image/gif", "png" => "image/png");
                    $file_name_local = $_FILES["image"]["name"];
                    $file_type = $_FILES["image"]["type"];
                    $file_name_tmp = $_FILES["image"]["tmp_name"];
                    $file_size = $_FILES["image"]["size"];
                    $user_id = $_SESSION['user_id'];
                    foreach ($file_name_local as $key => $value)
                    {
                        $ext = pathinfo($file_name_local[$key], PATHINFO_EXTENSION);
                        if(!array_key_exists($ext, $allowed_types))
                            $_SESSION['file_type_err'] = "Error: Please select a valid file format.";

                        $maxsize = 100 * 1024 * 1024;
                        if($file_size[$key] > $maxsize) 
                            $_SESSION['file_size_err'] = "Error: File size is larger than the allowed_types limit.";

                        if(in_array($file_type[$key], $allowed_types))
                        {
                            $new_image_name = round(microtime(true) * 1000).'.'.$ext;
                            $file_path = "./public/images/".$new_image_name;
                            if (move_uploaded_file($file_name_tmp[$key], $file_path))
                            {
                                $user = new User;
                                if($user->image_upload($new_image_name, $user_id))
                                {
                                    header("Location: /profile");
                                }
                            }
                        }
                    }
                }
            }
        }
    }
}
