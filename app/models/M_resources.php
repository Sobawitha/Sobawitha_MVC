<?php

class M_resources
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }
    
    public function count_num_of_rows(){
        $this->db->query('SELECT count(post_id) FROM view_post ');
        return $this->db->single();
    }

    public function display_all_resources($start_from,$num_per_page){
        $this->db->query('SELECT * FROM view_post limit :start_from, :num_per_page');
        $this->db->bind(":start_from", $start_from);
        $this->db->bind(":num_per_page", $num_per_page);
        return $this->db->resultSet();
    }

    public function find_populerfeed(){
        $this->db->query('SELECT * FROM view_post order by no_of_likes DESC LIMIT 3');
        return $this->db->resultSet();
    }

    public function view_individual_resource($data){
        $this->db->query('SELECT * FROM view_post WHERE post_id=:postid');
        $this->db->bind(":postid", $data['resource_id']);
        return $this->db->resultSet();
    }

    public function related_post($data){
        $this->db->query('SELECT * FROM view_post WHERE tag=:category');
        $this->db->bind(":category", $data['tag']);
        return $this->db->resultSet();
    }

    public function count_previous_like($postid){
        $this->db->query('SELECT * from blogpost_like WHERE post_id=:postid AND user_id=:user_id');
        $this->db->bind(":post_id", $postid);
        $this->db->bind(":user_id", $_SESSION['user_id']);
        return $this->db->rowCount();
    }

    public function like($postid){
        $this->db->query('UPDATE blogpost SET no_of_likes = no_of_likes+1 WHERE post_id=:postid');
        $this->db->bind(":post_id", $postid);

        if($this->db->execute()){
            return true;
        }
        else{
            return false;
        }
    }

    public function dislike($postid){
        $this->db->query('UPDATE blogpost SET no_of_likes = no_of_likes-1 WHERE post_id=:postid');
        $this->db->bind(":post_id", $postid);

        if($this->db->execute()){
            return true;
        }
        else{
            return false;
        }
    }

    public function search_bar($search_cont){
        $this->db->query('SELECT * from view_post where (upper(title) like upper(concat("%", :search_content , "%"))) or (upper(tag) like upper(concat("%", :search_content , "%"))) or
        (upper(discription) like upper(concat("%", :search_content , "%"))) or (upper(first_name) like upper(concat("%", :search_content , "%"))) or (upper(last_name) like upper(concat("%", :search_content , "%"))) ');
        $this->db->bind(":search_content", $search_cont);
        return $this->db->resultset();
    }

    public function filter_post($search_cont){
        $this->db->query('SELECT * from view_post where (upper(tag) like upper(concat("%", :search_content , "%"))) ');
        $this->db->bind(":search_content", $search_cont);
        return $this->db->resultset();
    }



 /*comment */

    public function post_comment($data){
        $this->db->query('INSERT INTO comment (user_id, post_id, comment, date) VALUES (:user_id, :post_id, :comment, now)');
        $this->db->bind(":user_id", $data['user_id']);
        $this->db->bind(":post_id", $data['post_id']);
        $this->db->bind(":comment", $data['comment']);
        
        //execute the query
        if($this->db->execute()){
            return true;
        }
        else{
            return false;
        }
    }

    public function display_all_comment($data){
        $this->db->query('SELECT  comment_id, comment_user_id, comment, comment_date, first_name, last_name, reply_id, reply, reply_comment_id, reply_user_id, reply_date, user_first_name, user_last_name, count(reply_id) as no_of_reply FROM view_comment_reply WHERE comment_post_id=:postid group by(comment_id)');
        $this->db->bind(":postid", $data['resource_id']);
        return $this->db->resultSet();
    }

    public function display_all_comment_for_reply($data){
        $this->db->query('SELECT  comment_id, comment_user_id, comment, comment_date, first_name, last_name, reply_id, reply, reply_comment_id, reply_user_id, reply_date, user_first_name, user_last_name  FROM view_comment_reply WHERE comment_post_id=:postid');
        $this->db->bind(":postid", $data['resource_id']);
        return $this->db->resultSet();
    }

    public function count_all_comment($data){
        $this->db->query('SELECT count(comment_id) as count_comment FROM comment WHERE post_id=:postid');
        $this->db->bind(":postid", $data['resource_id']);
        return $this->db->resultset();
    }

}


?>