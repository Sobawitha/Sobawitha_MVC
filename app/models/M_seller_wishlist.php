<?php
    class M_seller_wishlist{
        private $db;

        public function __construct(){
            $this->db = new Database();

        }

        public function getItems(){
            $this->db->query("SELECT wishlist.*,raw_material.raw_material_image,raw_material.Product_id, raw_material.product_name, raw_material.manufacturer, raw_material.price FROM raw_material INNER JOIN wishlist on wishlist.product_Id = raw_material.product_id WHERE wishlist.user_Id = :user_id");
            $this->db->bind(':user_id', $_SESSION['user_id']);
            return $this->db->resultSet();
        }

        public function removeItem(){

            $this->db->query("DELETE FROM wishlist WHERE User_id = :user_id AND product_id = :product_id");
            $this->db->bind(':user_id', $_SESSION['user_id']);
            $this->db->bind(':product_id', $_GET['product_id']);
            $this->db->execute();
        }

        public function add_to_wishlist(){
            $this->db->query("INSERT INTO wishlist(User_id,Product_id) values (:user_id, :product_id)");
            $this->db->bind(':user_id', $_SESSION['user_id']);
            $this->db->bind(':product_id', $_GET['product_id']);
            $this->db->execute();
        }

        public function search_wishlist(){
            $this->db->query("SELECT count(*) as wishlist_count FROM wishlist WHERE Product_id=:product_id && User_id=:user_id");
            $this->db->bind(':product_id', $_GET['product_id']);
            $this->db->bind(':user_id', $_SESSION['user_id']);
            return $this->db->single();
        }
    }
?>