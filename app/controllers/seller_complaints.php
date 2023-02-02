<?php
    class seller_complaints extends Controller{
        public function __construct(){
            $this->userModel = $this->model('M_seller_complaints');
    }

    public function view_complaints(){
        $data=[];
        $this->view('sellerComplaints/v_seller_complaints',$data);
    }

    public function view_contact_us(){
        $data=[];
        $this->view('sellerComplaints/v_seller_contact_us',$data);
    }
}
?>