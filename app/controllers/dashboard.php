<?php

class dashboard extends Controller{

    public function __construct(){
        $this->dashboard_mode = $this->model('M_dashboard');
    }

    public function officer_dashboard(){
        $data = [];
        $this->view('Agri_officer/Dashboard/v_officer_dashboard', $data);
    }

    public function supplier_dashboard(){
        $data = [];
        $this->view('Raw_material_supplier/Dashboard/v_supplier_dashboard', $data);
    }

    public function buyer_dashboard(){
        $data = [];
        $this->view('Buyer/Dashboard/v_buyer_dashboard', $data);
    }

    public function seller_dashboard(){
        $data = [];
        $this->view('Seller/Dashboard/v_seller_dashboard', $data);
    }
}

?>