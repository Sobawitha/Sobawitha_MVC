<?php
    class Admin_dashboard extends Controller{
        public function __construct(){
            $this->userModel = $this->model('M_Admin_dashboard');
    }
   
   public function main_view(){
    $data=[
        'title' => 'Sobawitha'
    ];
    $this->view('AdminDash/v_dashmain', $data);
  
   }
}
?>