<?php

namespace Core;

class Contact{
    private $dbHandle;

    public function __construct(\PDO $dbHandle = NULL){
        if ($dbHandle != NULL){
            $this->dbHandle = $dbHandle;
        }
    }

    public function insert($data){
        $data['name'] = filter_var($data['name'], FILTER_SANITIZE_STRING);
        $data['email'] = filter_var($data['email'], FILTER_SANITIZE_EMAIL);
        $data['comments'] = filter_var($data['comments'], FILTER_SANITIZE_STRING);
        
        $phoneNbr= $data['phone'];
        $phonePattern = '/^(\+|(00))961(([124-9][1-9][0-9]{5})|((3|(7[01659])|(81))[0-9]{6}))$/';
        if(!preg_match($phonePattern, $phoneNbr)) die("Wrong phone Number. Please try again");

        $stmt = $this->dbHandle->prepare("INSERT into contacts(name, email, phone, purpose, comments) values (?, ?, ?, ?, ?)");
        $res = $stmt->execute([$data['name'],$data['email'],$phoneNbr,$data['purpose'],$data['comments']]);
        
        if($res === false) print_r($stmt->errorInfo());
        return $res;
    }


    public function getAll(){
        $resultSet = [];
        $stmt = $this->dbHandle->query('select * from contacts where deleted_at is NULL');
        while ($record = $stmt->fetch(\PDO::FETCH_OBJ)){
            $resultSet[] = $record;
        }
        return $resultSet;
    }

    public function delete($id){
        $id = (int) $id;

        $stmt = $this->dbHandle->prepare('UPDATE contacts set deleted_at = CURRENT_TIMESTAMP where id = ?');
        $test = $stmt->execute([$id]);

        if ($test === false) print_r($stmt->errorInfo());
        return $test;
    }
}

?>