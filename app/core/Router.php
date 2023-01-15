<?php

namespace app\core;

class Router
{
    public static function run()
    {
        $routerRegistered = new RoutesFilter;
        $router = $routerRegistered->get();

        dd($router);
    }
}
