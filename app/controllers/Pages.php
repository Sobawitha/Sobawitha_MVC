<?php

class Pages extends Controller {
    public function __construct(){
        $this-> pagesModel =$this->model('M_Pages');
    }

    //redirect home
    public function home(){
        $data = [];
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
}

?>