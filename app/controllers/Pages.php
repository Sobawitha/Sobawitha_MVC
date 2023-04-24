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

    public function raw_material_product_page(){
        $data = [];
        $this->view('Users/component/v_raw_material_product_page', $data);
    }
    public function select_user_for_login(){
        $data=[];
        $this->view('Users/component/select_user_for_login', $data);
    }
}

?>