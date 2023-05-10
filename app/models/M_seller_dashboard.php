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
        $this->db->query("SELECT round(sum(quantity*price)*95/100,2) as total_income from view_seller_orders WHERE owner_id = :user_id GROUP BY order_id");
        $this->db->bind(":user_id", $id);
        return $this->db->single();
    }


    public function get_order_detail() {
        $this->db->query("SELECT 
        CASE current_status 
          WHEN 1 THEN 'complete'
          WHEN 0 THEN 'pending'
        END as status,
        COUNT(DISTINCT order_id) as num_orders 
      FROM 
        view_seller_orders 
      WHERE 
        owner_id = :id
      GROUP BY 
        current_status"); // corrected query
        $this->db->bind(":id", $_SESSION['user_id']);
        return $this->db->resultSet();
    }

    public function get_monthly_income_details(){
        $this->db->query("SELECT 
        YEAR(months.month_date) AS year, 
        MONTHNAME(months.month_date) AS month, 
        COALESCE(SUM(quantity*price)*95/100, 0) AS count
      FROM 
        (SELECT DATE_SUB(NOW(), INTERVAL n MONTH) AS month_date 
         FROM (SELECT 0 AS n UNION ALL SELECT 1 UNION ALL SELECT 2 UNION ALL SELECT 3 
               UNION ALL SELECT 4 UNION ALL SELECT 5 UNION ALL SELECT 6 
               UNION ALL SELECT 7 UNION ALL SELECT 8 UNION ALL SELECT 9 
               UNION ALL SELECT 10 UNION ALL SELECT 11) AS nums) AS months
        LEFT JOIN view_seller_orders ON MONTH(months.month_date) = MONTH(created_at) 
                                     AND YEAR(months.month_date) = YEAR(created_at) 
                                     AND owner_id = :id 
      WHERE 
        months.month_date BETWEEN DATE_SUB(NOW(), INTERVAL 12 MONTH) AND NOW()
      GROUP BY 
        YEAR(months.month_date), 
        MONTH(months.month_date);
      ");
        $this->db->bind(":id", $_SESSION['user_id']);
        return $this->db->resultSet();
    }

    public function get_stock_details($start_from,$num_per_page){
        $this->db->query("SELECT fertilizer.product_id, fertilizer.product_name, fertilizer.quantity, fertilizer_product_starting_stock.quantity as supplied_quantity from fertilizer left join fertilizer_product_starting_stock on fertilizer.product_id = fertilizer_product_starting_stock.product_id where created_by = :id limit :start_from, :num_per_page");
        $this->db->bind(":start_from", $start_from);
        $this->db->bind(":num_per_page", $num_per_page);
        $this->db->bind(":id", $_SESSION['user_id']);
        return $this->db->resultSet();
    }

    public function get_no_of_products(){
        $this->db->query("SELECT count(*) as no_of_products from fertilizer where created_by = :id  ");
        $this->db->bind(":id", $_SESSION['user_id']);
        return $this->db->single();
    }
}
?>