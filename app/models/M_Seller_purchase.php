<?php
    class M_Seller_purchase{
    private $db;

    public function __construct(){
        $this->db = new Database();
    }

    
    public function get_purchase_list(){
        // $this->db->query('SELECT seller_purchases.purchase_id, seller_purchases.quantity, seller_purchases.date, raw_material.product_name, raw_material.price, raw_material.raw_material_image from seller_purchases inner join raw_material on raw_material.product_id = seller_purchases.product_id where seller_id= :id');
        $this->db->query('SELECT seller_orders.order_id, seller_orders.created_at, seller_order_raw_material.review_status, seller_order_raw_material.quantity, raw_material.product_name, raw_material.price, raw_material.raw_material_image
        FROM seller_orders 
        INNER JOIN seller_order_raw_material ON seller_orders.order_id = seller_order_raw_material.order_id 
        INNER JOIN raw_material ON raw_material.product_id = seller_order_raw_material.product_id 
        WHERE seller_orders.seller_id = :user_id AND seller_orders.current_status = 1
        GROUP BY seller_orders.order_id, seller_orders.created_at, seller_order_raw_material.product_id 
        ORDER BY seller_orders.created_at ');
        $this->db->bind(":user_id", $_SESSION['user_id']);
        return $this->db->resultSet();
    }

    public function get_feedback_receiver($orderId){
        $this->db->query('SELECT raw_material.user_id FROM raw_material 
            INNER JOIN seller_order_raw_material ON raw_material.product_id = seller_order_raw_material.product_id 
            WHERE seller_order_raw_material.order_id = :order_id;
        ');
        $this->db->bind(":order_id", $orderId);
        return $this->db->single();
    }
    
    public function update_review_status($orderId){
        $this->db->query('UPDATE seller_order_raw_material SET review_status = 1 WHERE order_id = :order_id');
        $this->db->bind(":order_id", $orderId);
        return $this->db->execute();
    }

    public function insert_feedback($data){
        $this->db->query('INSERT INTO feedback (rating, review_desc, hide_name_status, receiver_id, sender_id ,feed_status, category ,date) VALUES (:rating, :review, :visible_state, :receiver_id , :sender_id , :feed_status , :category , :date)');
        $this->db->bind(":rating", $data['rating']);
        $this->db->bind(":review", $data['review']);
        $this->db->bind(":visible_state", $data['visible_state']);
        $this->db->bind(":receiver_id", $data['receiver_id']);
        $this->db->bind(":sender_id", $_SESSION['user_id']);
        $this->db->bind(":feed_status", 0);
        $this->db->bind(":category", "Supplier");
        $timestamp = date('Y-m-d H:i:s');
        $this->db->bind(":date", $timestamp);


        return $this->db->execute();
    }
    

    public function getSearchAds($userId, $search)
    {
        $this->db->query("SELECT p.purchase_id, p.quantity, p.date, r.product_name, r.price, r.raw_material_image FROM seller_purchases AS p JOIN raw_material AS r on p.product_id = r.Product_id WHERE r.product_name LIKE '%$search%' AND p.seller_id=$userId"  );
        $items = $this->db->resultSet(); 

        return array("items" => $items);
    }
}
?>