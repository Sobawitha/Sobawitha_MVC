<?php
    class M_Seller_purchase{
    private $db;

    public function __construct(){
        $this->db = new Database();
    }

    
    public function get_purchase_list(){
        $this->db->query('SELECT seller_purchases.purchase_id, seller_purchases.quantity, seller_purchases.date, raw_material.product_name, raw_material.price, raw_material.raw_material_image from seller_purchases inner join raw_material on raw_material.product_id = seller_purchases.product_id where seller_id= :id');
        $this->db->bind(":id", $_SESSION['user_id']);
        return $this->db->resultSet();
    }


    public function getSearchAds($userId, $search)
    {
        $this->db->query("SELECT p.purchase_id, p.quantity, p.date, r.product_name, r.price, r.raw_material_image FROM seller_purchases AS p JOIN raw_material AS r on p.product_id = r.Product_id WHERE r.product_name LIKE '%$search%' AND p.seller_id=$userId"  );
        $items = $this->db->resultSet(); 

        return array("items" => $items);
    }
}
?>