<?php
    class Admin_dashboard extends Controller{
        private $adminDashModel;

        public function __construct(){
            $this->adminDashModel = $this->model('M_Admin_dashboard');
    }
   
   public function main_view(){
        if(isset($_SESSION['user_id']) && $_SESSION['user_flag'] ==1) {
          
        if(isset($_GET['page'])){
            $page = $_GET['page'];
        }
        else{
            $page=1;
        }
        $num_per_page = 9;
        $start_from  = ($page - 1) * $num_per_page;
        $_SESSION['num_per_page'] = $num_per_page;


        $sellers_active= $this->adminDashModel->getTotalSellers();
        $total_suppliers=$this->adminDashModel->getTotalSuppliers();
        $total_agrio = $this->adminDashModel->getTotalAgrio();
        $total_fertilizer_ads =$this->adminDashModel->getTotalFertilizerAds();
        $total_profit=$this->adminDashModel->getTotalProfit();
        $tot_complaints=$this->adminDashModel->getTotalComplaints();
        $forum_post_detail= $this->adminDashModel->get_all_forum_posts($start_from,$num_per_page);

        $data=[
            'sellers_active' => $sellers_active,
            'tot_sups' => $total_suppliers,
            'tot_agris' => $total_agrio,
            'tot_fertilizer_ads' => $total_fertilizer_ads,
            'tot_profit' => $total_profit,
            'tot_complaints' => $tot_complaints,
            'forum_post_detail' => $forum_post_detail
        ];
        
        $this->view('Admin/AdminDash/v_dashmain', $data);

        } else{
            redirect('Login/login');  
        }
    }

    public function fertilizer_ads_linechart() {
        try {
            $post_count_details = $this->adminDashModel->get_fertilizer_ads_count_details();
            
            if ($post_count_details) {
                // Create a response object with a "success" key and a "data" key
                $response = [
                    "success" => true,
                    "data" => $post_count_details
                ];
        
                // Send the response as JSON
                header('Content-Type: application/json');
                echo json_encode($response);
            } else {
                // Return an error response
                $response = [
                    "success" => false,
                    "message" => "Failed to retrieve category detail"
                ];
        
                header('Content-Type: application/json');
                echo json_encode($response);
            }
        } catch (Exception $e) {
            // Log the exception
            error_log($e);
        
            // Return an error response
            $response = [
                "success" => false,
                "message" => "An error occurred while fetching data"
            ];
        
            header('Content-Type: application/json');
            echo json_encode($response);
        }
        
    }
}
?>