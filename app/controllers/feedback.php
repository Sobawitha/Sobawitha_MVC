<?php

class feedback extends Controller{

    public function __construct(){
        $this->feedback_model = $this->model('M_feedback');
    }

    public function supplire_feedback(){
        $data = [];
        $this->view('raw_material_supplier/v_feedback', $data);
    }
}

?>