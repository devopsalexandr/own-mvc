<?php

class DbConnection
{
    private static $instance = null;
    private $connection = null;

    // hard code?))))
    private $host = '127.0.0.1';
    private $name = 'demo';
    private $user = 'root';
    private $pass = 'password';

    private function __construct()
    {
        $this->connection = new PDO("mysql:host={$this->host}; dbname={$this->name}", $this->user, $this->pass,
            array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
    }

    public static function getInstance()
    {
        if(!self::$instance)
        {
            self::$instance = new DbConnection();
        }

        return self::$instance;
    }

    public function getConnection()
    {
        return $this->connection;
    }
}