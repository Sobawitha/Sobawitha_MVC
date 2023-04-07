<?php

class M_users
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function get_profile_detail($id){
        $this->db->query('SELECT * FROM user WHERE user_id = :id');
        $this->db->bind (":id", $id);
        return $this->db->resultset();
    }

    
}


?>