<?php

class BaseModel
{
    protected $table;

    protected $connection;

    public $id;

    protected $restrictedProperties = ['connection', 'table', 'restrictedProperties', 'id'];

    public function __construct($connection = null)
    {
        $this->connection = $connection;
    }

    public function findAll()
    {
        $c = $this->connection->query("SELECT * FROM ". $this->table);
        return $c->fetchAll(PDO::FETCH_CLASS, static::class, [0,0]);
    }

    public function create()
    {

        $array = get_object_vars($this);
        foreach ($this->restrictedProperties as $propStop) {
            if (array_key_exists($propStop, $array)) {
                unset($array[$propStop]);
            }
        }

        $columnString = implode(',', array_keys($array));
        $valueString = implode(',', array_fill(0, count($array), '?'));

        $STH = $this->connection->prepare("INSERT INTO ".$this->table." ({$columnString}) VALUES ({$valueString})");

        return $STH->execute(array_values($array));
    }

    public function __set($name, $value)
    {
        echo "SETUPED";
        if(property_exists(static::class, $name)){
            $this->{$name} = $value;

            $this->updateFields[$name] = $value;
        }
    }

}