<?php
    class Admin_complaints_management extends Controller{
        public function __construct(){
            $this->userModel = $this->model('M_Admin_complaints_management');
    }

    public function comp_review_pending(){
        $data=[
            'title' => 'Sobawitha'
        ];
        $this->view('Admin/AdminCompManage/v_admin_comp_pending', $data);
      
       }

       public function comp_solved(){
        $data=[
            'title' => 'Sobawitha'
        ];
        $this->view('Admin/AdminCompManage/v_admin_comp_solved', $data);
      
       }

}