<?php

class BaseModel
{
    protected $table;

    protected $connection;

    protected $id;

    public function __construct($connection = null)
    {
        $this->connection = $connection;
    }

    public function getId()
    {
        return $this->id;
    }

    public function findAll()
    {
        $c = $this->connection->query("SELECT * FROM ". $this->table);
        return $c->fetchAll(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, static::class, [0,0]);
    }

}