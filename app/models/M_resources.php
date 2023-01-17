<?php

class M_resources
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function display_all_resources(){
        $this->db->query('SELECT * FROM blogpost');
        return $this->db->resultSet();
    }

    public function find_author($userid){
        $this->db->query('SELECT first_name FROM user INNER JOIN blogpost ON user.user_id=blogpost.officer_id WHERE (user.user_id=:userid)');
        $this->db->bind(':userid', $userid);
        $author_query = $this->db->single();
        return $author_query['officer_id'];
    }
}


?>