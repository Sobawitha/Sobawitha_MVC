<?php

class Pages extends Controller {
    public function __construct(){
        $this-> pagesModel =$this->model('M_Pages');
        $this->supplierModel  = $this->model('M_Supplier');
        $this->cartModel = $this->model('M_shopping_cart');
        $this->fertilizerModel = $this->model('M_ad_management');
        $this->filterModel = $this->model('M_seller_ad_management');
      
    }

    //redirect home
    public function home(){
         
        $data['products'] = $this->fertilizerModel->display_pending_advertisement();
        $this->view('Users/component/home', $data);
    }

    public function orderpage(){                                        
        $data = array(
            'cart' => $this->cartModel->getAllItems(),
            'user' => $this->pagesModel->get_user_details()
        );
        $this->view('Users/component/cod_order', $data);
    }

    public function individual_item(){
        $data = [];
        $this->view('Users/component/individual_item', $data);
    }

    public function product_page(){
        $data = [];
        $data['products'] = $this->filterModel->get_all_fertilizer_details();
      
        $data['provinces'] = SriLanka::getProvinces();
        $this->view('Users/component/v_product_page', $data);
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
}

?>


<?php

