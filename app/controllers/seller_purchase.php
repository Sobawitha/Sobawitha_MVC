<?php

class seller_purchase extends Controller {
    private $seller_purchase_model, $notification_model;
    public function __construct(){
        $this-> seller_purchase_model =$this->model('M_Seller_purchase');
        $this->notification_model = $this->model('M_notifications');
    }

    public function display_all_purchases(){
        $purchases_list = $this->seller_purchase_model->get_purchase_list();
        $no_of_notifications = $this->notification_model->find_notification_count()->total_count;
        $notifications = $this->notification_model->notifications();
        
        $data = [
            'purchase_list' => $purchases_list,
            'no_of_notifications' =>$no_of_notifications,
            'notifications' => $notifications
        ];
        $this->view('Seller/seller_purchases/seller_purchases',$data);
    }

    public function review_product(){
        if(isset($_SESSION['user_id']) && $_SESSION['user_flag'] ==3){ 
            if($_SERVER['REQUEST_METHOD']=='POST'){
                $_POST=filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
                
                $orderId = trim($_POST['order_id']);
                $receiverDetail = $this->seller_purchase_model->get_feedback_receiver($orderId);
                $this->seller_purchase_model->update_review_status($orderId);
                 
                // echo $receiverDetail->user_id; die();
                $data=[
                    'rating' => trim($_POST['selected_stars']),
                    'review' => trim($_POST['rating_comment']),
                    'visible_state' => trim($_POST['rating_user']),
                    'receiver_id' => $receiverDetail->user_id

                ];

                $this->seller_purchase_model->insert_feedback($data);
                redirect('seller_purchase/display_all_purchases');
            }
        }else{
            redirect('Login/login');
        }
    
    }


    public function sellerSearchAd(){

        if (isset($_SESSION['user_id']) && $_SESSION['user_flag'] == 3 ){
        $userid = $_SESSION['user_id'];
        $no_of_notifications = $this->notification_model->find_notification_count()->total_count;
        $notifications = $this->notification_model->notifications();

        $items = $this->seller_purchase_model->get_purchase_list('',$userid);
        if(empty($items)){

            $data=[
                'purchase_list' => $items,
                'search' => "Search by Item name",
                'message' => '', 
                'emptydata' => "NO Items to Show",
                'no_of_notifications' =>$no_of_notifications,
                'notifications' => $notifications
            ];
        }
        else{
            $data=[
                'purchase_list' => $items,
                'search' => "Search by Item name",
                'message' => '', 
                'emptydata' => "NO Items to Show",
                'no_of_notifications' =>$no_of_notifications,
                'notifications' => $notifications
            ];
        }
        if($_SERVER['REQUEST_METHOD'] == 'GET'){
            $_GET = filter_input_array(INPUT_GET, FILTER_SANITIZE_STRING);

            $search = trim($_GET['search']);

            if(!empty($search)){
                $items = $this->seller_purchase_model->getSearchAds($userid,$search);
                $message = '';

                if(empty($items['items'])){
                    $message = "No Items found on : $search";
                }

                $data=[
                    'purchase_list' => $items['items'],
                    'search' => $search,
                    'message' => $message,
                    'emptydata' => '',
                    'no_of_notifications' =>$no_of_notifications,
                    'notifications' => $notifications
                ];

                $this->view('Seller/seller_purchases/seller_purchases',$data);
            }
        }
        $this->view('Seller/seller_purchases/seller_purchases',$data);
    }

}
}

?>