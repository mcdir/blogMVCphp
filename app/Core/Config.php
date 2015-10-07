<?php

namespace Core;

/**
 * class Config
 */
class Config
{
    private static $config;

    private function __construct()
    {
    }

    /**
     * @return $config instance
     */
    public static function getInstance()
    {
        if (null === static::$config) {
            static::$config = parse_ini_file(__DIR__ . '/../config/config.ini');
            //set timezone
            date_default_timezone_set('Europe/London');
            //start sessions
        }

        return static::$config;
    }

    private function __clone()
    {
    }

    private function __wakeup()
    {
    }
}