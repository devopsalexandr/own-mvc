<?php
require_once 'core/Controller.php';
require_once 'core/Router.php';
require_once 'core/helpers.php';

requireExceptions();
requireControllers();


Router::make();