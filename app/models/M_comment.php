<?php

class M_comment
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function display_all_comment($data){
        $this->db->query('SELECT * FROM comment WHERE post_id=:postid');
        $this->db->bind(":postid", $data['resource_id']);
        return $this->db->resultSet();
    }

    public function count_all_comment($data){
        $this->db->query('SELECT * FROM comment WHERE post_id=:postid');
        $this->db->bind(":postid", $data['resource_id']);
        return $this->db->rowCount();
    }

    //change
    public function find_user($data){
        $this->db->query("SELECT first_name, last_name from user INNER JOIN comment ON (user.user_id = comment.user_id ) WHERE (user.user_id=:userid)");
        $this->db->bind(":userid", $data['user_id']);
        return $this->db->single();
    }
    
    // change
    public function display_all_reply($commentid){
        $this->db->query('SELECT * FROM reply WHERE comment_id=:commentid');
        $this->db->bind(":commentid", $commentid);
        return $this->db->resultSet();
    }
    
    public function count_all_reply($data){
        $this->db->query(' SELECT * FROM comment_reply WHERE (post_id=:postid AND comment_id=:commentid) ');
        $this->db->bind(":commentid", $data['comment_id']);
        $this->db->bind(':postid', $data['resource_id']);
        return $this->db->rowCount();
    } 
}


?>