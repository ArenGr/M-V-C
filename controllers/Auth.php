<?php
namespace controllers;
use models\User;
use system\Controller;

class Auth extends Controller
{
    function index()
    {
        $user = new User();
        if(!empty($_POST['login_submit']))
        {
            $email = $_POST['email'];
            $password = $_POST['password'];

            if (empty($_POST['email']))
                $this->view->log_email_err = "Sorry, email is required";

            if (empty($_POST['password']))
                $this->view->log_pass_err = "Sorry, password is required";


            if (empty($this->view->log_email_err) && empty($this->view->log_pass_err))
            {
                if($result = $user->login($password, $email)){
                    if($result->num_rows == 1)
                    {
                        $user_data = $result->fetch_assoc();
                        $_SESSION['user_id'] = $user_data['id'];
                        $_SESSION['user_name'] = $user_data['user_name'];
                        $_SESSION['user_email'] = $user_data['email'];
                        header("Location: /profile");
                    }
                    else
                    {
                        $this->view->log_pass_err = "Sorry, the email or password is incorrect";
                    }
                }
            }
        }

        $this->view->render('login');
    }

    function reg()
    {
        $user = new User();
        if (!empty($_POST['reg_submit']))
        {
            $name = $_POST['input_user_name'];
            $email = $_POST['input_email'];
            $password = $_POST['input_password'];
            $conf_password = $_POST['input_conf_password'];

            if(empty($name))
                $this->view->r_name_err = "Sorry, user name is required.";
            elseif (!preg_match("/^[A-Za-z0-9]+(?:[ _-][A-Za-z0-9]+)*$/", $name))
                $this->view->r_name_err = "Sorry, user name is invalid.";

            if(empty($email))
                $this->view->r_email_err = "Sorry, email is required.";
            elseif (!(filter_var($email, FILTER_VALIDATE_EMAIL)))
                $this->view->r_email_err = "Sorry, invalid email.";

            if (empty($password) || empty($conf_password) || $password != $conf_password)
                $this->view->r_password_err = "Sorry, your password dosn`t match. Please, try again.";

            if ($user->email_exists($email)->num_rows==1)
                $this->view->r_email_err = "Sorry email already exists";

                if (empty($this->view->r_name_err) && empty($this->view->r_email_err) && empty($this->view->r_password_err))
                {
                    if($user->insert_user_data($name, $email, $password))
                    {
                        header("Location: /");
                    }
                    else
                    {
                        //error page
                    }
                }
        }
        $this->view->render('reg');
    }
}
