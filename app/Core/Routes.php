<?php

namespace Core;

/**
 * class Routes
 */
class Routes
{
    private static $instance;
    public $method = false;
    private $routes = array();

    private function __construct()
    {
    }

    public static function getInstance()
    {
        if (null === static::$instance) {
            static::$instance = new self;
        }

        return static::$instance;
    }

    /**
     * @param $uri
     * @param $params
     */
    public function addRoute($uri, $params)
    {
        $this->routes[$uri] = $params;
    }

    /**
     * @return mixed
     */
    public function autoDispatch()
    {
        $base_method = 'index';
        if (isset($_GET['url'])) {
            $url = explode('/', $_GET['url']);
            $url = array_chunk(
                (count($url) < 2 ? $url[1] = $base_method : $url),
                2, true
            );
            list($class, $method) = $url[0];
            $class = ucfirst(strtolower($class));
            $class = 'Controller\\' . $class;
        } else {
            $class = 'Controller\\Home';
            $method = $base_method;
        }
        if ($class
            // @todo validate in future
            // && (isset($this->routes[$uri_params['uri']])
            && class_exists($class)
        ) {
            unset($_GET['url']);
            $method = method_exists($class, $method) ? $method : $base_method;
            static::$instance->method = $method;
            return new $class();
        } else {
            // @todo send 404
            $config = Config::getInstance();
            header('Location: ' . $config['baseurl']);
            exit(1);
        }

    }

    private function __clone()
    {
    }

    private function __wakeup()
    {
    }
}
