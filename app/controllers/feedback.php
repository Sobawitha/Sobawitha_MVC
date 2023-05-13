<?php

class feedback extends Controller{

    public function __construct(){
        $this->feedback_model = $this->model('M_feedback');
        $this->notification_model = $this->model('M_notifications');
    }

    public function supplire_feedback(){
        $no_of_notifications = $this->notification_model->find_notification_count()->total_count;
        $notifications = $this->notification_model->notifications();
        $data = [
            'no_of_notifications' =>$no_of_notifications,
            'notifications' => $notifications
        ];
        $this->view('Raw_material_supplier/supplier_feedback/v_feedback', $data);
    }

    public function seller_feedback(){
        $no_of_notifications = $this->notification_model->find_notification_count()->total_count;
        $notifications = $this->notification_model->notifications();
        $data = [
            'no_of_notifications' =>$no_of_notifications,
            'notifications' => $notifications
        ];
        $this->view('Seller/seller_feedback/v_feedback', $data);
    }
}

?>