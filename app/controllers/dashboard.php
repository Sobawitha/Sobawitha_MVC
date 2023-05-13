<?php

class dashboard extends Controller{
    private $dashboard_model;
    private $notification_model;

    public function __construct(){
        
        $this->dashboard_model = $this->model('M_dashboard');
        $this->buyer_model = $this->model('M_buyer');
        $this->notification_model = $this->model('M_notifications');
    }

    public function dashboard(){
        if($_SESSION['user_flag'] == 1){
            redirect('dashboard/Admin_dashboard');
        }                                                
        else if($_SESSION['user_flag'] == 3){
            redirect('dashboard/seller_dashboard');
        }
        else if($_SESSION['user_flag'] == 2){
            redirect('dashboard/buyer_dashboard');
        }
        else if($_SESSION['user_flag'] == 4){
            redirect('dashboard/supplier_dashboard');
        }
        else if($_SESSION['user_flag'] == 5){
            redirect('dashboard/officer_dashboard');
        }
        
    }

    // officer-dashboard
    public function officer_dashboard(){
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

        $no_of_blogpost = $this->dashboard_model->get_no_of_blogposts($_SESSION['user_id']);
        $no_of_post_category = $this-> dashboard_model->get_no_of_category();
        $no_of_forumpost = $this->dashboard_model->get_no_of_forumtopics($_SESSION['user_id']);
        $no_of_complaints = $this->dashboard_model->get_no_of_complaints($_SESSION['user_id']);
        $forum_post_detail= $this->dashboard_model->get_all_forum_posts($_SESSION['user_id'],$start_from,$num_per_page);
        $post_count_details = $this->dashboard_model->get_blogpost_count_details();
        $no_of_notifications = $this->notification_model->find_notification_count()->total_count;
        $notifications = $this->notification_model->notifications();

        // var_dump($post_count_details);
        // die();
        
        
        $data = [
            'no_of_blogposts' => $no_of_blogpost->num_posts,
            'no_of_forumposts' => $no_of_forumpost->num_forum_topics,
            'no_of_complaints' => $no_of_complaints->num_complaint,
            'no_of_category' => $no_of_post_category-> num_category,
            'forum_post_detail' => $forum_post_detail,
            'no_of_notifications' =>$no_of_notifications,
            'notifications' => $notifications
        ];
        $this->view('Agri_officer/Dashboard/v_officer_dashboard', $data);
    }
    else{
        redirect('Login/login');
    }
    }

    public function category_donut_chart() {
        $post_category_detail = $this->dashboard_model->get_category_detail();
    
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


    public function blog_posts_linechart() {
        try {
            $post_count_details = $this->dashboard_model->get_blogpost_count_details();
        
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


    public function complaint_bar_chart() {
        try {
            $complaint_count_details = $this->dashboard_model->get_complaint_count_details();
        
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
    

    

    //for buyre dashbloard

    public function buyer_dashboard(){
        $no_of_notifications = $this->notification_model->find_notification_count()->total_count;
        $notifications = $this->notification_model->notifications();
        $total = $this->buyer_model->getTotalPurchases();;
        $totReviews = $this->buyer_model->getTotalReviews();
        $data = [
            'no_of_notifications' => $no_of_notifications,
            'notifications' => $notifications,
            'purchases_count' => $total,
            'review_count' => $totReviews
        ];
        $this->view('Buyer/Dashboard/v_buyer_dashboard', $data);
    }

    
}

?>