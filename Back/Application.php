<?php

class Application
{
    public static function process()
    {
        // sécurité form input get
        if(!empty($_GET['controller'])) {
            // GET => users
            // Users
            $controllerNameInput = ucfirst($_GET['controller']);
        }

        if(!empty($_GET['action'])) {
            // GET => users
            // Users
            $actionNameInput = ucfirst($_GET['action']);
        }

        $actionName = sprintf("%sAction", $actionNameInput);
        $controllerName = sprintf("\Controllers\\%s\\%s", $controllerNameInput, $actionName);

        if (class_exists($controllerName)) {
            $controller = new $controllerName();
            $controller();
        }
        else {
            header($_SERVER["SERVER_PROTOCOL"]." 404 Not Found", true, 404);
        }
    }
}