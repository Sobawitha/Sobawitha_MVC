<?php
    class seller_feedback extends Controller{
        public function __construct(){
            $this->userModel = $this->model('M_seller_feedback');
    }

    public function view_feed(){
        $data=[];
        $this->view('sellerFeed/v_seller_feedback',$data);
    }
}
?>