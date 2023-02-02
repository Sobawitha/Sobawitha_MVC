<?php

class Pages extends Controller {
    public function __construct(){
        $this-> pagesModel =$this->model('M_Pages');
    }

    //redirect home
    public function home(){
        $data = [];
        $this->view('inc/home', $data);
    }

    public function individual_item(){
        $data = [];
        $this->view('inc/individual_item', $data);
    }
}

?>