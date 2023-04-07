<?php

class M_forum
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function add_new_discussion($data){

        $this->db->query('INSERT into forum_posts (subject,type,message,created_by,forum_image, posted_by_first_name, posted_by_last_name) VALUES (:subject, :type, :message, :user_id,:image,  :first_name, :last_name )');
        $this->db->bind(":subject", $data['subject']);
        $this->db->bind(":type", $data['type']);
        $this->db->bind(":message", $data['message']);
        $this->db->bind(":image", $data["image_name"]);
        $this->db->bind(":user_id", $data['created_by']);
        $this->db->bind(":first_name", $data['first_name']);
        $this->db->bind(":last_name", $data['last_name']);

        if($this->db->execute()){
            return true;
        }
        else{
            return false;
        }

    }

    public function add_reply_for_discussion($data){

        $this->db->query('INSERT into forumpost_reply (reply,discussion_id,reply_user_id,reply_user_firstname,reply_user_lastname, reply_image, current_status) VALUES (:reply, :discussion_id,:reply_user_id, :firstname, :lastname, :image,  :current_status )');
        $this->db->bind(":reply", $data['reply']);
        $this->db->bind(":discussion_id", $data['discussion_id']);
        $this->db->bind(":reply_user_id", $data['created_by']);  
        $this->db->bind(":firstname", $data["first_name"]);
        $this->db->bind(":lastname", $data['last_name']);
        $this->db->bind(":image", $data['image_name']);
        $this->db->bind(":current_status",1);
        

        if($this->db->execute()){
            return true;
        }
        else{
            return false;
        }

    }

    
    

    public function display_all_discussion(){
        $this->db->query('SELECT discussion_id,subject,type,message,forum_image,created_by,date,posted_by_first_name, posted_by_last_name,status,gender,count(reply_id) as no_of_reply FROM view_discussion_and_reply WHERE status=1  group by(discussion_id) order by date DESC');
        return $this->db->resultSet();
    }

    public function display_all_discussion_reply(){
        $this->db->query('SELECT discussion_id,reply_id, reply, reply_user_firstname, reply_user_id,reply_user_lastname, reply_image,current_status,reply_date FROM view_discussion_and_reply WHERE current_status=1  order by reply_date DESC');
        return $this->db->resultSet();
    }

    public function search_bar($search_cont){
        $this->db->query('SELECT * from forum_posts where (upper(subject) like upper(concat("%", :search_content , "%"))) or (upper(type) like upper(concat("%", :search_content , "%")))');
        $this->db->bind(":search_content", $search_cont);
        return $this->db->resultset();
    }

    public function delete_forum_post($id){
        $this->db->query('UPDATE forum_posts SET status=0 where discussion_id=:id');
        $this->db->bind(":id", $id);
        if($this->db->execute()){
            return true;
        }
        else{
            return false;
        }
    }

    public function delete_forum_post_reply($id){
        $this->db->query('UPDATE forumpost_reply SET current_status=0 where reply_id=:id');
        $this->db->bind(":id", $id);
        if($this->db->execute()){
            return true;
        }
        else{
            return false;
        }
    }
}



?>