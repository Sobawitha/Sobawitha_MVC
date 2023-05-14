<?php
    class M_cart{
    private $db;

        public function __construct(){
            $this->db = new Database();
        }

        //Find user by emai

        public function is_in_wishlist($product_id){
            $this->db->query("SELECT count(*) as row_count from wishlist where Product_id=:product_id AND User_id=:user_id ");
            $this->db->bind(":product_id", $product_id);
            $this->db->bind(":user_id", $_SESSION['user_id']);
            return $this->db->single();
       
        }
    

 } 
?>