<?php

namespace Core;

/**
 * The main application class.
 */
class App
{
    public function __construct()
    {
        $routes = Routes::getInstance();
        $controller = $routes->autoDispatch();
        $controller->{$routes->method}();
    }
}
