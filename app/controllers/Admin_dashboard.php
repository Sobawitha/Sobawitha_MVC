<?php
    class Admin_dashboard extends Controller{
        private $adminDashModel;

        public function __construct(){
            $this->adminDashModel = $this->model('M_Admin_dashboard');
            $this->notification_model = $this->model('M_notifications');
    }
   
   public function main_view(){
        if(isset($_SESSION['user_id']) && $_SESSION['user_flag'] ==1) {
          
        if(isset($_GET['page'])){
            $page = $_GET['page'];
        }
        else{
            $page=1;
        }
        $num_per_page = 10;
        $start_from  = ($page - 1) * $num_per_page;
        $_SESSION['num_per_page'] = $num_per_page;


        $sellers_active= $this->adminDashModel->getTotalSellers();
        $total_suppliers=$this->adminDashModel->getTotalSuppliers();
        $total_agrio = $this->adminDashModel->getTotalAgrio();
        $total_fertilizer_ads =$this->adminDashModel->getTotalFertilizerAds();
        $total_raw_material_ads =$this->adminDashModel->getTotalRawAds();
        $total_profit=$this->adminDashModel->getTotalProfit();
        $tot_complaints=$this->adminDashModel->getTotalComplaints();
        $forum_post_detail= $this->adminDashModel->get_all_forum_posts($start_from,$num_per_page);
        $total_row_count_forum_post = $this->adminDashModel->get_total_row_count_forum();
        $top_rated_sellers = $this->adminDashModel->get_top_sellers();
        $tot_forum_posts =  $this->adminDashModel->get_tot_forum_posts();
        $no_of_notifications = $this->notification_model->find_notification_count()->total_count;
        $notifications = $this->notification_model->notifications();

        $data=[
            'sellers_active' => $sellers_active,
            'tot_sups' => $total_suppliers,
            'tot_agris' => $total_agrio,
            'tot_fertilizer_ads' => $total_fertilizer_ads,
            'tot_raw_ads' => $total_raw_material_ads,
            'tot_profit' => $total_profit,
            'tot_complaints' => $tot_complaints,
            'forum_post_detail' => $forum_post_detail,
            'forum_total_rows' => $total_row_count_forum_post,
            'top_rated_sellers' => $top_rated_sellers,
            'tot_forum_posts' => $tot_forum_posts,
            'no_of_notifications' =>$no_of_notifications,
            'notifications' => $notifications,
        ];
        
        $this->view('Admin/AdminDash/v_dashmain', $data);

        } else{
            redirect('Login/login');  
        }
    }

    public function fertilizer_ads_linechart() {
        try {
            $post_count_details = $this->adminDashModel->get_fertilizer_ads_count_details();
            $ad_count_details = $this->adminDashModel->get_raw_material_ads_count_details();
            
            
            if ($post_count_details || $ad_count_details ) {
                // Create a response object with a "success" key and a "data" key
                $response = [
                    "success" => true,
                    "data" => $post_count_details,
                    "dataTwo" => $ad_count_details
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

    public function complaint_bar_chart() {
        try {
            $complaint_count_details = $this->adminDashModel->get_complaint_count_details();
        
            if ($complaint_count_details) {
                // Create a response object with a "success" key and a "data" key
                $response = [
                    "success" => true,
                    "data" => $complaint_count_details
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

    public function type_donut_chart() {
        $post_category_detail = $this->adminDashModel->get_user_detail();
    
        if ($post_category_detail) {
            // Create a response object with a "success" key and a "data" key
            $response = [
                "success" => true,
                "data" => $post_category_detail
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
    }

  
}
?>