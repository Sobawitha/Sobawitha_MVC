<?php
    class supplier_ad_view extends Controller{

        private $supplier_ad;
        private $raw_material_product;
        public function __construct(){
            $this->supplier_ad = $this->model('M_supplier_view');
            $this->raw_material_product = $this->model('M_seller_wishlist');
            $this->notification_model = $this->model('M_notifications');
    }


    public function index() {
        $ads = $this->supplier_ad->getPostsView();
        $user_realated_wishlist_items= $this->raw_material_product->get_all_wishlist_items();
        $no_of_notifications = $this->notification_model->find_notification_count()->total_count;
        $notifications = $this->notification_model->notifications();
    
        $data = [
            'ads' => $ads,
            'seller_wishlist' => $user_realated_wishlist_items,
            'no_of_notifications' =>$no_of_notifications,
            'notifications' => $notifications
        ];
    
        $this->view('Raw_material_supplier/supplier_ad_management/supplier_view_advertisement', $data);
    }
    
    
    public function indexmore() {
        $productId = $_GET['product_id'];
        $wishlist_status = $this-> supplier_ad -> is_in_wishlist($productId)->row_count;
        $ad = $this->supplier_ad->getPostById($productId);
        $content = $this->supplier_ad->view_individual_product($productId);
        $type = $ad->type;
        $id=$_SESSION['user_id'];
        $no_of_cart_item = $this->supplier_ad->check_cart($id)->count_item;
        $no_of_notifications = $this->notification_model->find_notification_count()->total_count;
        $notifications = $this->notification_model->notifications();

            $data = [
                'adcontent' => $ad,
                'no_of_cart_item' => $no_of_cart_item,
                'wishlist_status' => $wishlist_status,
                'no_of_notifications' =>$no_of_notifications,
                'notifications' => $notifications,
                'feed' => $content,

            ];

            $this->view('Raw_material_supplier/supplier_ad_management/supplier_view_more_advertisement', $data);
    }



    /*add and remove from wish list*/
    public function add_to_wishlist(){
        $rm_product_id = $_GET['product_id'];
        $this->raw_material_product-> add_to_wishlist($rm_product_id);
        redirect('supplier_ad_view/index');
    }

    public function remove_wishlist(){
        $this->raw_material_product-> removeItem();
        redirect('supplier_ad_view/index');
    }

     /*add and remove from wish list from individual page*/
     public function add_to_wishlist_from_individual_page(){
        $rm_product_id = $_GET['product_id'];
        $this->raw_material_product-> add_to_wishlist($rm_product_id);
        redirect('supplier_ad_view/indexmore?product_id=' .$rm_product_id);
    }

    public function remove_wishlist_from_individual_page(){
        $rm_product_id = $_GET['product_id'];
        $this->raw_material_product-> removeItem();
        redirect('supplier_ad_view/indexmore?product_id='.$rm_product_id);
    }

    
    /*ok */
    function add_to_cart_from_individual_page(){
        $quantity =$_POST['quantity']; /*change */
        $product_id = $_GET['product_id'];
        $user_id = $_SESSION['user_id'];

        /*add to cart */
        $current_status = $this->supplier_ad->check_similer_item($product_id,$user_id)->count_row;
        $is_in_wishlist = $this-> supplier_ad -> is_in_wishlist($product_id) -> row_count;

        // echo $is_in_wishlist;
        // die();
        $data = [
          'product_id' => $_GET['product_id'],
          'quantity' => $quantity,
          'user_id' => $_SESSION['user_id'],
        ];

        if($current_status>0){ 
            if($is_in_wishlist>0){
                $this->raw_material_product->removeItem();
                $this->supplier_ad->update_cart($data);
                redirect('raw_material_orders/view_cart?product_id='.$product_id);
            }
            else{
                $this->supplier_ad->update_cart($data);
            redirect('raw_material_orders/view_cart?product_id='.$product_id);
            }
        }
        else{
            
            if($is_in_wishlist>0){
                $this->supplier_ad->add_to_cart($data);
                $this->raw_material_product->removeItem();
                redirect('raw_material_orders/view_cart?product_id='.$product_id);
            }
            else{
                $this->supplier_ad->add_to_cart($data);
                redirect('raw_material_orders/view_cart?product_id='.$product_id); 
            }    
        }
     }

     function update_cart_item_quantities(){
        $quantity =$_POST['quantity']; /*change */
        $product_id = $_GET['product_id'];
        $user_id = $_SESSION['user_id'];

        /*add to cart */

        $data = [
          'product_id' => $_GET['product_id'],
          'quantity' => $quantity,
          'user_id' => $_SESSION['user_id'],
        ];

        $this->supplier_ad->update_cart($data);
        redirect('raw_material_orders/view_cart?product_id='.$product_id);
     }

     function remove_from_cart(){
        $product_id = $_GET['product_id'];
        $quantity = $_GET['quantity'] ;
        $this->supplier_ad->re_update_raw_material_count($product_id, $quantity);
        $data = [
            'product_id' => $_GET['product_id'],
            'user_id' => $_SESSION['user_id'],
          ];
        if($this->supplier_ad->remove_from_cart($data)){
            redirect('raw_material_orders/view_cart');
        }
     }

    }
    ?>