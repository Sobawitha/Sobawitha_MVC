<?php
    class Admin_forum_management extends Controller{
        public function __construct(){
            $this->userModel = $this->model('M_Admin_feedback_management');
            $this->notification_model = $this->model('M_notifications');
    }
   
   public function view_forum(){
    $no_of_notifications = $this->notification_model->find_notification_count()->total_count;
    $notifications = $this->notification_model->notifications();
    $data=[
        'title' => 'Sobawitha',
        'no_of_notifications' =>$no_of_notifications,
        'notifications' => $notifications,
    ];
    $this->view('Admin/AdminForumManage/v_admin_forum_view', $data);
  
   }

}
?>