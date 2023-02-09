<?php
    class Admin_dashboard extends Controller{
        private $adminDashModel;

        public function __construct(){
            $this->adminDashModel = $this->model('M_Admin_dashboard');
    }
   
   public function main_view(){
        if(isset($_SESSION['user_id']) && $_SESSION['user_flag'] ==1) {
        $data=[
            'title' => 'Sobawitha'
        ];
        $this->view('Admin/AdminDash/v_dashmain', $data);
        }
    }   
}
?>