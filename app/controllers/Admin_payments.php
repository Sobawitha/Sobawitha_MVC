<?php
    class Admin_payments extends Controller{
        private $adminPaymentModel;
        public function __construct(){
            $this->adminPaymentModel = $this->model('M_Admin_payments');
    }

    public function view_payments(){
        if(isset($_SESSION['user_id']) && $_SESSION['user_flag'] ==1){ 
            $payments = $this->adminPaymentModel->getPaymentDetails();
           
            $data=[
            'payments' =>  $payments
            ];
        
            $this->view('Admin/AdminPayments/v_admin_payment', $data);
      
        }else{
            redirect('Login/login');  
        }

    }
}