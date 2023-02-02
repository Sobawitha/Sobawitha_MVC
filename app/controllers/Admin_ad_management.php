<?php
    class Admin_ad_management extends Controller{
        public function __construct(){
            $this->userModel = $this->model('M_Admin_ad_management');
    }
   
   public function reviewed_ads(){
    $data=[
        'title' => 'Sobawitha'
    ];
    $this->view('AdminAdManage/v_ad_manage_reviewed', $data);
  
   }

   public function review(){
    $data=[
        'title' => 'Sobawitha'
    ];
    $this->view('AdminAdManage/v_ad_manage_pending', $data);
  
   }
}
?>