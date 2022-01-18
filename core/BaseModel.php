<?php

class BaseModel
{
    protected $table;

    protected $connection;

    protected $id;

    private $updateFields = [];

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

    public function create(){
        print_r($this->updateFields);
        if(count($this->updateFields) > 0){
            $columnString = implode(',', array_keys($this->updateFields));
            $valueString = implode(',', array_fill(0, count($this->updateFields), '?'));

            $STH = $this->connection->prepare("INSERT INTO ".$this->table." ({$columnString}) VALUES ({$valueString})");
            $STH->execute(array_values($this->updateFields));
        }
    }

    public function __set($name, $value)
    {
        if(property_exists(static::class, $name)){
            $this->{$name} = $value;

            $this->updateFields[$name] = $value;
        }
    }

}