<?php

namespace Core;

class Database {
    private $dbHandle;

    public function __construct(){
        $config = Config::$params;

        $this->dbHandle = new \PDO(
            'mysql:host='.$config['host'].';dbname='.$config['schema'], 
            $config['user'], 
            $config['pass']
        );
        //$this->dbHandle->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
    }
    public function getDbHandle(){
        return $this->dbHandle;
    }

    public function __destruct(){
        $this->dbHandle = NULL;
    }
}

?>