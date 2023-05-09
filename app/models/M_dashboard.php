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
        // $this->db->query("SELECT YEAR(created) as year, MONTHNAME(created) as month, COUNT(*) as count
        // FROM blogpost where officer_id=:id
        // GROUP BY YEAR(created), MONTH(created) 
        // ");

        $this->db->query("SELECT YEAR(date_list.month_year) as year, MONTHNAME(date_list.month_year) as month, COUNT(blogpost.post_id) as count
        FROM
        (
          SELECT DATE_FORMAT(NOW(), '%Y-%m-01') AS month_year
          UNION SELECT DATE_FORMAT(DATE_SUB(NOW(), INTERVAL 1 MONTH), '%Y-%m-01') AS month_year
          UNION SELECT DATE_FORMAT(DATE_SUB(NOW(), INTERVAL 2 MONTH), '%Y-%m-01') AS month_year
          UNION SELECT DATE_FORMAT(DATE_SUB(NOW(), INTERVAL 3 MONTH), '%Y-%m-01') AS month_year
          UNION SELECT DATE_FORMAT(DATE_SUB(NOW(), INTERVAL 4 MONTH), '%Y-%m-01') AS month_year
          UNION SELECT DATE_FORMAT(DATE_SUB(NOW(), INTERVAL 5 MONTH), '%Y-%m-01') AS month_year
          UNION SELECT DATE_FORMAT(DATE_SUB(NOW(), INTERVAL 6 MONTH), '%Y-%m-01') AS month_year
          UNION SELECT DATE_FORMAT(DATE_SUB(NOW(), INTERVAL 7 MONTH), '%Y-%m-01') AS month_year
          UNION SELECT DATE_FORMAT(DATE_SUB(NOW(), INTERVAL 8 MONTH), '%Y-%m-01') AS month_year
          UNION SELECT DATE_FORMAT(DATE_SUB(NOW(), INTERVAL 9 MONTH), '%Y-%m-01') AS month_year
          UNION SELECT DATE_FORMAT(DATE_SUB(NOW(), INTERVAL 10 MONTH), '%Y-%m-01') AS month_year
          UNION SELECT DATE_FORMAT(DATE_SUB(NOW(), INTERVAL 11 MONTH), '%Y-%m-01') AS month_year
        ) AS date_list
        LEFT JOIN blogpost ON YEAR(blogpost.created) = YEAR(date_list.month_year) AND MONTH(blogpost.created) = MONTH(date_list.month_year) AND officer_id=17
        GROUP BY YEAR(date_list.month_year), MONTH(date_list.month_year)
        ORDER BY YEAR(date_list.month_year), MONTH(date_list.month_year)");
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

    /* for notifications*/
    public function find_notification_count(){
        $this->db->query("SELECT SUM(count_notification) as total_count
        FROM (
            SELECT COUNT(notification_id) as count_notification
            FROM notification_based_on_user_role
            WHERE user_role = 6 OR user_role = :user_role AND current_status = 0
            
            UNION
            
            SELECT COUNT(notification_id) as count_notification
            FROM notification_based_on_users
            WHERE user = :user_id AND current_status = 0
        ) AS combined_counts;
        ");
        $this->db->bind(":user_role", $_SESSION['user_flag']);
        $this->db->bind(":user_id", $_SESSION['user_id']);
        return $this->db->single();
    }

    public function notifications(){
        $this->db->query("SELECT time, message, type, current_status
        FROM (
          SELECT time, message, type, current_status
          FROM notification_based_on_user_role
          WHERE user_role = 6 OR user_role = :user_role AND current_status = 0
          UNION
          SELECT time, message, type, current_status
          FROM notification_based_on_users
          WHERE user = :user_id AND current_status = 0
        ) AS combined_notifications  
        ORDER BY time DESC  LIMIT 3");
        $this->db->bind(":user_id", $_SESSION['user_id']);
        $this->db->bind(":user_role", $_SESSION['user_flag']);
        return $this->db->resultSet();
    }


    
}


?>