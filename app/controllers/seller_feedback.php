<?php
    class seller_feedback extends Controller{
        private $sellerFeedModel;
        public function __construct(){
            $this->sellerFeedModel = $this->model('M_seller_feedback');
    }

    public function view_all_feed(){
        if(isset($_SESSION['user_id']) && $_SESSION['user_flag'] ==3){ 
            
            $id=$_SESSION['user_id'];
            $feed = $this->sellerFeedModel->getCustomerFeedbacks($id);
            
            $row_count = $feed['count'];
            $five_star_count = $feed['five_star_count'];
            $four_star_count = $feed['four_star_count'];
            $three_star_count = $feed['three_star_count'];
            $two_star_count = $feed['two_star_count'];
            $one_star_count = $feed['one_star_count'];

            $average_rating = $this->sellerFeedModel->getAverageRating($id);
            
            
            $data=[
            'feed' =>  $feed,
            'average_rating' => $average_rating,
            'row_count' => $row_count,
            'five_star_count' => $five_star_count,
            'four_star_count' => $four_star_count,
            'three_star_count' => $three_star_count,
            'two_star_count' => $two_star_count,
            'one_star_count' => $one_star_count,

            ];
        
            $this->view('Seller/seller_feedback/v_seller_feedback',$data);
      
        }else{
            redirect('Login/login');  
        } 
      }
       
    
}
?>