<?php
    class Seller_dashboard extends Controller{
        public function __construct(){
            $this->userModel = $this->model('M_Seller_dashboard');
    }
   
   public function s_main_view(){
    $data=[
        'title' => 'Sobawitha'
    ];
    $this->view('SellerDash/v_seller_dashmain', $data);
  
   }
}
?>