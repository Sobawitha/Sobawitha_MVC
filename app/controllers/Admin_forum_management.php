<?php
    class Admin_forum_management extends Controller{
        public function __construct(){
            $this->userModel = $this->model('M_Admin_feedback_management');
    }
   
   public function view_forum(){
    $data=[
        'title' => 'Sobawitha'
    ];
    $this->view('Admin/AdminForumManage/v_admin_forum_view', $data);
  
   }

}
?>