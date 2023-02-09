<?php
    class Admin_feedback_management extends Controller{
        public function __construct(){
            $this->userModel = $this->model('M_Admin_feedback_management');
    }
   
   public function feed_reviewed(){
    $data=[
        'title' => 'Sobawitha'
    ];
    $this->view('Admin/AdminFeedbackManage/v_admin_feedback_publish', $data);
   }

   public function feed_review_pending(){
    $data=[
        'title' => 'Sobawitha'
    ];
    $this->view('Admin/AdminFeedbackManage/v_admin_feedback_pending', $data);
  
   }
}
?>