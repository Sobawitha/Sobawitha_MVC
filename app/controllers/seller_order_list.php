<?php
    class seller_order_list extends Controller{
        public function __construct(){
            $this->seller_order_list_model = $this->model('M_seller_order_list');
    }

    public function view_orders(){
        $data=[];
        $this->view('Seller/Seller_order/v_seller_order_list',$data);
    }
}
?>