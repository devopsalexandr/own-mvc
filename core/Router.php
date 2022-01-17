<?php

class Router
{
    public static $defaultController = 'home';
    public static $defaultAction = 'index';

    public static function Make(){

        $routes = explode('/', $_SERVER['REQUEST_URI']);

        $controller = !empty($routes[1])
    }
}