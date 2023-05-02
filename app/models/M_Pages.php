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


    public function get_user_details(){

        $this->db->query('SELECT * FROM user WHERE user_id = :user_id');    
        $this->db->bind(':user_id', $_SESSION['user_id']);
        $row = $this->db->single();
        return $row;
    }

}





?>