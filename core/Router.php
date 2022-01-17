<?php

class Router
{
    public static $defaultController = 'HomeController';
    public static $defaultAction = 'index';

    public static function make(){

        $routes = explode('/', $_SERVER['REQUEST_URI']);

        $controllerName = !empty($routes[1]) ? $routes[1] : self::$defaultController;
        $actionName = !empty($routes[2]) ? $routes[2] : self::$defaultAction;

        $controller = ucfirst(mb_strtolower($controllerName))."Controller";
        $action = $actionName;

        if(!class_exists($controller)){
            if(DEBUG_MODE)
                throw new ControllerNotFoundException("Controller " .$controller. " not found");

            $controller = self::$defaultController;
        }

        if(!method_exists($controller, $action)){
            if(DEBUG_MODE)
                throw new ActionNotFoundException("Action " .$action. " not found");

            $action = self::$defaultAction;
        }

        $controller = new $controller();
        $controller->{$action}();
    }
}