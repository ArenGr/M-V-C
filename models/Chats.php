<?php
namespace models;
use system\Model;

class Chats extends Model
{

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
