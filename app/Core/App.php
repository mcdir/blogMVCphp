<?php

namespace Core;

/**
 * The application class.
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
