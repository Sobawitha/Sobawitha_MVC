<?php

class feedback extends Controller{

    public function __construct(){
        $this->feedback_model = $this->model('M_feedback');
    }

    public function supplire_feedback(){
        $data = [];
        $this->view('Raw_material_supplier/supplier_feedback/v_feedback', $data);
    }

    public function seller_feedback(){
        $data = [];
        $this->view('Seller/seller_feedback/v_feedback', $data);
    }
}

?>