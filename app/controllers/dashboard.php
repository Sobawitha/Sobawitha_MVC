<?php

class dashboard extends Controller{

    public function __construct(){
        $this->dashboard_mode = $this->model('M_dashboard');
    }

    public function dashboard(){
        $data = [];
        $this->view('inc/dashboards/v_officer_dashboard', $data);
    }

    public function supplier_dashboard(){
        $data = [];
        $this->view('inc/dashboards/v_supplier_dashboard', $data);
    }
}

?>