<?php

class Comment extends BaseModel
{
    protected $table = 'comments';

    public $title;

    public $body;

    public $email;

    public $username;

    public $date;
}