<?php
namespace models;
use system\Model;

class User extends Model
{
    public function login($email, $password)
    {
        $email = $this->db->connection->real_escape_string($email);
        $password = md5($password);

        $query_log = "SELECT * FROM users WHERE password='$password' AND email='$email'";

        $result = $this->db->connection->query($query_log);
        return $result;
    }

    public function registration($name, $email, $password)
    {
        $name = $this->db->connection->real_escape_string($name);
        $email = $this->db->connection->real_escape_string($email);
        $password = md5($password);

        $query_reg = "INSERT INTO users (user_name, email, password) VALUES ('$name', '$email', '$password')";

        $result = $this->db->connection->query($query_reg);
        return $result;
    }

    public function email_exists($email)
    {
        $email = $this->db->connection->real_escape_string($email);
        $query_email = "SELECT * FROM users WHERE email='$email' LIMIT 1";

        if ($this->db->connection->query($query_email)->num_rows == 1)
        {
            return true;
        }
        else
        {
            return false;
        }
    }
}
