<?php
namespace system;
use config\DbConfig;
use mysqli;

class Db
{
    public $connection;
    public $data = "";

    function __construct()
    {
        $this->connection = new mysqli(DbConfig::DB_HOST, DbConfig::DB_USERNAME, DbConfig::DB_PASSWORD, DbConfig::DB_NAME);

        if($this->connection->connect_errno)
        {
            echo $this->connection->connect_error;
            exit;
        }
    }

    public function query_collector($action, $what, $table, $cond_1=null, $col_1=null, $val_1=null, $cond_2=null, $col_2=null, $val_2=null)
    {
        $this->data = "";
        $result = $this->connection->query($this->query_type($action, $what, $table)->query_condition($cond_1, $col_1, $val_1)->query_condition($cond_2, $col_2, $val_2)->get());
        if ($result)
            return $result;
        else
            echo "Error description: ".$result.' '. $this->connection->error;
    }

    protected function get()
    {
        return $this->data;
    }
    
    protected function query_type($action, $what, $table)
    {
        switch ($action)
        {
        case 'SELECT':
            $this->data .= $action." ".$what." FROM ".$table;
            break;
        case 'UPDATE':
            $this->data .=$action." ".$table." SET ".$this->_service_update($what);
            break;
        case 'INSERT':
            $this->data .= $action." INTO ".$table.' '.$this->_service_insert($what);
            break;
        }
        return $this;
    }

    protected function query_condition($condition, $column, $value)
    {
        switch($condition)
        {
        case 'WHERE':
            $this->data .= ' WHERE '.$column.'='."'". $this->connection->real_escape_string($value)."'";
            break;
        case 'AND':
            $this->data .= ' AND '.$column.'='."'". $this->connection->real_escape_string($value)."'";
            break;
        case 'OR':
            $this->data .= ' OR '.$column.'='."'". $this->connection->real_escape_string($value)."'";
            break;
        }
        return $this;
    }


    protected function _service_update(array $array)//['name'=>'aren']
    {
        $value = "";
        foreach ($array as $key => $val)
        {
            $value .= $key.'='."'".$this->connection->real_escape_string($val)."'".', ';
        }
        $value = substr ($value, 0, -2);
        return $value;
    }

    protected function _service_insert(array $array)//['name'=>'aren']
    {
        $keys = "";
        $values = "";
        foreach ($array as $key => $value)
        {
            $keys .= $key.', ';
            $values .= "'".$this->connection->real_escape_string($value)."'".', ';
        }
        $keys = substr ($keys, 0, -2);
        $values = substr ($values, 0, -2);
        return '('.$keys.') VALUES ('.$values.')';
    }
}
