<?php

class order extends Controller {
    public function __construct(){
        $this-> order_model =$this->model('M_order');
    }

    public function order_list(){
        $data = [
        ];

        $this->view('raw_material_supplier/v_order_list',$data);
    }

    /** remove */
    public function view_cart(){
        $data = [
        ];

        $this->view('shopping_cart/v_shopping_cart',$data);
    }

    public function wish_list(){
        $data = [
        ];

        $this->view('buyer_wish_list/v_wish_list',$data);
    }

}

?>