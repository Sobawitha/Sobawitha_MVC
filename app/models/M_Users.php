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

    public function reg_as_new_sletter($data){
        $this->db->query('INSERT INTO new_sletter (email) VALUES (:email)');
        $this->db->bind(':email', $data['email']);
        if($this->db->execute()){
            return true;
        }
        else{
            return false;
        }
    }

    public function email_exists($data){
        $this->db->query("SELECT count(new_sletter_id) as count_users from new_sletter WHERE email=:email");
        $this->db->bind(':email', $data['email']);
        return $this->db->single();
    }

    
}


?>