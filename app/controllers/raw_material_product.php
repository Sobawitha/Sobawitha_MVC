<?php
class raw_material_product extends Controller{
    public function __construct(){
        $this->raw_material_product_model = $this->model('M_raw_material_product');
        $this->seller_wishlist_model = $this->model('M_seller_wishlist');
    }

    public function add_to_wishlist(){
        $this->seller_wishlist_model->add_to_wishlist();
        $current_page = $_GET["product_id"];
        
        redirect("supplier_ad_view/indexmore?product_id=$current_page");
    }
}
?>