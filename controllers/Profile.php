<?php
namespace controllers;
use helpers\FlashHelper;
use models\User;
use system\Controller;

class Profile extends Controller
{
    function __construct()
    {
        if (!isset($_SESSION['user_id']))
        {
            header("Location: /");
        }
        parent::__construct();
    }

    public function index()
    {
        $user = new User;
        $dir = "../public/images/";
        $avatar = $user->avatar($_SESSION['user_id']);
        if($avatar!=null)
            $avatar = $dir.$avatar;
        $this->view->avatar = $avatar;

        $user_data = $user->get_user_data($_SESSION['user_id']);
        $this->view->user_name = $user_data['user_name'];
        $this->view->user_email = $user_data['email'];

        $this->view->render('profile');
    }


    public function profileImage()
    {
        if($_SERVER["REQUEST_METHOD"] == "POST")
        {
            if (isset($_POST['change']))
            {
                if(isset($_FILES["image"]) && !empty($_FILES["image"]))
                {
                    $allowed_types = array("jpg" => "image/jpg", "jpeg" => "image/jpeg", "gif" => "image/gif", "png" => "image/png");
                    $file_name_local = $_FILES["image"]["name"];
                    $file_name_tmp = $_FILES["image"]["tmp_name"];
                    $file_size = $_FILES["image"]["size"];
                    $user_id = $_SESSION['user_id'];
                    $file_type_err ="";
                    $file_size_err="";
                    foreach ($file_name_local as $key => $value)
                    {
                        $ext = pathinfo($file_name_local[$key], PATHINFO_EXTENSION);
                        if(!array_key_exists($ext, $allowed_types))
                            $file_type_err = "Error: Please select a valid file format.";

                        $maxsize = 100 * 1024 * 1024;
                        if($file_size[$key] > $maxsize)
                            $file_size_err = "Error: File size is larger than the allowed_types limit.";

                        if(empty($file_size_err) && empty($file_type_err))
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
                        else
                        {
                            FlashHelper::setFlash('file_type_err', $file_type_err);
                            FlashHelper::setFlash('file_size_err', $file_size_err);
                            header("Location: /profile");
                        }
                    }
                }
            }
        }
    }

    public function friends()
    {
        $user = new User;
        $output = '';
        if($result = $user->get_friends_data())
        {
            
            foreach ($result as $row) {
               $output .= "<tr><td><img src='../public/images/$row[3]' width='80px'></td><td style='padding-left: 20px; padding-top:30px'><a href='chat/converation/$row[0]' id='friends_list' data-id='$row[0]'>$row[1]</a></td></tr><br>";
               $_SESSION['friend_id'] = $row[0];
            }
            echo $output;
        }
        /* return "ERRRRRRRRRRRRRRR"; */
    }
}
