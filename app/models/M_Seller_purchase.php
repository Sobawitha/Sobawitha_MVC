<?php
    class M_Seller_purchase{
    private $db;

    public function __construct(){
        $this->db = new Database();
    }

    
    public function get_purchase_list(){
        // $this->db->query('SELECT seller_purchases.purchase_id, seller_purchases.quantity, seller_purchases.date, raw_material.product_name, raw_material.price, raw_material.raw_material_image from seller_purchases inner join raw_material on raw_material.product_id = seller_purchases.product_id where seller_id= :id');
        $this->db->query('SELECT seller_orders.order_id, seller_orders.created_at, seller_order_raw_material.quantity, raw_material.product_name, raw_material.price, raw_material.raw_material_image
        FROM seller_orders 
        INNER JOIN seller_order_raw_material ON seller_orders.order_id = seller_order_raw_material.order_id 
        INNER JOIN raw_material ON raw_material.product_id = seller_order_raw_material.product_id 
        WHERE seller_orders.seller_id = :user_id AND seller_orders.current_status = 1
        GROUP BY seller_orders.order_id, seller_orders.created_at, seller_order_raw_material.product_id 
        ORDER BY seller_orders.created_at ');
        $this->db->bind(":user_id", $_SESSION['user_id']);
        return $this->db->resultSet();
    }
}
?>