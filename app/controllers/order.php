<?php

class order extends Controller {
    public function __construct(){
        $this-> order_model =$this->model('M_order');
    }

    public function supplier_order_list(){
        $data = [
        ];

        $this->view('Raw_material_supplier/Supplier_order_list/v_order_list',$data);
    }

    /** remove */
    public function view_cart(){
        $data = [
        ];

        $this->view('Buyer/shopping_cart/v_shopping_cart',$data);
    }

}

?>