<?php

class cart extends Controller {
    public function __construct(){
        $this-> cart_model =$this->model('M_cart');
    }

    public function view_cart(){
        $data = [
        ];

        $this->view('shopping_cart/v_shopping_cart',$data);
    }

}

?>