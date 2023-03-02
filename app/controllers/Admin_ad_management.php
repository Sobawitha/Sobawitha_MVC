<?php
    class Admin_ad_management extends Controller{
        private $adminAdMgmtModel;
        public function __construct(){
            $this->adminAdMgmtModel = $this->model('M_Admin_ad_management');
    }
   
   public function reviewed_ads(){
    $data=[
        'title' => 'Sobawitha'
    ];
    $this->view('Admin/AdminAdManage/v_ad_manage_reviewed', $data);
  
   }

   public function ad_management_view(){
    if(isset($_SESSION['user_id']) && $_SESSION['user_flag'] ==1){ 
        $products = $this->adminAdMgmtModel->getProducts();
       
        $data=[
        'products' =>  $products
        ];
    
        $this->view('Admin/AdminAdManage/v_ad_manage_pending', $data);
  
    }else{
        redirect('Login/login');  
    }
  }







}
?>