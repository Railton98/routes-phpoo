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

            dd($router);
        } catch (\Throwable $th) {
            echo 'ERRO: ' . $th->getMessage();
        }
    }
}
