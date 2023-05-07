<?php
    class M_seller_wishlist{
        private $db;

        public function __construct(){
            $this->db = new Database();

        }

        public function getItems(){
            $this->db->query("SELECT seller_wishlist.*,raw_material.raw_material_image,raw_material.Product_id, raw_material.product_name, raw_material.manufacturer, raw_material.price FROM raw_material INNER JOIN seller_wishlist on seller_wishlist.product_Id = raw_material.product_id WHERE seller_wishlist.user_Id = :user_id");
            $this->db->bind(':user_id', $_SESSION['user_id']);
            return $this->db->resultSet();
        }

        public function removeItem(){

            $this->db->query("DELETE FROM seller_wishlist WHERE User_id = :user_id AND product_id = :product_id");
            $this->db->bind(':user_id', $_SESSION['user_id']);
            $this->db->bind(':product_id', $_GET['product_id']);
            $this->db->execute();
        }
    }
?>