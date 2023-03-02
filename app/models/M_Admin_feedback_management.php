<?php
    class M_Admin_feedback_management{
    private $db;

    public function __construct(){
        $this->db = new Database();
    }

    public function getFeedbackDetails(){
        $this->db->query('SELECT feedback.*, admin.first_name AS admin_first_name, user.first_name AS receiver_name FROM feedback JOIN user AS admin ON feedback.admin_id = admin.user_id JOIN user ON feedback.receiver_id = user.user_id');
     
        $result=$this->db->resultSet();
        return $result;
    }
    
}