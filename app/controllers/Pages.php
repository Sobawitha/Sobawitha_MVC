<?php

class Pages extends Controller {

    private $pagesModel;
    private $fertilizerModel;

    public function __construct(){
        $this->pagesModel = $this->model('M_Pages');
        $this->fertilizerModel = $this->model('M_ad_management');
        
       
    }
  
    //redirect home
    public function home(){
         
        $data['products'] = $this->fertilizerModel->display_pending_advertisement();
        $this->view('Users/component/home', $data);
    }

    public function individual_item(){
        $data = [];
        $this->view('Users/component/individual_item', $data);
    }

    public function product_page(){
        $data = [];
        $this->view('Users/component/v_product_page', $data);
    }

    public function select_user_for_login(){
        $data=[];
        $this->view('Users/component/select_user_for_login', $data);
    }
}

?>