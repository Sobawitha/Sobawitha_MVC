<?php

class Pages extends Controller {
    private $pagesModel, $supplierModel, $cartModel, $fertilizerModel, $filterModel, $wishlistModel;
    public function __construct(){
        $this-> pagesModel =$this->model('M_Pages');
        $this->supplierModel  = $this->model('M_Supplier');
        $this->cartModel = $this->model('M_shopping_cart');
        $this->fertilizerModel = $this->model('M_ad_management');
        $this->filterModel = $this->model('M_seller_ad_management');
        $this->wishlistModel = $this->model('M_wishlist');
      
    }

    //redirect home
    public function home(){
        $listings= $this->pagesModel->getLatestListings();
        // $user_id = $listings->user_id;
        // $latest_listing_feedbacks = $this->pagesModel->get_feedback_details($user_id);
        $allAds= $this->pagesModel->getAllListings();
        
        // $all_ads_feed = $this->pagesModel->get_feedback_details($user_id);
        $wishlist_items = $this->wishlistModel->getAllItems();
        $data = [
          'ads' => $listings,
          'allads' => $allAds,
           'wishlist_items' => $wishlist_items,
        ];
        $this->view('Users/component/home', $data);
    }

    public function product_page(){
        $data = [];
        $data['products'] = $this->filterModel->get_all_fertilizer_details();
        $data['manufacturers'] = $this->filterModel->get_manufacturer_names();
        $data['provinces'] = SriLanka::getProvinces();
      
        $data['wishlist_items'] =  $this->wishlistModel->getAllItems();
        $this->view('Users/component/v_product_page', $data);
    }

    public function raw_material_product_page(){
        $data = [];
        $this->view('Users/component/v_raw_material_product_page', $data);
    }
    public function select_user_for_login(){
        $data=[];
        $this->view('Users/component/select_user_for_login', $data);
    }

     public function view_more(){

         $query = "SELECT DISTINCT manufacturer from fertilizer";
         $result = $this->filterModel->customized_query($query);
         echo  json_encode($result);


    }
    public function orderpage(){                                        
        $data = array(
            'cart' => $this->cartModel->getAllItems(),
            'user' => $this->pagesModel->get_user_details()
        );
        $this->view('Users/component/COD', $data);
    }


    public function orderpageproducts()
    {
     

        


    }
}

?>


<?php

