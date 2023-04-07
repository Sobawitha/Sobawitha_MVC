<?php

class M_dashboard
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function get_no_of_blogposts($id){
        $this->db->query("SELECT COUNT(*) AS num_posts FROM blogpost WHERE (created) >= DATE_SUB(NOW(), INTERVAL 1 YEAR) AND officer_id = :id ");
        $this->db->bind(":id", $id);
        return $this->db->single();
        
    }

    // public function get_no_of_blogposts_per_month($id){
    //     $this->db->query("SELECT months.month, COALESCE(COUNT(*), 0) as no_of_posts
    //     FROM (
    //         SELECT 1 AS month
    //         UNION SELECT 2
    //         UNION SELECT 3
    //         UNION SELECT 4
    //         UNION SELECT 5
    //         UNION SELECT 6
    //         UNION SELECT 7
    //         UNION SELECT 8
    //         UNION SELECT 9
    //         UNION SELECT 10
    //         UNION SELECT 11
    //         UNION SELECT 12
    //     ) as months
    //     LEFT JOIN blogpost
    //         ON MONTH(blogpost.created) = months.month
    //         AND blogpost.officer_id = :id
    //         AND blogpost.created >= DATE_SUB(NOW(), INTERVAL 1 YEAR)
    //     GROUP BY months.month
    //     ");
    //     $this->db->bind(":id", $id);
    //     return $this->db->resultSet();
    // }

    public function get_no_of_forumtopics($id){
        $this->db->query("SELECT COUNT(*) AS num_forum_topics FROM forum_posts WHERE (date) >= DATE_SUB(NOW(), INTERVAL 1 YEAR) AND created_by = :id");
        $this->db->bind(":id", $id);
        return $this->db->single();
        
    }

    public function get_no_of_complaints($id){
        $this->db->query("SELECT COUNT(*) AS num_complaint FROM complaint WHERE (date) >= DATE_SUB(NOW(), INTERVAL 1 MONTH) AND created_by = :id");
        $this->db->bind(":id", $id);
        return $this->db->single();
        
    }

    
}


?>