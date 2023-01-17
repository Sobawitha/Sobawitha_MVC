<?php
    class seller_ad_management extends Controller{
        public function __construct(){
            $this->userModel = $this->model('M_Seller');
    }

    public function add_listing(){
        $data=[];
        $this->view('sellerAdManage/v_seller_ad_manage',$data);
    }
}
?>