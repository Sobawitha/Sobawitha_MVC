<?php
    class supplier_feedback extends Controller{
        private $supplierFeedModel;
        public function __construct(){
            $this->supplierFeedModel = $this->model('M_supplier_feedback');
    }

    public function view_all_feed(){
        if(isset($_SESSION['user_id']) && $_SESSION['user_flag'] ==4){ 
            $id=$_SESSION['user_id'];
            if($_SERVER['REQUEST_METHOD'] == 'POST'){  
            
            
            $filter_type = trim($_POST['feed_type']);
            $feed = $this->supplierFeedModel->display_all_feed($id,$filter_type);

            $row_count = $feed['count'];
            $five_star_count = $feed['five_star_count'];
            $four_star_count = $feed['four_star_count'];
            $three_star_count = $feed['three_star_count'];
            $two_star_count = $feed['two_star_count'];
            $one_star_count = $feed['one_star_count'];

            $average_rating = $this->supplierFeedModel->getAverageRating($id);
            
            
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
        
            $this->view('Raw_material_supplier/supplier_feedback/v_supplier_feedback',$data);
        }else{
            $feed = $this->supplierFeedModel->display_all_feed($id);

            $row_count = $feed['count'];
            $five_star_count = $feed['five_star_count'];
            $four_star_count = $feed['four_star_count'];
            $three_star_count = $feed['three_star_count'];
            $two_star_count = $feed['two_star_count'];
            $one_star_count = $feed['one_star_count'];

            $average_rating = $this->supplierFeedModel->getAverageRating($id);
            
            
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
        
            $this->view('Raw_material_supplier/supplier_feedback/v_supplier_feedback',$data);
        }
        }else{
            redirect('Login/login');  
        } 
      }
    
    
}
?>