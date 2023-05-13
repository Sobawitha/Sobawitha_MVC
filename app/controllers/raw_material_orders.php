<?php

class raw_material_orders extends Controller
{

    private $raw_material_orders_model;
    

    public function __construct(){
        $this-> raw_material_orders_model =$this->model('M_raw_material_orders');
        $this->notification_model = $this->model('M_notifications');
    }

    public function view_cart(){
        $cart_item = $this->raw_material_orders_model->view_cart();
        $no_of_notifications = $this->notification_model->find_notification_count()->total_count;
        $notifications = $this->notification_model->notifications();
        $data = [
            'cart_items' => $cart_item,
            'no_of_notifications' =>$no_of_notifications,
            'notifications' => $notifications
        ];
        $this->view('Seller/shopping_cart/v_shopping_cart',$data);
    }

    
   

}
