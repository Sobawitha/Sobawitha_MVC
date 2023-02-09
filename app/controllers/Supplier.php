<?php
    class Supplier extends Controller{
        public function __construct(){
            $this->userModel = $this->model('M_Supplier');
    }

    public function supplier_register(){
       
         $data=[
                'title' => 'Sobawitha'
            ];
            $this->view('Raw_material_supplier/Raw_material_supplier/v_supplier_register', $data);
          
           
    }
   
   
}
?>