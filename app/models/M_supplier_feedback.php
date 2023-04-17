<?php
    class M_supplier_feedback{
    private $db;

    public function __construct(){
        $this->db = new Database();
    }

    public function getCustomerFeedbacks($id){
        $this->db->query('SELECT feedback.*, user.first_name as sender_first_name, user.last_name as sender_last_name
        FROM feedback
        JOIN user ON feedback.sender_id = user.user_id
        WHERE feedback.receiver_id = :id AND feedback.feed_status = 1');
        $this->db->bind(':id',$id);
              
        $result = $this->db->resultSet();
        $count = $this->db->rowCount();
    
        $five_star_count = 0;
        $four_star_count = 0;
        $three_star_count = 0;
        $two_star_count = 0;
        $one_star_count = 0;
    
        foreach ($result as $feedback) {
            switch ($feedback->rating) {
                case 5:
                    $five_star_count++;
                    break;
                case 4:
                    $four_star_count++;
                    break;
                case 3:
                    $three_star_count++;
                    break;
                case 2:
                    $two_star_count++;
                    break;
                case 1:
                    $one_star_count++;
                    break;
                default:
                    // handle invalid rating value
                    break;
            }
        }
    
        return array(
            'feedbacks' => $result, 
            'count' => $count,
            'five_star_count' => $five_star_count,
            'four_star_count' => $four_star_count,
            'three_star_count' => $three_star_count,
            'two_star_count' => $two_star_count,
            'one_star_count' => $one_star_count,
       
        );
    }
   
    
    
    
    
    
    
    public function getAverageRating($id){
        $this->db->query('SELECT AVG(rating) AS average_rating FROM feedback WHERE receiver_id=:id AND feed_status=1');
        $this->db->bind(':id',$id);
              
        $row=$this->db->single();
        return $row->average_rating;
    }

    public function display_all_feed($id){
        if(isset($_POST['feed_type']) && !empty($_POST['feed_type'])){
            if ($_POST['feed_type'] == 'all'){            
                $this->db->query('SELECT feedback.*, user.first_name as sender_first_name, user.last_name as sender_last_name
                FROM feedback
                JOIN user ON feedback.sender_id = user.user_id
                WHERE feedback.receiver_id = :id AND feedback.feed_status = 1');
                $this->db->bind(':id',$id);
                $result = $this->db->resultSet();
                $count = $this->db->rowCount();
            
                $five_star_count = 0;
                $four_star_count = 0;
                $three_star_count = 0;
                $two_star_count = 0;
                $one_star_count = 0;
            
                foreach ($result as $feedback) {
                    switch ($feedback->rating) {
                        case 5:
                            $five_star_count++;
                            break;
                        case 4:
                            $four_star_count++;
                            break;
                        case 3:
                            $three_star_count++;
                            break;
                        case 2:
                            $two_star_count++;
                            break;
                        case 1:
                            $one_star_count++;
                            break;
                        default:
                            // handle invalid rating value
                            break;
                    }
                } 

                return array(
                    'feedbacks' => $result, 
                    'count' => $count,
                    'five_star_count' => $five_star_count,
                    'four_star_count' => $four_star_count,
                    'three_star_count' => $three_star_count,
                    'two_star_count' => $two_star_count,
                    'one_star_count' => $one_star_count,
               
                );
            }
            if ($_POST['feed_type'] == 'fives'){
                $this->db->query('SELECT feedback.*, user.first_name as sender_first_name, user.last_name as sender_last_name
                FROM feedback
                JOIN user ON feedback.sender_id = user.user_id
                WHERE feedback.receiver_id = :id AND feedback.feed_status = 1 AND feedback.rating = 5');
                $this->db->bind(':id',$id);
                 $result = $this->db->resultSet();
        $count = $this->db->rowCount();
    
        $five_star_count = 0;
        $four_star_count = 0;
        $three_star_count = 0;
        $two_star_count = 0;
        $one_star_count = 0;
    
        foreach ($result as $feedback) {
            switch ($feedback->rating) {
                case 5:
                    $five_star_count++;
                    break;
                case 4:
                    $four_star_count++;
                    break;
                case 3:
                    $three_star_count++;
                    break;
                case 2:
                    $two_star_count++;
                    break;
                case 1:
                    $one_star_count++;
                    break;
                default:
                    // handle invalid rating value
                    break;
            }
        } 

        return array(
            'feedbacks' => $result, 
            'count' => $count,
            'five_star_count' => $five_star_count,
            'four_star_count' => $four_star_count,
            'three_star_count' => $three_star_count,
            'two_star_count' => $two_star_count,
            'one_star_count' => $one_star_count,
       
        );
            }
            if ($_POST['feed_type'] == 'fours'){
                $this->db->query('SELECT feedback.*, user.first_name as sender_first_name, user.last_name as sender_last_name
                FROM feedback
                JOIN user ON feedback.sender_id = user.user_id
                WHERE feedback.receiver_id = :id AND feedback.feed_status = 1 AND feedback.rating = 4');
                $this->db->bind(':id',$id);
                 $result = $this->db->resultSet();
        $count = $this->db->rowCount();
    
        $five_star_count = 0;
        $four_star_count = 0;
        $three_star_count = 0;
        $two_star_count = 0;
        $one_star_count = 0;
    
        foreach ($result as $feedback) {
            switch ($feedback->rating) {
                case 5:
                    $five_star_count++;
                    break;
                case 4:
                    $four_star_count++;
                    break;
                case 3:
                    $three_star_count++;
                    break;
                case 2:
                    $two_star_count++;
                    break;
                case 1:
                    $one_star_count++;
                    break;
                default:
                    // handle invalid rating value
                    break;
            }
        } 

        return array(
            'feedbacks' => $result, 
            'count' => $count,
            'five_star_count' => $five_star_count,
            'four_star_count' => $four_star_count,
            'three_star_count' => $three_star_count,
            'two_star_count' => $two_star_count,
            'one_star_count' => $one_star_count,
       
        );
            }
  
            if ($_POST['feed_type'] == 'threes'){
                $this->db->query('SELECT feedback.*, user.first_name as sender_first_name, user.last_name as sender_last_name
                FROM feedback
                JOIN user ON feedback.sender_id = user.user_id
                WHERE feedback.receiver_id = :id AND feedback.feed_status = 1 AND feedback.rating = 3');
                $this->db->bind(':id',$id);
               $result = $this->db->resultSet();
        $count = $this->db->rowCount();
    
        $five_star_count = 0;
        $four_star_count = 0;
        $three_star_count = 0;
        $two_star_count = 0;
        $one_star_count = 0;
    
        foreach ($result as $feedback) {
            switch ($feedback->rating) {
                case 5:
                    $five_star_count++;
                    break;
                case 4:
                    $four_star_count++;
                    break;
                case 3:
                    $three_star_count++;
                    break;
                case 2:
                    $two_star_count++;
                    break;
                case 1:
                    $one_star_count++;
                    break;
                default:
                    // handle invalid rating value
                    break;
            }
        } 

        return array(
            'feedbacks' => $result, 
            'count' => $count,
            'five_star_count' => $five_star_count,
            'four_star_count' => $four_star_count,
            'three_star_count' => $three_star_count,
            'two_star_count' => $two_star_count,
            'one_star_count' => $one_star_count,
       
        );
          }
          if ($_POST['feed_type'] == 'twos'){
            $this->db->query('SELECT feedback.*, user.first_name as sender_first_name, user.last_name as sender_last_name
            FROM feedback
            JOIN user ON feedback.sender_id = user.user_id
            WHERE feedback.receiver_id = :id AND feedback.feed_status = 1 AND feedback.rating = 2');
            $this->db->bind(':id',$id);
             $result = $this->db->resultSet();
                $count = $this->db->rowCount();
            
                $five_star_count = 0;
                $four_star_count = 0;
                $three_star_count = 0;
                $two_star_count = 0;
                $one_star_count = 0;
            
        foreach ($result as $feedback) {
            switch ($feedback->rating) {
                case 5:
                    $five_star_count++;
                    break;
                case 4:
                    $four_star_count++;
                    break;
                case 3:
                    $three_star_count++;
                    break;
                case 2:
                    $two_star_count++;
                    break;
                case 1:
                    $one_star_count++;
                    break;
                default:
                    // handle invalid rating value
                    break;
            }
        } 
        return array(
            'feedbacks' => $result, 
            'count' => $count,
            'five_star_count' => $five_star_count,
            'four_star_count' => $four_star_count,
            'three_star_count' => $three_star_count,
            'two_star_count' => $two_star_count,
            'one_star_count' => $one_star_count,
       
        );
          }
          if ($_POST['feed_type'] == 'ones'){
            $this->db->query('SELECT feedback.*, user.first_name as sender_first_name, user.last_name as sender_last_name
            FROM feedback
            JOIN user ON feedback.sender_id = user.user_id
            WHERE feedback.receiver_id = :id AND feedback.feed_status = 1 AND feedback.rating = 1');
            $this->db->bind(':id',$id);
           $result = $this->db->resultSet();
        $count = $this->db->rowCount();
    
        $five_star_count = 0;
        $four_star_count = 0;
        $three_star_count = 0;
        $two_star_count = 0;
        $one_star_count = 0;
    
        foreach ($result as $feedback) {
            switch ($feedback->rating) {
                case 5:
                    $five_star_count++;
                    break;
                case 4:
                    $four_star_count++;
                    break;
                case 3:
                    $three_star_count++;
                    break;
                case 2:
                    $two_star_count++;
                    break;
                case 1:
                    $one_star_count++;
                    break;
                default:
                    // handle invalid rating value
                    break;
            }
        } 

        return array(
            'feedbacks' => $result, 
            'count' => $count,
            'five_star_count' => $five_star_count,
            'four_star_count' => $four_star_count,
            'three_star_count' => $three_star_count,
            'two_star_count' => $two_star_count,
            'one_star_count' => $one_star_count,
       
        );
          }
        }
  
        else{
            $this->db->query('SELECT feedback.*, user.first_name as sender_first_name, user.last_name as sender_last_name
            FROM feedback
            JOIN user ON feedback.sender_id = user.user_id
            WHERE feedback.receiver_id = :id AND feedback.feed_status = 1');
            $this->db->bind(':id',$id);
             $result = $this->db->resultSet();
        $count = $this->db->rowCount();
    
        $five_star_count = 0;
        $four_star_count = 0;
        $three_star_count = 0;
        $two_star_count = 0;
        $one_star_count = 0;
    
        foreach ($result as $feedback) {
            switch ($feedback->rating) {
                case 5:
                    $five_star_count++;
                    break;
                case 4:
                    $four_star_count++;
                    break;
                case 3:
                    $three_star_count++;
                    break;
                case 2:
                    $two_star_count++;
                    break;
                case 1:
                    $one_star_count++;
                    break;
                default:
                    // handle invalid rating value
                    break;
            }
        } 

        return array(
            'feedbacks' => $result, 
            'count' => $count,
            'five_star_count' => $five_star_count,
            'four_star_count' => $four_star_count,
            'three_star_count' => $three_star_count,
            'two_star_count' => $two_star_count,
            'one_star_count' => $one_star_count,
       
        );
        }
                  
    }
}
?>