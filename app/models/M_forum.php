<?php

class M_forum
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function add_new_discussion($data){

        $this->db->query('INSERT into forum_posts (subject,type,message,created_by,forum_image) VALUES (:subject, :type, :message, :user_id,:image )');
        $this->db->bind(":subject", $data['subject']);
        $this->db->bind(":type", $data['type']);
        $this->db->bind(":message", $data['message']);
        $this->db->bind(":image", $data["image_name"]);
        $this->db->bind(":user_id", $data['created_by']);

        if($this->db->execute()){
            return true;
        }
        else{
            return false;
        }

    }

    public function add_reply_for_discussion($data){
        $this->db->query('INSERT into forumpost_reply (reply,discussion_id,reply_user_id, reply_image, current_status) VALUES (:reply, :discussion_id,:reply_user_id, :image,  :current_status )');
        $this->db->bind(":reply", $data['reply']);
        $this->db->bind(":discussion_id", $data['discussion_id']);
        $this->db->bind(":reply_user_id", $data['created_by']);  
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
        $this->db->query('SELECT discussion_id,subject,type,message,forum_image,created_by,date,posted_by_full_name,status,gender,count(reply_id) as no_of_reply,posted_by_profile_pic FROM view_discussion_and_reply WHERE status=1 group by(discussion_id) order by date DESC');
        return $this->db->resultSet();
    }

    public function display_all_discussion_reply(){
        $this->db->query('SELECT discussion_id,reply_id, reply,  reply_user_id,reply_user_full_name,reply_image,current_status,reply_date,reply_user_profile_pic FROM view_discussion_and_reply WHERE current_status=1  ');
        return $this->db->resultSet();
    }

    public function search_from_forum($search_cont){
        $this->db->query('SELECT discussion_id,subject,type,message,forum_image,created_by,date,posted_by_full_name,status,gender,count(reply_id) as no_of_reply,posted_by_profile_pic from view_discussion_and_reply where (upper(subject) like upper(concat("%", :search_content , "%"))) or (upper(type) like upper(concat("%", :search_content , "%"))) or (upper(message) like upper(concat("%", :search_content , "%"))) AND status=1 group by(discussion_id) order by date DESC');
        $this->db->bind(":search_content", $search_cont);
        return $this->db->resultset();
        unset($_SESSION['search_cont']);
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

    public function edit_forum_post($data){
        $this->db->query('UPDATE forum_posts SET message=:edit_content,forum_image=:image_name where discussion_id=:id');
        $this->db->bind(":id", $data['post_id']);
        $this->db->bind(":edit_content", $data['edit_content']);
        $this->db->bind(":image_name", $data['image_name']);

        if($this->db->execute()){
            return true;
        }
        else{
            return false;
        }
    }

    public function edit_forum_post_reply($data){
        $this->db->query('UPDATE forumpost_reply SET reply=:edit_content,reply_image=:image_name where reply_id=:id');
        $this->db->bind(":id", $data['reply_id']);
        $this->db->bind(":edit_content", $data['edit_content']);
        $this->db->bind(":image_name", $data['image_name']);

        if($this->db->execute()){
            return true;
        }
        else{
            return false;
        }

    }
}



?>