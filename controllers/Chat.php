<?php
namespace controllers;
use models\User;
use system\Controller;

class Chat extends Controller
{
    public function converation($to_id)
    {
        $user = new User;
        $from_id = $_SESSION['user_id'];
        $chat_history = $user->get_chat_history($from_id, $to_id);
        $output = '';
        if ($chat_history->num_rows > 0)
        {
            while($row = $chat_history->fetch_assoc())
            {
                /* if ($from_id == $row['from_id']) { */
                    $image = '<tr><td><img src="../public/images/"'.$row['avatar'].'width="80px"></td></tr><br>';
                    $output.=$image.$row['body'].'<br>'.substr($row['date'], 0, -7).'<br>';
                /* } */
                /* else */
                /* { */
                /*     /1* $image = '<tr><td><img src="../public/images/"'.$row['avatar'].'width="80px"></td></tr><br></div>'; *1/ */
                /*     /1* $output.=$row['body'].'<br>'.substr($row['date'], 0, -7).$image.'<br>'; *1/ */
                /* } */
            }
        }
        if (!empty($_POST['send_button'])) {
            if (!empty($_POST['message']))
                $message = $_POST['message'];

            $timestamp = date("Y-m-d H:i:s");
            $result = $user->insert_message($from_id, $to_id, $message, $timestamp);
            if ($result) {
            }
        }

        $this->view->to_id = $to_id;
        $this->view->message = $output;
        $this->view->render('chatprofile');
    }
}
