<?php

class Request
{
    public function __set($name, $value)
    {
        if(property_exists(static::class, $name)){
            $this->{$name} = $value;
        }
    }
}