<?php
    class Seller_feedbacks extends Controller{
        public function __construct(){
            $this->userModel = $this->model('M_Seller_feedback');
    }
   
   public function s_feedback_view(){
    $data=[
        'title' => 'Sobawitha'
    ];
    $this->view('SellerFeedbacks/v_seller_feedback', $data);
  
   }
}
?>