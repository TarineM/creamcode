<?php

class Application
{
    public static function process()
    {
        if(!empty($_GET['controller'])) {
            // GET => users
            // Users
            $controllerName = ucfirst($_GET['controller']);
        }

        if(!empty($_GET['action'])) {
            // GET => users
            // Users
            $actionName = ucfirst($_GET['action']) . 'Action';
        }

        $controllerName = "\Controllers\\" . $controllerName . '\\' . $actionName;

        $controller = new $controllerName();
        $controller();
    }
}