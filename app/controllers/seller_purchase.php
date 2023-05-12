<?php

class seller_purchase extends Controller {
    private $seller_purchase_model;
    public function __construct(){
        $this-> seller_purchase_model =$this->model('M_Seller_purchase');
    }

    public function display_all_purchases(){
        $purchases_list = $this->seller_purchase_model->get_purchase_list();
        $data = [
            'purchase_list' => $purchases_list,
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

}

?>