<?php
    class seller_payment extends Controller{
        public function __construct(){
            $this->seller_payment_model = $this->model('M_seller_payment');
    }

    public function view_payment(){
        $data=[];
        $this->view('seller/seller_payments/seller_payments',$data);
    }
}
?>
