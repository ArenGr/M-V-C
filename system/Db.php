<?php
namespace system;
use config\DbConfig;
use mysqli;

class Db
{
    public $connection;

    function __construct()
    {
        $this->connection = new mysqli(DbConfig::DB_HOST, DbConfig::DB_USERNAME, DbConfig::DB_PASSWORD, DbConfig::DB_NAME);

        if($this->connection->connect_errno)
        {
            echo $this->connection->connect_error;
            exit;
        }
    }
}
