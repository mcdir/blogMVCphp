<?php

namespace Core;

class Model
{

    /**
     * Hold the database connection
     * @var object
     */
    protected $_dbh;

    /**
     * Use exist instance of the database over \PDO driver
     *
     * @param \PDO $dbh
     */
    public function __construct(\PDO $dbh)
    {
        $this->_dbh = $dbh;
    }
}
