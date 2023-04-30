<?php

class M_dashboard
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function get_no_of_blogposts($id){
        // $this->db->query("SELECT COUNT(*) AS num_posts FROM blogpost WHERE (created) >= DATE_SUB(NOW(), INTERVAL 1 YEAR) AND officer_id = :id ");
        $this->db->query("SELECT COUNT(*) AS num_posts FROM blogpost WHERE officer_id = :id AND created >= DATE_SUB(NOW(), INTERVAL 1 YEAR);");
        $this->db->bind(":id", $id);
        return $this->db->single();
        
    }

    public function get_no_of_forumtopics($id){
        // $this->db->query("SELECT COUNT(*) AS num_forum_topics FROM forum_posts WHERE (date) >= DATE_SUB(NOW(), INTERVAL 1 YEAR) AND created_by = :id");
        $this->db->query("SELECT COUNT(*) AS num_forum_topics FROM forum_posts WHERE created_by = :id AND date >= DATE_SUB(NOW(), INTERVAL 1 YEAR);");
        $this->db->bind(":id", $id);
        return $this->db->single();
        
    }

    public function get_no_of_complaints($id){
        // $this->db->query("SELECT COUNT(*) AS num_complaint FROM complaint WHERE (date) >= DATE_SUB(NOW(), INTERVAL 1 MONTH) AND created_by = :id");
        $this->db->query("SELECT COUNT(*) AS num_complaint 
        FROM complaint 
        WHERE created_by = :id 
        AND date >= DATE_SUB(NOW(), INTERVAL 1 YEAR);
        ");
        $this->db->bind(":id", $id);
        return $this->db->single();
        
    }

    public function get_no_of_category(){
        $this->db->query("SELECT count(DISTINCT(tag)) AS num_category FROM blogpost");
        return $this->db->single();
    }

    public function get_category_detail(){
        $this->db->query("SELECT DISTINCT(tag) as category, count(tag) AS num_category FROM blogpost group by(tag)");
        return $this->db->resultSet();
    }

    public function get_all_forum_posts($id,$start_from,$num_per_page){
        $this->db->query("SELECT discussion_id, subject, date, type,count(reply_id) as no_of_reply from view_discussion_and_reply where created_by=:id group by(discussion_id) limit :start_from, :num_per_page ");
        $this->db->bind(":id", $id);
        $this->db->bind(":start_from", $start_from);
        $this->db->bind(":num_per_page", $num_per_page);
        return $this->db->resultSet();
    }

    public function get_blogpost_count_details(){
        $this->db->query("SELECT YEAR(created) as year, MONTHNAME(created) as month, COUNT(*) as count
        FROM blogpost where officer_id=:id
        GROUP BY YEAR(created), MONTH(created) 
        ");
        $this->db->bind(":id", $_SESSION['user_id']);
        return $this->db->resultSet();
    }

    public function get_complaint_count_details(){
        $this->db->query("SELECT YEAR(date) as year, MONTHNAME(date) as month, COUNT(*) as count
        FROM complaint where created_by=:id
        GROUP BY YEAR(date), MONTH(date) 
        ");
        $this->db->bind(":id", $_SESSION['user_id']);
        return $this->db->resultSet();
    }


    
}


?>