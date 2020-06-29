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

    public function user($to_id)
    {
        $user = new User;
        if($result = $user->get_friends_data($to_id)->fetch_assoc())
        {
            $this->view->id = $result['id'];
            $this->view->name = $result['user_name'];
            $this->view->email = $result['email'];
            $this->view->avatar = $result['avatar'];
        }
        $this->view->render('friend');
    }

    public function friends()
    {
        if (isset($_POST['action'])) {
        $user = new User;
        $friends_details = array();
        $result = $user->get_friends_data();
        if($result->num_rows > 0)
        {
            while($row = $result->fetch_assoc())
            {
                array_push($friends_details, $row);
            }
        }
            echo json_encode($friends_details);
        }
    }
}
