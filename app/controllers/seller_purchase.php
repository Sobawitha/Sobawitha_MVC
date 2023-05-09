<?php

class seller_purchase extends Controller {
    private $seller_purchase_model;
    public function __construct(){
        $this-> seller_purchase_model =$this->model('M_Seller_purchase');
    }

    public function display_all_purchases(){
        $purchases_list = $this->seller_purchase_model->get_purchase_list();
        $data = [
            'purchase_list' => $purchases_list,
        ];
        $this->view('Seller/seller_purchases/seller_purchases',$data);
    }

}

?>