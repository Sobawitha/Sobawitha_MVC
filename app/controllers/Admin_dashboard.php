<?php
    class Admin_dashboard extends Controller{
        private $adminDashModel;

        public function __construct(){
            $this->adminDashModel = $this->model('M_Admin_dashboard');
    }
   
   public function main_view(){
        if(isset($_SESSION['user_id']) && $_SESSION['user_flag'] ==1) {
        $sellers_active= $this->adminDashModel->getTotalSellers();
        $total_suppliers=$this->adminDashModel->getTotalSuppliers();
        $total_agrio = $this->adminDashModel->getTotalAgrio();
        $total_fertilizer_ads =$this->adminDashModel->getTotalFertilizerAds();
        $total_profit=$this->adminDashModel->getTotalProfit();
        $tot_complaints=$this->adminDashModel->getTotalComplaints();

        $data=[
            'sellers_active' => $sellers_active,
            'tot_sups' => $total_suppliers,
            'tot_agris' => $total_agrio,
            'tot_fertilizer_ads' => $total_fertilizer_ads,
            'tot_profit' => $total_profit,
            'tot_complaints' => $tot_complaints
        ];
        
        $this->view('Admin/AdminDash/v_dashmain', $data);

        } else{
            redirect('Login/login');  
        }

       
    
    
   }
}
?>