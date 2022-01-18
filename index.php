<?php

require_once 'core/Controller.php';
require_once 'core/Application.php';
require_once 'core/BaseModel.php';
require_once 'core/Request.php';

require_once 'core/helpers.php';
require_once 'core/settings.php';
require_once 'core/Database/DbConnection.php';

$conn = DbConnection::getInstance();

requireExceptions();
requireControllers();
requireModels();
requireRequests();


try {

    Application::boot($conn->getConnection());

} catch (Exception $exception){

    // Exception handler

    if($exception instanceof ControllerNotFoundException)
        echo json_encode(["error" => $exception->getMessage()]);

    if($exception instanceof ActionNotFoundException)
        echo json_encode(["error" => $exception->getMessage()]);

}