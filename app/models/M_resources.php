<?php

class M_resources
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }
    
    // public function count_num_of_rows(){
    //     $this->db->query('SELECT count(post_id) as no_of_rows FROM view_post ');
    //     return $this->db->single();
    // }

    public function count_num_of_rows(){
        if((isset($_POST['search_text']) && !empty($_POST['search_text'])) && (isset($_GET['category']) && !empty($_GET['category']))){
            $search_cont=($_POST['search_text']);
            $this->db->query('SELECT count(post_id) as no_of_rows from view_post where ((upper(title) like upper(concat("%", :search_content , "%"))) or (upper(tag) like upper(concat("%", :search_content , "%"))) or
            (upper(discription) like upper(concat("%", :search_content , "%"))) or (upper(first_name) like upper(concat("%", :search_content , "%"))) or (upper(last_name) like upper(concat("%", :search_content , "%")))) AND tag=:tag ');
        $this->db->bind(":search_content", $search_cont);
        $this->db->bind(":tag",$_GET['category']);
        return $this->db->single();
    }
    else if((isset($_POST['search_text']) && !empty($_POST['search_text'])) && (!isset($_GET['category']))){
            $this->db->query('SELECT count(post_id) as no_of_rows from view_post where (upper(title) like upper(concat("%", :search_content , "%"))) or (upper(tag) like upper(concat("%", :search_content , "%"))) or
            (upper(discription) like upper(concat("%", :search_content , "%"))) or (upper(first_name) like upper(concat("%", :search_content , "%"))) or (upper(last_name) like upper(concat("%", :search_content , "%"))) ');
            $this->db->bind(":search_content", $_POST['search_text']);
            return $this->db->single();
    }
    else if((!isset($_POST['search_text'])) && (isset($_GET['category']) && !empty($_GET['category']))){
            if(($_GET['category']) == 'All categories'){
                $this->db->query('SELECT count(post_id) as no_of_rows FROM view_post');
            }
            else{
                $this->db->query('SELECT count(post_id) as no_of_rows FROM view_post where tag=:tag');
                $this->db->bind(":tag",$_GET['category']);
            }
            
            return $this->db->single();
    }
    else{
            $this->db->query('SELECT count(post_id) as no_of_rows FROM view_post');
            return $this->db->single();
    }
    
    }

    public function display_all_resources($start_from,$num_per_page){
            if((isset($_POST['search_text']) && !empty($_POST['search_text'])) && (isset($_GET['category']) && !empty($_GET['category']))){
                $search_cont=($_POST['search_text']);
                $this->db->query('SELECT * from view_post where ((upper(title) like upper(concat("%", :search_content , "%"))) or (upper(tag) like upper(concat("%", :search_content , "%"))) or
                (upper(discription) like upper(concat("%", :search_content , "%"))) or (upper(first_name) like upper(concat("%", :search_content , "%"))) or (upper(last_name) like upper(concat("%", :search_content , "%")))) AND tag=:tag limit :start_from, :num_per_page');
            $this->db->bind(":search_content", $search_cont);
            $this->db->bind(":start_from", $start_from);
            $this->db->bind(":num_per_page", $num_per_page);
            $this->db->bind(":tag",$_GET['category']);
            return $this->db->resultset();
    }
    else if((isset($_POST['search_text']) && !empty($_POST['search_text'])) && (!isset($_GET['category']))){
            // echo "come2";
            // echo $_POST['search_text'];
            // die();
            $this->db->query('SELECT * from view_post where (upper(title) like upper(concat("%", :search_content , "%"))) or (upper(tag) like upper(concat("%", :search_content , "%"))) or
            (upper(discription) like upper(concat("%", :search_content , "%"))) or (upper(first_name) like upper(concat("%", :search_content , "%"))) or (upper(last_name) like upper(concat("%", :search_content , "%"))) limit :start_from, :num_per_page');
            $this->db->bind(":search_content", $_POST['search_text']);
            $this->db->bind(":start_from", $start_from);
            $this->db->bind(":num_per_page", $num_per_page);
            return $this->db->resultset();
    }
    else if((!isset($_POST['search_text'])) && (isset($_GET['category']) && !empty($_GET['category']))){
            if(($_GET['category']) == 'All categories'){
                $this->db->query('SELECT * FROM view_post limit :start_from, :num_per_page');
                $this->db->bind(":start_from", $start_from);
                $this->db->bind(":num_per_page", $num_per_page);
            }
            else{
                $this->db->query('SELECT * FROM view_post where tag=:tag limit :start_from, :num_per_page');
                $this->db->bind(":start_from", $start_from);
                $this->db->bind(":num_per_page", $num_per_page);
                $this->db->bind(":tag",$_GET['category']);
            }
            
            return $this->db->resultSet();
    }
    else{
            $this->db->query('SELECT * FROM view_post limit :start_from, :num_per_page');
            $this->db->bind(":start_from", $start_from);
            $this->db->bind(":num_per_page", $num_per_page);
            return $this->db->resultSet();
    }
       
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
        $this->db->query('SELECT * FROM view_post WHERE tag=:category AND post_id!=:id');
        $this->db->bind(":category", $data['tag']);
        $this->db->bind(":id", $data['resource_id']);
        return $this->db->resultSet();
    }

    public function count_previous_like_with_user_id($postid, $user_id){
        $this->db->query('SELECT count(*) as previous_like from blogpost_like WHERE post_id=:post_id AND user_id=:user_id');
        $this->db->bind(":post_id", $postid);
        $this->db->bind(":user_id", $user_id);
        return $this->db->single();
    }

    public function like($postid){
        $this->db->query('UPDATE blogpost SET no_of_likes = no_of_likes+1 WHERE post_id=:post_id');
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
        $this->db->bind(":postid", $postid);

        if($this->db->execute()){
            return true;
        }
        else{
            return false;
        }
    }

    public function update_like_table($post_id, $user_id){
        $this->db->query('INSERT INTO blogpost_like (post_id, user_id) VALUES (:post_id, :user_id) ');
        $this->db->bind(":post_id", $post_id);
        $this->db->bind(":user_id", $user_id);

        if($this->db->execute()){
            return true;
        }
        else{
            return false;
        }
    }

    public function remove_unlike_user_from_like_table($post_id, $user_id){
        $this->db->query('DELETE FROM blogpost_like WHERE post_id = :post_id AND user_id = :user_id');
        $this->db->bind(':post_id', $post_id);
        $this->db->bind(':user_id', $user_id);
         
        if($this->db->execute()){
            return true;
        }
        else{
            return false;
        }
    }

    // public function search_bar($search_cont,$num_per_page,$start_from){
    //     $this->db->query('SELECT * from view_post where (upper(title) like upper(concat("%", :search_content , "%"))) or (upper(tag) like upper(concat("%", :search_content , "%"))) or
    //     (upper(discription) like upper(concat("%", :search_content , "%"))) or (upper(first_name) like upper(concat("%", :search_content , "%"))) or (upper(last_name) like upper(concat("%", :search_content , "%"))) limit :start_from, :num_per_page');
    //     $this->db->bind(":search_content", $search_cont);
    //     $this->db->bind(":start_from", $start_from);
    //     $this->db->bind(":num_per_page", $num_per_page);
    //     return $this->db->resultset();
    // }

    // public function filter_post($search_cont,$num_per_page,$start_from){
    //     $this->db->query('SELECT * from view_post where (upper(tag) like upper(concat("%", :search_content , "%"))) limit :start_from, :num_per_page');
    //     $this->db->bind(":search_content", $search_cont);
    //     $this->db->bind(":start_from", $start_from);
    //     $this->db->bind(":num_per_page", $num_per_page);
    //     return $this->db->resultset();
    // }



 /*comment */

    public function post_comment($data){

        $this->db->query('INSERT INTO comment (user_id, post_id, comment) VALUES (:user_id, :post_id, :comment) ');
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

    public function post_reply($data){

        $this->db->query('INSERT INTO comment_reply (reply, comment_id, user_id, post_id) VALUES (:reply, :comment_id, :user_id, :post_id) ');
        $this->db->bind(":reply", $data['reply']);
        $this->db->bind(":comment_id", $data['comment_id']);
        $this->db->bind(":user_id", $data['user_id']);
        $this->db->bind(":post_id", $data['post_id']);

        //execute the query
        if($this->db->execute()){
            return true;
        }
        else{
            return false;
        }
    }

    public function display_all_comment($data){
        $this->db->query('SELECT  comment_id, comment_user_id, comment, comment_date, first_name, last_name, reply_id, reply, reply_comment_id, reply_user_id, reply_date, reply_user_first_name, reply_user_last_name, count(reply_id) as no_of_reply FROM view_comment_reply WHERE comment_post_id=:postid group by(comment_id)');
        $this->db->bind(":postid", $data['resource_id']);
        return $this->db->resultSet();
    }

    public function display_all_comment_for_reply($data){
        $this->db->query('SELECT  comment_id, comment_user_id, comment, comment_date, first_name, last_name, reply_id, reply, reply_comment_id, reply_user_id, reply_date, reply_user_first_name, reply_user_last_name  FROM view_comment_reply WHERE comment_post_id=:postid');
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

    public function get_profile_detail($id){
        $this->db->query('SELECT * FROM user WHERE user_id = :id');
        $this->db->bind (":id", $id);
        return $this->db->resultset();
    }

    public function find_user_id($post_id){
        $this->db->query('select officer_id as user_id from blogpost where post_id = :post_id');
        $this->db->bind(":post_id",$post_id);
        return $this->db->single();
    }



}


?>