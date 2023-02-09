<?php

class forum extends Controller {
    public function __construct(){
        $this-> forum_model =$this->model('M_forum');
    }

    public function forum(){
        $data = [
        ];

        $this->view('inc/forum/v_forum',$data);
    }

}

?>