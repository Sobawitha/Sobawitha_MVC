<?php
    class Seller extends Controller{
        public function __construct(){
            $this->userModel = $this->model('M_Seller');
    }

    public function seller_register(){
       
         $data=[
                'title' => 'Sobawitha'
            ];
            $this->view('Seller/v_seller_register', $data);
          
           
    }
   
   
}
?>