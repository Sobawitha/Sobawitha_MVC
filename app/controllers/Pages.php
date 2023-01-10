<?php

class Pages extends Controller{
    public function __construct(){
        $this -> pagesModel = $this ->model('M_Pages');
    }
        public function home(){
            $data = [];
            $this ->view('inc/home',$data);
        }
    
}
?>