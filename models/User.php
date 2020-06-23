<?php
namespace models;
use system\Model;

class User extends Model
{
    public function login($password, $email)
    {
        $result = $this->db->query_collector('SELECT', '*', 'users', 'WHERE', 'password', md5($password), 'AND', 'email', $email);
        if ($result->num_rows == 1)
        {
            $user_data = $result->fetch_assoc();
            $_SESSION['user_id'] = $user_data['id'];
            return $user_data;
        }
        return false;
    }

    public function insert_user_data($name, $email, $password)
    {
        $result = $this->db->query_collector('INSERT', ['user_name'=>$name, 'email'=>$email, 'password'=>md5($password)], 'users');
        if ($result)
            return $result;
        return false;
    }

    public function email_exists($email)
    {
        $result = $this->db->query_collector('SELECT', 'email', 'users', 'WHERE', 'email', $email);
        if ($result->num_rows == 1)
            return true;
        return false;
    }

    public function avatar($user_id)
    {
        /* $avatar = $user->avatar($_SESSION['user_id'])->fetch_assoc()['avatar']; */
        $result = $this->db->query_collector('SELECT', 'avatar', 'users', 'WHERE', 'id', $user_id);
        if ($result)
            return $result->fetch_assoc()['avatar'];
        return false;
    }

    public function image_upload($image, $user_id)
    {
        $result = $this->db->query_collector('UPDATE', ['avatar'=>$image], 'users', 'WHERE', 'id', $user_id);
        if ($result)
            return $result;
        return false;
    }

    public function get_user_data($user_id)
    {
        $result = $this->db->query_collector('SELECT', '*', 'users', 'WHERE', 'id', $user_id);
        if ($result)
        {
            $user_data = $result->fetch_assoc();
            return $user_data;
        }
        return false;
    }

    public function get_friends_data()
    {
        $result = $this->db->query_collector('SELECT', 'id, user_name, email, avatar', 'users');
        if ($result)
        {
            $user_data = $result->fetch_all();
            return $user_data;
        }
        return false;
    }

    public function insert_message($from_id, $to_id, $body, $date)
    {
        $result = $this->db->query_collector('INSERT', ['from_id'=>$from_id, 'to_id'=>$to_id, 'body'=>$body, 'date'=>$date], 'messages');
        if ($result)
            return $result;
        return false;
    }

    public function get_chat_history($from_id, $to_id)
    {
        $result = $this->db->get_chat_data($from_id, $to_id);
        if ($result)
            return $result;
        return false;
    }
}
