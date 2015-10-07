<?php

namespace Core;

/**
 * class Routes
 */
class Routes
{
    private static $instance;

    public $method = 'index';

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
     * @return mixed
     */
    public function autoDispatch()
    {
        if (isset($_GET['url'])) {
            $url = explode('/', $_GET['url']);
            $url = array_chunk(
                (count($url) < 2 ? $url[1] = $this->method : $url),
                2, true
            );
            list($class, $method) = $url[0];
            $class = ucfirst(strtolower($class));
            $class = 'Controller\\' . $class;
        } else {
            $class = 'Controller\\Home';
            $method = $this->method;
        }
        if ($class
            // @todo validate in future
            // && (isset($this->routes[$uri_params['uri']])
            && class_exists($class)
        ) {
            unset($_GET['url']);
            static::$instance->method = method_exists($class, $method)
                ? $method
                : $this->method;

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
