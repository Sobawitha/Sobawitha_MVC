<?php
    class M_seller_wishlist{
        private $db;

        public function __construct(){
            $this->db = new Database();

        }


        /*related fertilizer products */
        /*get item from the wishlist */
        public function getItems(){
            $this->db->query("SELECT wishlist.*,raw_material.raw_material_image,raw_material.product_id, raw_material.product_name, raw_material.manufacturer, raw_material.price FROM raw_material INNER JOIN wishlist on wishlist.product_id = raw_material.product_id WHERE wishlist.User_id = :user_id");
            $this->db->bind(':user_id', $_SESSION['user_id']);
            return $this->db->resultSet();
        }

        /*remove item to the wishlist(related both rawmaterials and fertilizer) */
        public function removeItem(){

            $this->db->query("DELETE FROM wishlist WHERE User_id = :user_id AND Product_id = :product_id");
            $this->db->bind(':user_id', $_SESSION['user_id']);
            $this->db->bind(':product_id', $_GET['product_id']);
            $this->db->execute();
        }

       
       
       
       
    /*related raw material products */
    public function add_to_wishlist($product_id){
        $this->db->query("INSERT INTO wishlist (User_id, Product_id) VALUES(:user_id, :product_id)");
        $this->db->bind("user_id", $_SESSION['user_id']);
        $this->db->bind("product_id", $product_id);
        if($this->db->execute()){
            return true;
        }
        else{
            return false;
        }
    }

    public function get_all_wishlist_items(){
        $this->db->query("SELECT Product_id from wishlist where user_id = :user_id");
        $this->db->bind("user_id", $_SESSION['user_id']);
        return $this->db->resultSet();
    }

    

}


?>