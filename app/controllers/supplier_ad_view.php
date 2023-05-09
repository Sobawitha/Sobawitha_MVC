<?php
    class supplier_ad_view extends Controller{

        private $supplier_ad;
        private $raw_material_product;
        public function __construct(){
            $this->supplier_ad = $this->model('M_supplier_view');
            $this->raw_material_product = $this->model('M_seller_wishlist');
    }


    public function index() {
        $ads = $this->supplier_ad->getPostsView();
        $user_realated_wishlist_items= $this->raw_material_product->get_all_wishlist_items();
    
        $data = [
            'ads' => $ads,
            'seller_wishlist' => $user_realated_wishlist_items,
        ];
    
        $this->view('Raw_material_supplier/supplier_ad_management/supplier_view_advertisement', $data);
    }
    
    
    public function indexmore() {
        $productId = $_GET['product_id'];
        $ad = $this->supplier_ad->getPostById($productId);
        $type = $ad->type;
        $id=$_SESSION['user_id'];
        $no_of_cart_item = $this->supplier_ad->check_cart($id)->count_item;

            $data = [
                'adcontent' => $ad,
                'no_of_cart_item' => $no_of_cart_item,

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

    
    /*ok */
    function add_to_cart_from_individual_page(){
        $quantity =2; /*change */
        $product_id = $_GET['product_id'];
        $user_id = $_SESSION['user_id'];

        /*add to cart */
        $current_status = $this->supplier_ad->check_similer_item($product_id,$user_id)->count_row;
        $data = [
          'product_id' => $_GET['product_id'],
          'quantity' => $quantity,
          'user_id' => $_SESSION['user_id'],
        ];

        if($current_status>0){
            $this->supplier_ad->update_cart($data);
            redirect('cart/view_cart?product_id='.$product_id);
        }
        else{
            $this->supplier_ad->add_to_cart($data);
            redirect('cart/view_cart?product_id='.$product_id);
        }
     }

     /*for single item buy ok*/
     function complete_order(){
        $quantity =1;  /*change */
        $product_id = $_GET['product_id'];
        $price = $this->supplier_ad->find_price_from_id($product_id)->product_price;
        $data = [
          'product_id' => $_GET['product_id'],
          'quantity' => $quantity,
          'user_id' => $_SESSION['user_id'],
        ];
      
        // Insert data into the database
        $this->supplier_ad->insert_order_product_table($data);
        $order_id = $this->supplier_ad->select_last_raw_id()->raw_id;
        $this->supplier_ad->insert_order_table($data, $order_id);
        $this->supplier_ad->update_raw_material_count($product_id, $quantity);
        $order_id = $this->supplier_ad->find_order_id()->order_id;
        $tot_bill = $price * $quantity;
        $user_detail = $this->supplier_ad->get_user_detail();
        $data_for_payment =[
            'user_detail' => $user_detail,
            'tot_bill' => $tot_bill,
            'order_id' => $order_id
        ];
        $this->view('Users/component/cod_order',$data_for_payment);
      }


     function add_to_cart(){
        $quantity =1; /*change */
        $product_id = $_GET['product_id'];
        $data = [
          'product_id' => $_GET['product_id'],
          'quantity' => $quantity,
          'user_id' => $_SESSION['user_id'],
        ];
        if($this->supplier_ad->add_to_cart($data)){
            redirect('fertilizer_product/view_individual_product?product_id='.$product_id);
        }

     }


     public function load_cash_on_deliver_page(){
        $product_id = $_GET['product_id'];
        $order_id = $this->supplier_ad->find_order_id()->order_id;
        $quantity = 4; /*change */
        $price = $this->supplier_ad->find_price_from_id($product_id)->product_price;
        $tot_bill = $price * $quantity;
        $user_detail = $this->supplier_ad->get_user_detail();
        $data =[
            'user_detail' => $user_detail,
            'tot_bill' => $tot_bill,
            'order_id' => $order_id
        ];
        $this->view('Users/component/cod_order',$data);
     }


     public function confirm_payment(){
        $product_id = $_GET['product_id'];
        $order_id = $this->supplier_ad->find_order_id()->order_id;
        $this->supplier_ad->update_cache_on_delivery_table($order_id);
        $this->supplier_ad->update_order_state($order_id);
        redirect('supplier_ad_view/load_cash_on_deliver_page?product_id='.$product_id); /*load buyer view purchses */
     }
















      /*fertilizer_order_list for Naveendra*/
      function view_orders(){
        $order_list = $this-> raw_material_product -> list_order_deatils($_SESSION['user_id']);
        $data =[
            'order_list' => $order_list,
        ];

        $this->view('Seller/Seller_order/v_seller_order_list',$data);

      }

      



     





    }
    ?>