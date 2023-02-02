<?php
    class seller_order_list extends Controller{
        public function __construct(){
            $this->userModel = $this->model('M_seller_order_list');
    }

    public function view_orders(){
        $data=[];
        $this->view('sellerOrderList/v_seller_order_list',$data);
    }
}
?>