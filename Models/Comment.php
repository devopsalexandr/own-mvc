<?php

class Comment extends BaseModel
{
    protected $table = 'comments';

    protected $title;

    protected $body;

    protected $email;

    protected $username;

    protected $date;

    public function getTitle()
    {
        return $this->title;
    }

    public function getBody()
    {
        return $this->body;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getUsername()
    {
        return $this->username;
    }

    public function getDate()
    {
        return $this->date;
    }
}