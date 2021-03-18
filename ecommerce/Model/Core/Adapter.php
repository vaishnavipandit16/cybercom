<?php

namespace Model\Core;

class Adapter{
    public $config = [
        "host" => "localhost",
        "user" => "root",
        "password" => "",
        "database" => "ecommerce"
    ];

    public $connect = null;

    public function connection() {
        $connect = mysqli_connect($this->config['host'],$this->config['user'],$this->config['password'],$this->config['database']);
        return $this->setConnect($connect);
    }

    public function getConnect() {
        return $this->connect;
    }

    public function setConnect(\mysqli $connect) {
        $this->connect = $connect;
        return $this;
    }

    public function insert($query)
    {
        $this->$query = $query;
        if (!$this->isConnected()) {
            $this->connection();
        }
        $result = mysqli_query($this->getConnect(), $query);
        if($result){
            $last_id = mysqli_insert_id($this->getConnect());
            return $last_id;
        } else {
           return false;
        }
        
    }

    public function newRow($query)
    {
        $this->$query = $query;
        if (!$this->isConnected()) {
            $this->connection();
        }
        $result = mysqli_query($this->getConnect(), $query);
        if($result){
           return true;
        } else {
           return false;
        }
        
    }

    public function isConnected()
    {
        if (!$this->getConnect()) {
            return false;
        } else {
            return true;
        }
    }

    public function fetchAll($query) {
        if (!$this->isConnected()) {
            $this->connection();
        }
        $result = mysqli_query($this->getConnect(), $query);
        $row = mysqli_fetch_all($result,MYSQLI_ASSOC);
        // if ($row) {
        //     foreach ($row as $key => $value) {
        //         $data = $value;
        //         $final[] = $data;
        //     }
        //     return $final;
        // }   
        return $row;
    
    }
    
    public function edit($query = null){
        if (!$this->isConnected()) {
            $this->connection();
        } 
        $result =  mysqli_query($this->getConnect(), $query);
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            return $row;
        } else {
            return false;
        }
    }

    public function update($query) {
        if (!$this->isConnected()) {
            $this->connection();
        }
        $result = mysqli_query($this->getConnect(),$query);
        if($result){
            return true;
        } else {
            return false;
        }   
    }

    public function delete($query) {
        if (!$this->isConnected()) {
            $this->connection();
        }
        $result = mysqli_query($this->getConnect(),$query);
        if($result){
            return true;
        } else {
            return false;
            
        }
    }

    public function fetchPairs($query){
        if (!$this->isConnected()) {
            $this->connection();
         } 
        $result = mysqli_query($this->getConnect(), $query);
        $rows = $result->fetch_all();
        
        if(!$rows){
            return $rows;
        }
        $columns = array_column($rows,'0');
        $values = array_column($rows,'1');
        return array_combine($columns,$values);
    }
}

?>