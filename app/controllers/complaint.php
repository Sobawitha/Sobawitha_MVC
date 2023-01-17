<?php

class complaint extends Controller
{
    public function __construct()
    {
        $this->contact_model = $this->model('M_complaint');
    }

    public function complaint(){
        $data = [];
        $this->view('inc/complaint/v_complaint', $data);
    }

    public function contact_us(){
        $data = [];
        $this->view('inc/complaint/v_contact_us', $data);
    }


    
}


?>
