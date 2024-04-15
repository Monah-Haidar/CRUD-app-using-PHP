<?php

namespace Fifa;

class Teams {

    private $dbHandle;

    public function __construct(\PDO $dbHandle = NULL){
        if ($dbHandle != NULL){
            $this->dbHandle = $dbHandle;
        }
    }

    public function get($id=false){
        if($id === false){
            return [];
        }
        $stmt = $this->dbHandle->query('select * from teams where id = \''.$id.'\'');
        $teamDetails = $stmt->fetch(\PDO::FETCH_OBJ);
        
        $result = [
            'Team' => $teamDetails
        ];
        return $result;
    }

    public function getAll(){
        $resultSet = [];
        $stmt = $this->dbHandle->query('select * from teams where deleted_at is NULL');
        while ($record = $stmt->fetch(\PDO::FETCH_OBJ)){
            $resultSet[] = $record;
        }
        return $resultSet;
    }

    public function insert($data){
        $data['name'] = filter_var($data['name'], FILTER_SANITIZE_STRING);
        $data['rank'] = (int) $data['rank'];
        $data['logo'] = filter_var($data['logo'], FILTER_SANITIZE_STRING);
        
        $stmt = $this->dbHandle->prepare('INSERT into teams (name, rank, logo) values (?, ?, ?)');
        $test = $stmt->execute([$data['name'], $data['rank'], $data['logo']]);

        if ($test === false) print_r($stmt->errorInfo());
        return $test;
    }

    public function update($data){
        $data['name'] = filter_var($data['name'], FILTER_SANITIZE_STRING);
        $data['rank'] = (int) $data['rank'];
        $data['logo'] = filter_var($data['logo'], FILTER_SANITIZE_STRING);
        $data['id'] = (int) $data['id'];
        
        $stmt = $this->dbHandle->prepare('UPDATE teams set name = ?, rank = ?, logo = ? , updated_at = CURRENT_TIMESTAMP where id = ?');
        $test = $stmt->execute([$data['name'], $data['rank'], $data['logo'], $data['id']]);

        if ($test === false) print_r($stmt->errorInfo());
        return $test;
    }

    public function delete($id){
        $id = (int) $id;

        $stmt = $this->dbHandle->prepare('UPDATE teams set deleted_at = CURRENT_TIMESTAMP where id = ?');
        $test = $stmt->execute([$id]);

        if ($test === false) print_r($stmt->errorInfo());
        return $test;
    }











}

?>