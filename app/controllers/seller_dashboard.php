<?php
    class seller_dashboard extends Controller{
        private $seller_dashboard_model;
        public function __construct(){
            $this->seller_dashboard_model = $this->model('M_seller_dashboard');
    }

    public function seller_dashboard(){

        if(isset($_SESSION['user_id'])){
            if(isset($_GET['page'])){
                $page = $_GET['page'];
            }
            else{
                $page=1;
            }
            $num_per_page = 9;
            $start_from  = ($page - 1) * $num_per_page;
            $_SESSION['num_per_page'] = $num_per_page;
            $tot_income = $this->seller_dashboard_model->calculate_total($_SESSION['user_id'])->total_income;
            $no_of_complaint = $this->seller_dashboard_model->get_no_of_complaints($_SESSION['user_id'])->num_complaint;
            $no_of_ongoing_order = $this->seller_dashboard_model->get_no_of_ongoing_order($_SESSION['user_id'])->ongoing_orders;
            $no_of_complete_order = $this->seller_dashboard_model->get_no_of_complete_order($_SESSION['user_id'])->complete_orders;
            $stock_details = $this->seller_dashboard_model->get_stock_details($start_from , $num_per_page);
            $no_of_orders = $this->seller_dashboard_model->get_no_of_products()->no_of_products;
            $data = [
                'tot_income' => $tot_income,
                'no_of_complaint' => $no_of_complaint,
                'ongoing_order' => $no_of_ongoing_order,
                'complete_order' => $no_of_complete_order,
                'stock_details' => $stock_details,
                'no_of_products' => $no_of_orders
            ];
            $this->view('Seller/Dashboard/v_seller_dashboard', $data);
            unset($_SESSION['num_per_page']);
    }
    else{
        redirect("Login/login");
    }
    }

    public function order_status_donut_chart() {
        $order_detail = $this->seller_dashboard_model->get_order_detail();
    
        if ($order_detail) {
            // Create a response object with a "success" key and a "data" key
            $response = [
                "success" => true,
                "data" => $order_detail
            ];
    
            // Send the response as JSON
            header('Content-Type: application/json');
            echo json_encode($response);
        } else {
            // Return an error response
            $response = [
                "success" => false,
                "message" => "Failed to retrieve order details"
            ];
    
            header('Content-Type: application/json');
            echo json_encode($response);
        }
    }


    public function income_linechart() {
        try {
            $income_details = $this->seller_dashboard_model->get_monthly_income_details();
        
            if ($income_details) {
                // Create a response object with a "success" key and a "data" key
                $response = [
                    "success" => true,
                    "data" => $income_details
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