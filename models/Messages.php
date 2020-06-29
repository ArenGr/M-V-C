<?php
namespace models;
use system\Model;

class Messages extends Model
{
    public function insert_message($from_id, $to_id, $body, $date)
    {
        $result = $this->db->query_collector($query=null, 'INSERT', ['from_id'=>$from_id, 'to_id'=>$to_id, 'body'=>$body, 'date'=>$date], 'messages');
        if ($result)
            return $result;
        return false;
    }

    public function get_chat_history($from_id, $to_id)
    {
        $query = "SELECT messages.*, users.avatar, users.user_name FROM messages LEFT JOIN users ON messages.from_id = users.id WHERE (from_id='$from_id' AND to_id='$to_id') OR (from_id='$to_id' AND to_id='$from_id') ORDER BY date ASC";
        $result = $this->db->query_collector($query);
        if ($result)
            return $result;
        return false;
    }

    public function last_messages($from_id, $to_id)
    {
        $query = "SELECT messages.*, users.avatar FROM messages LEFT JOIN users ON messages.from_id = users.id WHERE (messages.from_id='$to_id' AND messages.to_id='$from_id') AND messages.date > (NOW()-INTERVAL 5 SECOND)";
        $result = $this->db->query_collector($query);
        if ($result)
            return $result;
        return false;
    }

    public function unreaded_messages($from_id, $to_id)
    {
        $query = "UPDATE messages SET seen=1 WHERE (from_id='$to_id' AND to_id='$from_id') AND messages.seen = 0";
        $result = $this->db->query_collector($query);
        if ($result)
            return $result;
        return false;
    }
    
}
