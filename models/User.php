<?php
namespace models;
use system\Model;

class User extends Model
{
    public function login($password, $email)
    {
        $result = $this->db->query_collector($query =null, 'SELECT', '*', 'users', 'WHERE', 'password', md5($password), 'AND', 'email', $email);
        if ($result->num_rows == 1)
        {
            $user_data = $result->fetch_assoc();
            $_SESSION['user_id'] = $user_data['id'];
            return $user_data;
        }
        return false;
    }

    public function insert_user_data($query =null, $name, $email, $password)
    {
        $result = $this->db->query_collector('INSERT', ['user_name'=>$name, 'email'=>$email, 'password'=>md5($password)], 'users');
        if ($result)
            return $result;
        return false;
    }

    public function email_exists($email)
    {
        $result = $this->db->query_collector($query =null,'SELECT', 'email', 'users', 'WHERE', 'email', $email);
        if ($result->num_rows == 1)
            return true;
        return false;
    }

    public function avatar($user_id)
    {
        /* $avatar = $user->avatar($_SESSION['user_id'])->fetch_assoc()['avatar']; */
        $result = $this->db->query_collector($query =null,'SELECT', 'avatar', 'users', 'WHERE', 'id', $user_id);
        if ($result)
            return $result->fetch_assoc()['avatar'];
        return false;
    }

    public function image_upload($image, $user_id)
    {
        $result = $this->db->query_collector($query =null,'UPDATE', ['avatar'=>$image], 'users', 'WHERE', 'id', $user_id);
        if ($result)
            return $result;
        return false;
    }

    public function get_user_data($user_id)
    {
        $result = $this->db->query_collector($query =null,'SELECT', '*', 'users', 'WHERE', 'id', $user_id);
        if ($result)
        {
            $user_data = $result->fetch_assoc();
            return $user_data;
        }
        return false;
    }

    public function get_friends_data($to_id=null)
    {
        if ($to_id==null) {
            $result = $this->db->query_collector($query =null,'SELECT', 'id, user_name, email, avatar', 'users');
        }
        else 
        {
        $result = $this->db->query_collector($query =null,'SELECT', 'id, user_name, email, avatar', 'users', 'WHERE', 'id', $to_id);
        }

        if ($result)
        {
            /* $user_data = $result->fetch_assoc(); */
            return $result;
        }
        return false;
    }
}
