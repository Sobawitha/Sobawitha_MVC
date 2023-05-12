<?php

class seller_purchase extends Controller {
    private $seller_purchase_model;
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

}

?>