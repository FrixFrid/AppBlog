<?php
namespace App;

class App
{
    public static function process(): void
    {
        $controllerName = "Home";
        $task = "home";

        if (!empty($_GET['controller'])){
            $controllerName = ucfirst($_GET['controller']);
        }

        if (!empty($_GET['task'])){
            $task = $_GET['task'];
        }

        $controllerName = "App\\Controllers\\" . $controllerName . "Controller";

        $controller = new $controllerName();
        $controller->$task();
    }
}