<?php
    class seller_wishlist extends controller{

        public function __construct(){
            $this->seller_wishlist_model = $this->model('M_seller_wishlist');
        }

        public function view_wishlist(){
            $seller_wishlist = $this->seller_wishlist_model->getItems();

            $data=['seller_wishlist' => $seller_wishlist];

            $this->view('seller/seller_wishlist/v_seller_wishlist',$data);
        }

        public function remove_wishlist_item(){
            // echo "come";
            // die();

            $this->seller_wishlist_model->removeItem();

            redirect("seller_wishlist/view_wishlist");
        }
    }

?>