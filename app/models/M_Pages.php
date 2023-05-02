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

    public function getLatestListings(){
    $this->db->query('SELECT * FROM fertilizer WHERE current_status = 1 ORDER BY Product_id DESC LIMIT 4');
    return $this->db->resultSet();
    }

    public function getAllListings(){
        $this->db->query('SELECT * FROM fertilizer WHERE current_status = 1 ORDER BY RAND(UNIX_TIMESTAMP()) LIMIT 10');
        return $this->db->resultSet();
    }

    public function getAverageRating($id){
        $this->db->query('SELECT AVG(rating) AS average_rating FROM feedback WHERE receiver_id=:id AND feed_status=1');
        $this->db->bind(':id',$id);
              
        $row=$this->db->single();
        return $row->average_rating;
    }
    
    



    

}





?>