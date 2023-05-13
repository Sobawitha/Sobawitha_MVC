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


    public function sellerSearchAd(){

        if (isset($_SESSION['user_id']) && $_SESSION['user_flag'] == 3 ){
        $userid = $_SESSION['user_id'];

        $items = $this->seller_purchase_model->get_purchase_list('',$userid);
        if(empty($items)){

            $data=[
                'purchase_list' => $items,
                'search' => "Search by Item name",
                'message' => '', 
                'emptydata' => "NO Items to Show",
            ];
        }
        else{
            $data=[
                'purchase_list' => $items,
                'search' => "Search by Item name",
                'message' => '', 
                'emptydata' => "NO Items to Show",
            ];
        }
        if($_SERVER['REQUEST_METHOD'] == 'GET'){
            $_GET = filter_input_array(INPUT_GET, FILTER_SANITIZE_STRING);

            $search = trim($_GET['search']);

            if(!empty($search)){
                $items = $this->seller_purchase_model->getSearchAds($userid,$search);
                $message = '';

                if(empty($items['items'])){
                    $message = "No Items found on : $search";
                }

                $data=[
                    'purchase_list' => $items['items'],
                    'search' => $search,
                    'message' => $message,
                    'emptydata' => '',
                ];

                $this->view('Seller/seller_purchases/seller_purchases',$data);
            }
        }
        $this->view('Seller/seller_purchases/seller_purchases',$data);
    }

}
}

?>