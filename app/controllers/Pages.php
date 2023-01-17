<?php

class pages extends Controller {
    public function __construct(){
        $this-> pagesModel =$this->model('M_Pages');
    }

    //redirect home
    public function home(){
        $data = [];
        $this->view('inc/home', $data);
    }
}

?>