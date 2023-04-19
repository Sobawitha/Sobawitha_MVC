<?php
    class M_Admin_feedback_management{
    private $db;

    public function __construct(){
        $this->db = new Database();
    }

    public function getFeedbackDetails(){
        if(isset($_POST['feed_type']) && !empty($_POST['feed_type'])){
            if ($_POST['feed_type'] == 'pending_feed'){  
                
                $this->db->query("SELECT COUNT(*) as total_rows FROM feedback  WHERE feed_status = 0");
                $row_count = $this->db->single()->total_rows;
                $this->db->query('SELECT feedback.*, admin.first_name AS admin_first_name, user.first_name AS receiver_name FROM feedback JOIN user AS admin ON feedback.admin_id = admin.user_id JOIN user ON feedback.receiver_id = user.user_id WHERE feedback.feed_status = 0');
     
                $result=$this->db->resultSet();
                return array('rows' => $result, 'row_count' => $row_count);
            }
            
            if ($_POST['feed_type'] == 'published_feed'){     
                $this->db->query("SELECT COUNT(*) as total_rows FROM feedback  WHERE feed_status = 1");
                $row_count = $this->db->single()->total_rows;
                $this->db->query('SELECT feedback.*, admin.first_name AS admin_first_name, user.first_name AS receiver_name FROM feedback JOIN user AS admin ON feedback.admin_id = admin.user_id JOIN user ON feedback.receiver_id = user.user_id WHERE feedback.feed_status = 1');
     
                $result=$this->db->resultSet();
                return array('rows' => $result, 'row_count' => $row_count);
            }

            if ($_POST['feed_type'] == 'rejected_feed'){     
                $this->db->query("SELECT COUNT(*) as total_rows FROM feedback  WHERE feed_status = 2");
                $row_count = $this->db->single()->total_rows;
                $this->db->query('SELECT feedback.*, admin.first_name AS admin_first_name, user.first_name AS receiver_name FROM feedback JOIN user AS admin ON feedback.admin_id = admin.user_id JOIN user ON feedback.receiver_id = user.user_id WHERE feedback.feed_status = 2');
     
                $result=$this->db->resultSet();
                return array('rows' => $result, 'row_count' => $row_count);
            }
        
        }else{
            $this->db->query("SELECT COUNT(*) as total_rows FROM feedback  WHERE feed_status = 0");
                $row_count = $this->db->single()->total_rows;
                $this->db->query('SELECT feedback.*, admin.first_name AS admin_first_name, user.first_name AS receiver_name FROM feedback JOIN user AS admin ON feedback.admin_id = admin.user_id JOIN user ON feedback.receiver_id = user.user_id WHERE feedback.feed_status = 0');
     
                $result=$this->db->resultSet();
                return array('rows' => $result, 'row_count' => $row_count);
    }
}

    public function getSearchFeedbacks($search)
    {

    $this->db->query("SELECT COUNT(*) as total_rows FROM feedback  WHERE category LIKE '%$search%' ");
    $row_count = $this->db->single()->total_rows;    

    $this->db->query("SELECT feedback.*, admin.first_name AS admin_first_name, user.first_name AS receiver_name FROM feedback JOIN user AS admin ON feedback.admin_id = admin.user_id JOIN user ON feedback.receiver_id = user.user_id WHERE feedback.category LIKE '%$search%' ");
    $result=$this->db->resultSet();
    return array('rows' => $result, 'row_count' => $row_count);   
    } 
    
}