<?php
    class seller_dashboard extends Controller{
        public function __construct(){
            $this->userModel = $this->model('M_seller_dashboard');
    }

    public function view_dash(){
        $data=[];
        $this->view('sellerDash/v_seller_dashboard',$data);
    }
}
?>