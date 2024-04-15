<?php

namespace Core;

class Admin {

    private $dbHandle;

    public function __construct(\PDO $dbHandle = NULL){
        if ($dbHandle != NULL){
            $this->dbHandle = $dbHandle;
        }
    }    

    public function getUser($user){

        $stmt = $this->dbHandle->query('select * from administrators where user = \''.$user.'\'');
        $adminDetails = $stmt->fetch(\PDO::FETCH_OBJ);
        
        $result = [
            'Admin' => $adminDetails
        ];
        return $result;

    }
}