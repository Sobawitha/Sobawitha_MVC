<?php

class M_fertilizer_product
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }
    

 /*comment */

    public function post_comment($data){

        $this->db->query('INSERT INTO fertilizer_product_comment (product_id, comment, commented_by) VALUES (:product_id, :comment, :commented_by) ');
        $this->db->bind(":product_id", $data['product_id']);
        $this->db->bind(":comment", $data['comment']);
        $this->db->bind(":commented_by", $data['commented_by']);
        
        //execute the query
        if($this->db->execute()){
            return true;
        }
        else{
            return false;
        }
    }

    public function post_reply($data){

        $this->db->query('INSERT INTO comment_reply (reply, comment_id, user_id, post_id, user_first_name, user_last_name) VALUES (:reply, :comment_id, :user_id, :post_id, :first_name, :last_name) ');
        $this->db->bind(":reply", $data['reply']);
        $this->db->bind(":comment_id", $data['comment_id']);
        $this->db->bind(":user_id", $data['user_id']);
        $this->db->bind(":post_id", $data['post_id']);
        $this->db->bind(":first_name", $data['first_name']);
        $this->db->bind(":last_name", $data['last_name']);

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

    public function find_blogpost_id($comment_id){
        // var_dump($comment_id);
        //     die();
        $this->db->query('SELECT post_id as post_id from comment where comment_id=:comment_id');
        $this->db->bind(":comment_id", $comment_id);
        return $this->db->single();
    }

    public function find_blogpost_id_from_replyid($reply_id){
        $this->db->query('SELECT post_id as post_id from comment_reply where reply_id=:reply_id');
        $this->db->bind(":reply_id", $reply_id);
        return $this->db->single();
    }

    public function find_category($id){
        $this->db->query('SELECT tag as category from blogpost where post_id=:post_id ');
        $this->db->bind(":post_id",$id);
        return $this->db->single();
    }
    public function delete_comment($id){
        $this->db->query('DELETE  from comment where comment_id=:comment_id');
        $this->db->bind(":comment_id", $id);
        if($this->db->execute()){
            return true;
        }
        else{
            return false;
        }
    }

    public function delete_reply($id){
        $this->db->query('DELETE from comment_reply where reply_id=:reply_id');
        $this->db->bind(":reply_id", $id);
        if($this->db->execute()){
            return true;
        }
        else{
            return false;
        }
    }

    public function edit_comment($data){
        $this->db->query('UPDATE comment SET comment=:comment WHERE comment_id=:comment_id');
        $this->db->bind(":comment",$data['comment']);
        $this->db-> bind(":comment_id", $data['comment_id']);
        if($this->db->execute()){
            return true;
        }
        else{
            return false;
        }
    }

    public function edit_reply($data){
        $this->db->query('UPDATE comment_reply SET reply=:reply WHERE reply_id=:reply_id');
        $this->db->bind(":reply",$data['reply']);
        $this->db-> bind(":reply_id", $data['reply_id']);
        if($this->db->execute()){
            return true;
        }
        else{
            return false;
        }
    }

    public function view_individual_product($id){
    
      $this->db->query('SELECT f.*, COUNT(fb.id) AS total_feedback_count, 
      COUNT(CASE WHEN fb.rating = 1 THEN 1 ELSE NULL END) AS rating_1_count,
      COUNT(CASE WHEN fb.rating = 2 THEN 1 ELSE NULL END) AS rating_2_count,
      COUNT(CASE WHEN fb.rating = 3 THEN 1 ELSE NULL END) AS rating_3_count,
      COUNT(CASE WHEN fb.rating = 4 THEN 1 ELSE NULL END) AS rating_4_count,
      COUNT(CASE WHEN fb.rating = 5 THEN 1 ELSE NULL END) AS rating_5_count
        FROM fertilizer f
        LEFT JOIN feedback fb ON f.created_by = fb.receiver_id
        WHERE f.Product_id = :id AND fb.feed_status = 1
        GROUP BY f.Product_id

    ');
      $this->db->bind(':id',$id);  


      $row= $this->db->single();

      if($this->db->rowCount() >0){
            return $row;
      }else{
            return false;
      }
    
    }

    public function show_similar($title, $crop_type, $type, $id) {
        $this->db->query("SELECT * FROM fertilizer WHERE (product_name LIKE '%$title%' OR crop_type LIKE '%$crop_type%' OR type LIKE '%$type%') AND current_status = 1 AND Product_id != :id LIMIT 2");
        $this->db->bind(":id",$id);
        return $this->db->resultset();
    }
    
    



}


?>