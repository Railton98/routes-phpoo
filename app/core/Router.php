<?php

namespace app\core;

class Router
{
    public static function run()
    {
        try {
            $routerRegistered = new RoutesFilter;
            $router = $routerRegistered->get();

            $controller = new Controller;
            $controller->execute($router);
        } catch (\Throwable $th) {
            echo 'ERRO: ' . $th->getMessage();
        }
    }
}
