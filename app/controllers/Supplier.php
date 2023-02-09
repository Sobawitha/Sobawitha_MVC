<?php
    class Supplier extends Controller{
        public function __construct(){
            $this->userModel = $this->model('M_Supplier');
    }

    public function supplier_register(){
       
         $data=[
                'title' => 'Sobawitha'
            ];
            $this->view('Supplier/v_supplier_register', $data);
          
           
    }
   
   
}
?>