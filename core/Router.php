<?php

class Router
{
    public static $defaultController = 'home';
    public static $defaultAction = 'index';

    public static function make(){

        $routes = explode('/', $_SERVER['REQUEST_URI']);

        $controllerName = !empty($routes[1]) ? $routes[1] : self::$defaultController;
        $actionName = !empty($routes[2]) ? $routes[2] : self::$defaultAction;

        $controller = self::makeValidName($controllerName)."Controller";
        $action = self::makeValidName($actionName);

        if(!class_exists($controller)){
            throw new ControllerNotFoundException($controller);
            // or add default values?
        }
    }

    private static function makeValidName($value){
        return ucfirst(mb_strtolower($value));
    }
}