<?php
    class seller_wishlist extends Controller{

        public function __construct(){
            $this->seller_wishlist_model = $this->model('M_seller_wishlist');
            $this->notification_model = $this->model('M_notifications');
        }

        public function view_wishlist(){
            $seller_wishlist = $this->seller_wishlist_model->getItems();
            $no_of_notifications = $this->notification_model->find_notification_count()->total_count;
            $notifications = $this->notification_model->notifications();

            $data=[
                'seller_wishlist' => $seller_wishlist,
                'no_of_notifications' =>$no_of_notifications,
                'notifications' => $notifications
            ];

            $this->view('seller/seller_wishlist/v_seller_wishlist',$data);
        }

        public function remove_wishlist_item(){
            
            $this->seller_wishlist_model->removeItem();

            redirect("seller_wishlist/view_wishlist");
        }
    }

?>