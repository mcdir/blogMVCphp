<?php

namespace Core;

/**
 * class Database
 * @todo extends \PDO
 */
class Database
{
    private static $dbh;

    private function __construct()
    {
    }

    /**
     * @return \PDO instance
     */
    public static function getInstance()
    {
        if (null === static::$dbh) {
            $config = Config::getInstance();
            static::$dbh = new \PDO("mysql:host=localhost;dbname={$config['dbname']}", $config['dbuser'],
                $config['dbpass']);
            static::$dbh->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
            // @todo add timezone and other settings
        }

        return static::$dbh;
    }

    private function __clone()
    {
    }

    private function __wakeup()
    {
    }
}
