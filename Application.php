<?php


class Application
{
    public static function process()
    {
        $controllerName = "userController";
        $task = "homeAction";

        if(!empty($_GET["controller"]))
        {
            $controllerName = $_GET["controller"];
        }

        if(!empty($_GET["action"]))
        {
            $task = $_GET["action"];
        }

        $controllerName = "\Controllers\\" . $controllerName;
        $controller = new $controllerName();
        $controller->$task();
    }
}
