<?php

class M_Pages{
    private $db;

    public function __construct(){
        $this->db = new Database();
    }

    public function getUser(){
        $this->db->query('SELECT * FROM admin');
        return $this->db->resultSet();
    }

}





?>