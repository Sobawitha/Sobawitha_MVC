<?php
    class Admin_user_management extends Controller{
        public function __construct(){
            $this->userModel = $this->model('M_Admin_user_management');
    }
   
   public function user_manage(){
    $data=[
        'title' => 'Sobawitha'
    ];
    $this->view('AdminUserManagement/v_user_management', $data);
  
   }

   public function choose_user(){
    $data=[
        'title' => 'Sobawitha'
    ];
    $this->view('AdminUserManagement/v_choose_add_user', $data);
  
   }

   public function add_agri(){
    $data=[
        'title' => 'Sobawitha'
    ];
    $this->view('AdminUserManagement/v_add_agri_o', $data);
   }

   public function add_admin(){
    $data=[
        'title' => 'Sobawitha'
    ];
    $this->view('AdminUserManagement/v_add_admin', $data);
   }

   public function view_more(){
    $data=[
        'title' => 'Sobawitha'
    ];
    $this->view('AdminUserManagement/v_view_more_info', $data);
   }
}
?>