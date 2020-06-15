<?php
namespace models;
use system\Model;

class User extends Model
{
    public function login($password, $email)
    {
        $result = $this->db->query_collector('SELECT', '*', 'users', 'WHERE', 'password', md5($password), 'AND', 'email', $email);
        if ($result)
            return $result;
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
        if ($result)
            return $result;
        return false;
    }

    public function image_upload($image, $user_id)
    {
        $result = $this->db->query_collector('UPDATE', ['avatar'=>$image], 'users', 'WHERE', 'id', $user_id);
        if ($result)
            return $result;
        return false;
    }
}
