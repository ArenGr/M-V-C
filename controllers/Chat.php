<?php
namespace controllers;
use models\Messages;
use system\Controller;

class Chat extends Controller
{
    public function conversation($to_id, $name='')
    {
        $chat = new Messages;
        $from_id = $_SESSION['user_id'];
        $chat_history = $chat->get_chat_history($from_id, $to_id);
        $user_messages = array();
        if ($chat_history->num_rows >= 1)
        {
            while($row = $chat_history->fetch_assoc())
            {
                if ($row['from_id'] == $from_id)
                {
                    array_push($user_messages,['body'=> $row['body'], 'date'=>substr($row['date'],0, -7), 'avatar'=>$row['avatar'], 'from_to_id'=>$from_id]);
                }
                else
                {

                    array_push($user_messages,['message_id'=>$row['id'], 'body'=> $row['body'], 'date'=>substr($row['date'],0, -7), 'avatar'=>$row['avatar'], 'from_to_id'=>$to_id]);
                }
            }
        }

        $this->view->name = $name;
        $this->view->user_messages = $user_messages;
        $this->view->to_id = $to_id;
        $this->view->render('chatprofile', false);
    }

    public function InsertMessage()
    {
        if ($_POST['act'])
        {
            $chat = new Messages;
            $from_id = $_SESSION['user_id'];
            $to_id = $_POST['to_id'];
            $message = $_POST['message'];
            $timestamp = date("Y-m-d H:i:s");
            $response[0] = $message;
            $response[1] = $timestamp;
            $result = $chat->insert_message($from_id, $to_id, $message, $timestamp);
            if ($result)
            {
                echo json_encode($response);
            }
        }
    }

    public function update_chat()
    {
        $from_id = $_SESSION['user_id'];
        $to_id = $_POST['friendId'];
        $chat = new Messages;
        $result = $chat->last_messages($from_id, $to_id);
        $new_messages = array();
        if ($result->num_rows >= 1)
        {
            while($row = $result->fetch_assoc())
            {
                array_push($new_messages, ['body'=> $row['body'], 'date'=>substr($row['date'],0, -7), 'avatar'=>$row['avatar']]);
            }
        }
        if (count($new_messages)>0)
            echo json_encode($new_messages);
    }

}



