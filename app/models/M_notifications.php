<?php

class M_notifications
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
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