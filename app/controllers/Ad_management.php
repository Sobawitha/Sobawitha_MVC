<?php
    class seller_ad_management extends Controller{
        public function __construct(){
            $this->seller_ad_management_model = $this->model('M_seller_ad_management');
            $this->notification_model = $this->model('M_notifications');
    }

    public function View_listing(){
        $pending_fertilizer_advertisments = $this->seller_ad_management_model->display_pending_advertisement();
        $no_of_notifications = $this->notification_model->find_notification_count()->total_count;
        $notifications = $this->notification_model->notifications();
        $data = [
            'pending_advertisements'=> $pending_fertilizer_advertisments,
            'no_of_notifications' =>$no_of_notifications,
            'notifications' => $notifications
        ];
        $this->view('Seller/Seller_add_management/v_seller_add_manage', $data);
    }

    public function add_listing(){
        
        $no_of_notifications = $this->notification_model->find_notification_count()->total_count;
        $notifications = $this->notification_model->notifications();
        if($_SERVER['REQUEST_METHOD'] == 'POST'){

            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $userid = $_SESSION['user_id'];
            

            $data = [

                'product_name' => trim($_POST['product_name']),
                'category' => trim($_POST['category']),
                'certificate_no' => trim($_POST['certificate_no']),
                'manufacturer' => trim($_POST['manufacturer']),
                'description' => trim($_POST['description']),
                'price' => trim($_POST['price']),
                'quantity' => trim($_POST['quantity']),
                // 'location' => trim($_POST['location']),
                'current_status' => 1,
                'created_by' => $userid,
                'no_of_notifications' =>$no_of_notifications,
                'notifications' => $notifications

            ];

            if ($this->seller_ad_management_model->add_fertilizer_advertisment($data)) {
                redirect('seller_ad_management/View_listing');
            }
        }

        else{
            $data= [
                'no_of_notifications' =>$no_of_notifications,
                'notifications' => $notifications
            ];
            $this->view('Seller/Seller_add_management/v_seller_add_advertisment', $data);
        }

    }

    public function delete_advertisment(){
        if($_SERVER["REQUEST_METHOD"]== 'POST'){
            $advertisementid = trim($_POST['deleteadvertisment']);
            $this->seller_ad_management_model->delete_advertisment($advertisementid);
        }

        redirect('seller_ad_management/View_listing');
    }
    


}
?>