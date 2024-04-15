<?php

namespace Fifa;

class Players {

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
           
        $playerDetails = [];
        $stmt = $this->dbHandle->query('select * from team_players where team_id = \''.$id.'\'');
        while($row = $stmt->fetch(\PDO::FETCH_OBJ)){
            $playerDetails[] = $row;
        }

        $result = [
            'playerDetails' => $playerDetails
        ];
        return $result;
    }

    public function getAll(){
        $resultSet = [];
        $stmt = $this->dbHandle->query('select * from team_players');
        while ($record = $stmt->fetch(\PDO::FETCH_OBJ)){
            $resultSet[] = $record;
        }
        return $resultSet;
    }


    
}

?>
