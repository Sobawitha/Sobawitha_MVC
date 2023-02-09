<?php

class purchase extends Controller {
   
    public function __construct(){
        $this-> purchase_model =$this->model('M_purchase');
    }

    public function display_all_purchases(){
        $data = [];

        $this->view('Buyer/Purchases/purchase_list',$data);
    }

}

?>