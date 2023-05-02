<?php
    class M_seller_dashboard{
    private $db;

    public function __construct(){
        $this->db = new Database();
    }

    public function get_no_of_complaints($id){
        // $this->db->query("SELECT COUNT(*) AS num_complaint FROM complaint WHERE (date) >= DATE_SUB(NOW(), INTERVAL 1 MONTH) AND created_by = :id");
        $this->db->query("SELECT COUNT(*) AS num_complaint 
        FROM complaint 
        WHERE created_by = :id 
        AND date >= DATE_SUB(NOW(), INTERVAL 1 YEAR);
        ");
        $this->db->bind(":id", $id);
        return $this->db->single();
        
    }

    public function get_no_of_ongoing_order($id){
        $this->db->query("SELECT COUNT(distinct(order_id)) AS ongoing_orders
        FROM view_seller_orders 
        WHERE owner_id = :id AND current_status = 0
        AND created_at >= DATE_SUB(NOW(), INTERVAL 1 YEAR);
        ");
        $this->db->bind(":id", $id);
        return $this->db->single();
    }

    public function get_no_of_complete_order($id){
        $this->db->query("SELECT COUNT(distinct(order_id)) AS complete_orders
        FROM view_seller_orders 
        WHERE owner_id = :id AND current_status = 1
        AND created_at >= DATE_SUB(NOW(), INTERVAL 1 YEAR);
        ");
        $this->db->bind(":id", $id);
        return $this->db->single();
    }

    public function calculate_total($id){
        $this->db->query("SELECT sum(quantity*price) as total_income from view_seller_orders WHERE owner_id = :user_id GROUP BY order_id");
        $this->db->bind(":user_id", $id);
        return $this->db->single();
    }

    public function get_order_detail() {
        $this->db->query("SELECT DISTINCT current_status as status, COUNT(DISTINCT order_id) as num_orders FROM view_seller_orders WHERE created_by = :id GROUP BY current_status"); // corrected query
        $this->db->bind(":id", $_SESSION['user_id']);
        return $this->db->resultSet();
    }
}
?>