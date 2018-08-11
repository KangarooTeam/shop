<?php

    class DB
    {
       protected $connection;
    }

    public function __construct($host, $user, $password, $db_name)
    {
       $this->connection = mysqli($host, $user, $password, $db_name);
    }
