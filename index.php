<?php
require_once 'core/Controller.php';
require_once 'core/Router.php';
require_once 'core/helpers.php';

requireExceptions();
requireControllers();

try {
    Router::make();
} catch (Exception $exception){

    if($exception instanceof ControllerNotFoundException)
        echo json_encode(["error" => $exception->getMessage()]);
}