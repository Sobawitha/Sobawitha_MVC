<?php
    class seller_payment extends Controller{
        public function __construct(){
            $this->userModel = $this->model('M_seller_payment');
    }

    public function view_payment(){
        $data=[];
        $this->view('sellerpayment/v_seller_payment',$data);
    }
}
?>+
