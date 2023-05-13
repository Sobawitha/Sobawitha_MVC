<?php

class order extends Controller {
    public function __construct(){
        $this-> order_model =$this->model('M_order');
        $this->notification_model = $this->model('M_notifications');
    }

    public function supplier_order_list(){
        $no_of_notifications = $this->notification_model->find_notification_count()->total_count;
        $notifications = $this->notification_model->notifications();
        $data = [
            'no_of_notifications' =>$no_of_notifications,
            'notifications' => $notifications
        ];

        $this->view('Raw_material_supplier/Supplier_order_list/v_order_list',$data);
    }

    /** remove */
    public function view_cart(){
        $no_of_notifications = $this->notification_model->find_notification_count()->total_count;
        $notifications = $this->notification_model->notifications();
        $data = [
            'no_of_notifications' =>$no_of_notifications,
            'notifications' => $notifications
        ];

        $this->view('Buyer/shopping_cart/v_shopping_cart',$data);
    }

}

?>