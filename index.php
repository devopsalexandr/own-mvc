<?php

require_once 'core/Controller.php';
require_once 'core/Router.php';
require_once 'core/BaseModel.php';

require_once 'core/helpers.php';
require_once 'core/settings.php';
require_once 'core/Database/DbConnection.php';

$conn = DbConnection::getInstance();


requireExceptions();
requireControllers();
requireModels();

//$c = $conn->getConnection()->query("SELECT * FROM `comments`")->fetchObject(Comment::class);
//$c = $conn->getConnection()->query("SELECT * FROM `comments`");
//$cc = $c->fetchAll(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, Comment::class, [0,0]);
//
//print_r($cc[1]->getTitle());

$comment = new Comment($conn->getConnection());

$comment->title = "third title";
$comment->email = "asdasd@mail.com";
$comment->body = "asdasdasdm";
$comment->username = "ksenia";
$comment->date = "2022-01-18";

$comment->create();

//$comments = $comment->findAll();
//
//
//print_r($comments[0]->getId());


try {
    Application::boot();
} catch (Exception $exception){

    if($exception instanceof ControllerNotFoundException)
        echo json_encode(["error" => $exception->getMessage()]);

    if($exception instanceof ActionNotFoundException)
        echo json_encode(["error" => $exception->getMessage()]);

}