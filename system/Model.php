<?php
namespace system;

class Model
{
    protected $db;

    function __construct()
    {
        $this->db = new Db();
    }
}
