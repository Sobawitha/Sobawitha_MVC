<?php
    class Admin_payments extends Controller{
        public function __construct(){
            $this->userModel = $this->model('M_Admin_payments');
    }

    public function view_payments(){
        $data=[
            'title' => 'Sobawitha'
        ];
        $this->view('AdminPayments/v_admin_payments', $data);
      
       }


}