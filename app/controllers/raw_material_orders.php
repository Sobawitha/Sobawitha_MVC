<?php

class raw_material_orders extends Controller
{

    private $raw_material_orders_model;

    public function __construct(){
        $this-> raw_material_orders_model =$this->model('M_raw_material_orders');
    }

    public function view_cart(){
        $cart_item = $this->raw_material_orders_model->view_cart();
        $data = [
            'cart_item' => $cart_item,
        ];
        $this->view('Seller/shopping_cart/v_shopping_cart',$data);
    }
   

}
