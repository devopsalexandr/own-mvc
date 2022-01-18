<?php

class Application
{
    public static $defaultController = 'Home';
    public static $defaultAction = 'index';

    public static function boot(){

        $routes = explode('/', $_SERVER['REQUEST_URI']);

        $controllerName = !empty($routes[1]) ? $routes[1] : self::$defaultController;
        $actionName = !empty($routes[2]) ? $routes[2] : self::$defaultAction;
        $requestData = $_REQUEST;

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

        $requestName = self::getRequestFromMethod($controller, $action);

        $controller = new $controller();

        if($requestName){
            $request = new $requestName();

            foreach ($requestData as $key => $data){
                $request->{$key} = $data;
            }

            $controller->{$action}($request);
            return;
        }
        $controller->{$action}();
    }

    private static function getRequestFromMethod($controller, $action)
    {
        $reflector = new ReflectionClass($controller);
        $parameters = $reflector->getMethod($action)->getParameters();

        if(count($parameters) == 0)
            return null;

        $c = $parameters[0]->getType();
        return $c->getName();
    }
}