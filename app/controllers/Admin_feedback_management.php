<?php
    class Admin_feedback_management extends Controller{
        private $adminFeedMgntModel;
        public function __construct(){
            $this->adminFeedMgntModel = $this->model('M_Admin_feedback_management');
    }
   
   public function feed_reviewed(){
    $data=[
        'title' => 'Sobawitha'
    ];
    $this->view('Admin/AdminFeedbackManage/v_admin_feedback_publish', $data);
  
   }

   public function view_feedback(){
    if(isset($_SESSION['user_id']) && $_SESSION['user_flag'] ==1){ 
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $filter_type = trim($_POST['feed_type']);   
            $feed = $this->adminFeedMgntModel->getFeedbackDetails($filter_type);
       
        $data=[
        'feed' =>  $feed,
        'search' =>''
        
        ];
    
        $this->view('Admin/AdminFeedbackManage/v_admin_feedback_pending', $data);

    }else{
        $feed = $this->adminFeedMgntModel->getFeedbackDetails();
       
        $data=[
        'feed' =>  $feed,
        'search' =>''
        
        ];
    
        $this->view('Admin/AdminFeedbackManage/v_admin_feedback_pending', $data);

    }
  
    }else{
        redirect('Login/login');  
    } 
  }

  public function search_feed(){

  }
}
?>