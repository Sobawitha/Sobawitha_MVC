<?php
    class M_Admin_feedback_management{
    private $db;

    public function __construct(){
        $this->db = new Database();
    }

    public function getFeedbackDetails($feed_type, $limit, $offset){
        if(isset($feed_type) && !empty($feed_type)){
            if ($feed_type == 'pending_feed'){  
                
                $this->db->query("SELECT COUNT(*) as total_rows FROM feedback  WHERE feed_status = 0");
                $row_count = $this->db->single()->total_rows;
                $this->db->query("SELECT feedback.*, admin.first_name AS admin_first_name, user.first_name AS receiver_name, sender.email AS sender_email, sender.first_name as firstname FROM feedback JOIN user AS admin ON feedback.admin_id = admin.user_id JOIN user ON feedback.receiver_id = user.user_id JOIN user AS sender ON feedback.sender_id = sender.user_id WHERE feedback.feed_status = 0 LIMIT $limit OFFSET $offset");
     
                $result=$this->db->resultSet();
                return array('rows' => $result, 'row_count' => $row_count);
            }
            
            if ($feed_type == 'published_feed'){     
                $this->db->query("SELECT COUNT(*) as total_rows FROM feedback  WHERE feed_status = 1");
                $row_count = $this->db->single()->total_rows;
                $this->db->query("SELECT feedback.*, admin.first_name AS admin_first_name, user.first_name AS receiver_name, user.email AS sender_email FROM feedback JOIN user AS admin ON feedback.admin_id = admin.user_id JOIN user ON feedback.receiver_id = user.user_id WHERE feedback.feed_status = 1 LIMIT $limit OFFSET $offset");
     
                $result=$this->db->resultSet();
                return array('rows' => $result, 'row_count' => $row_count);
            }

            if ($feed_type == 'rejected_feed'){     
                $this->db->query("SELECT COUNT(*) as total_rows FROM feedback  WHERE feed_status = 2");
                $row_count = $this->db->single()->total_rows;
                $this->db->query("SELECT feedback.*, admin.first_name AS admin_first_name, user.first_name AS receiver_name, user.email AS sender_email FROM feedback JOIN user AS admin ON feedback.admin_id = admin.user_id JOIN user ON feedback.receiver_id = user.user_id WHERE feedback.feed_status = 2 LIMIT $limit OFFSET $offset");
     
                $result=$this->db->resultSet();
                return array('rows' => $result, 'row_count' => $row_count);
            }
        
        }else{
            $this->db->query("SELECT COUNT(*) as total_rows FROM feedback  WHERE feed_status = 0");
                $row_count = $this->db->single()->total_rows;
                $this->db->query("SELECT feedback.*, admin.first_name AS admin_first_name, user.first_name AS receiver_name, sender.email AS sender_email, sender.first_name as firstname FROM feedback JOIN user AS admin ON feedback.admin_id = admin.user_id JOIN user ON feedback.receiver_id = user.user_id JOIN user AS sender ON feedback.sender_id = sender.user_id WHERE feedback.feed_status = 0 LIMIT $limit OFFSET $offset");
     
                $result=$this->db->resultSet();
                return array('rows' => $result, 'row_count' => $row_count);
    }
}

    public function getSearchFeedbacks($search)
    {

    $this->db->query("SELECT COUNT(*) as total_rows FROM feedback  WHERE category LIKE '%$search%' ");
    $row_count = $this->db->single()->total_rows;    

    $this->db->query("SELECT feedback.*, admin.first_name AS admin_first_name, user.first_name AS receiver_name, admin.email AS sender_email FROM feedback JOIN user AS admin ON feedback.admin_id = admin.user_id JOIN user ON feedback.receiver_id = user.user_id WHERE feedback.category LIKE '%$search%' ");
    $result=$this->db->resultSet();
    return array('rows' => $result, 'row_count' => $row_count);   
    } 

    public function reviewFeed($feed_id)
    {
        $this->db->query('UPDATE feedback set feed_status=1, admin_id= :admin WHERE id = :id');
        $this->db->bind(':id',$feed_id);
        $this->db->bind(':admin',$_SESSION['user_id']);
  
        if($this->db->execute()){
           return true;
        }else{
            return false;
        }    
    } 

    public function rejectFeed($feed_id)
    {
        $this->db->query('UPDATE feedback set feed_status=2, admin_id= :admin WHERE id = :id');
        $this->db->bind(':id',$feed_id);
        $this->db->bind(':admin',$_SESSION['user_id']);
  
        if($this->db->execute()){
           return true;
        }else{
            return false;
        }    
    } 

    public function getFeedDetailsForReject($id){
        $this->db->query("SELECT f.*, u.email, u.first_name 
                          FROM feedback f 
                          JOIN user u ON f.sender_id = u.user_id 
                          WHERE f.id = :id");
        $this->db->bind(':id', $id); 
        $row = $this->db->single();
        return $row;
   }
   
    
}