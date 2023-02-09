<?php
    class seller_ad_management extends Controller{
        public function __construct(){
            $this->userModel = $this->model('M_seller_ad_management');
    }

    public function View_listing(){
        $data=[];
        $this->view('sellerAdManage/v_seller_ad_manage',$data);
    }

    public function add_listing(){
        $data=[];
        $this->view('sellerAdManage/v_seller_add_advertisement',$data);
    }


}
?>