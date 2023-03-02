<?php
    class Admin_complaints_management extends Controller{
        
        private $adminComplaintsMgnt;
        public function __construct(){
            $this->adminComplaintsMgnt = $this->model('M_Admin_complaints_management');
    }

    public function view_complaints(){
        if(isset($_SESSION['user_id']) && $_SESSION['user_flag'] ==1){ 
            $complaints = $this->adminComplaintsMgnt->getCompDetails();
           
            $data=[
            'complaints' =>  $complaints
            ];
        
            $this->view('Admin/AdminCompManage/v_admin_comp_pending', $data);
      
        }else{
            redirect('Login/login');  
        }
      }

       public function comp_solved(){
        $data=[
            'title' => 'Sobawitha'
        ];
        $this->view('Admin/AdminCompManage/v_admin_comp_solved', $data);
      
       }

}