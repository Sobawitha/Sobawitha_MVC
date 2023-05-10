<?php
    class M_supplier_dashboard{
    private $db;

    public function __construct(){
        $this->db = new Database();
    }

    public function get_no_of_complaints($id){
        $this->db->query("SELECT COUNT(*) AS num_complaint 
        FROM complaint 
        WHERE created_by = :id 
        AND date >= DATE_SUB(NOW(), INTERVAL 1 YEAR);
        ");
        $this->db->bind(":id", $id);
        return $this->db->single();
        
    }

    public function get_no_of_ongoing_order($id){
        $this->db->query("SELECT COUNT(DISTINCT(seller_order_raw_material.order_id)) AS ongoing_orders
        FROM seller_order_raw_material inner join raw_material on seller_order_raw_material.product_id = raw_material.product_id inner join  on 
        seller_orders.order_id = seller_order_raw_material.order_id  
        WHERE raw_material.user_id =  :id AND seller_orders.current_status = 0
        AND seller_orders.created_at >= DATE_SUB(NOW(), INTERVAL 1 YEAR)");
        $this->db->bind(":id", $id);
        return $this->db->single();
    }

    public function get_no_of_complete_order($id){
        $this->db->query("SELECT COUNT(DISTINCT(seller_order_raw_material.order_id)) AS complete_orders
        FROM seller_order_raw_material inner join raw_material on seller_order_raw_material.product_id = raw_material.product_id inner join seller_orders on 
        seller_orders.order_id = seller_order_raw_material.order_id  
        WHERE raw_material.user_id =  :id AND seller_orders.current_status = 1
        AND seller_orders.created_at >= DATE_SUB(NOW(), INTERVAL 1 YEAR)");
        $this->db->bind(":id", $id);
        return $this->db->single();
    }

    public function calculate_total($id){
        $this->db->query("SELECT r.user_id as user_id, round(sum(s.quantity*r.price)*95/100,2) as total_income 
        FROM seller_order_raw_material s 
        INNER JOIN raw_material r ON s.product_id = r.product_id inner join seller_orders o on o.order_id = s.order_id
        WHERE r.user_id = :user_id AND o.created_at >= DATE_SUB(NOW(), INTERVAL 1 MONTH);
        GROUP BY r.user_id");
        $this->db->bind(":user_id", $id);
        return $this->db->single();
    }

    public function get_order_detail() {
        $this->db->query("SELECT 
        CASE seller_orders.current_status
          WHEN 1 THEN 'complete'
          WHEN 0 THEN 'pending'
        END as status,
        COUNT(DISTINCT seller_order_raw_material.order_id) AS num_orders
      FROM 
        seller_order_raw_material 
        INNER JOIN raw_material ON seller_order_raw_material.product_id = raw_material.product_id 
        INNER JOIN seller_orders ON seller_orders.order_id = seller_order_raw_material.order_id  
      WHERE 
        raw_material.user_id = :id
      GROUP BY 
        seller_orders.current_status;
      "); // corrected query
        $this->db->bind(":id", $_SESSION['user_id']);
        return $this->db->resultSet();
    }

    public function get_monthly_income_details(){
        $this->db->query("SELECT 
        YEAR(months.month_date) AS year, 
        MONTHNAME(months.month_date) AS month, 
        COALESCE(SUM(s.quantity * r.price) * 95/100, 0) AS count
      FROM 
        (SELECT DATE_FORMAT(DATE_SUB(NOW(), INTERVAL n MONTH), '%Y-%m-01') AS month_date 
         FROM (SELECT 0 AS n UNION ALL SELECT 1 UNION ALL SELECT 2 UNION ALL SELECT 3 
               UNION ALL SELECT 4 UNION ALL SELECT 5 UNION ALL SELECT 6 
               UNION ALL SELECT 7 UNION ALL SELECT 8 UNION ALL SELECT 9 
               UNION ALL SELECT 10 UNION ALL SELECT 11) AS nums) AS months
        LEFT JOIN (
          SELECT s.order_id, s.product_id, s.quantity, o.created_at
          FROM seller_order_raw_material s
          INNER JOIN seller_orders o ON s.order_id = o.order_id
        ) s ON MONTH(months.month_date) = MONTH(s.created_at) AND YEAR(months.month_date) = YEAR(s.created_at)
        INNER JOIN raw_material r ON s.product_id = r.product_id 
        INNER JOIN seller_orders o ON s.order_id = o.order_id
        WHERE r.user_id = :id AND o.created_at >= DATE_SUB(NOW(), INTERVAL 12 MONTH)
        GROUP BY YEAR(months.month_date), MONTH(months.month_date)
      ORDER BY YEAR(months.month_date), MONTH(months.month_date) ");
        $this->db->bind(":id", $_SESSION['user_id']);
        return $this->db->resultSet();
    }

    public function get_stock_details($start_from,$num_per_page){
        $this->db->query("SELECT raw_material.product_id, raw_material.product_name, raw_material.quantity, raw_material_product_starting_stock.quantity as supplied_quantity from raw_material left join raw_material_product_starting_stock on raw_material.product_id = raw_material_product_starting_stock.product_id where user_id = :id limit :start_from, :num_per_page");
        $this->db->bind(":start_from", $start_from);
        $this->db->bind(":num_per_page", $num_per_page);
        $this->db->bind(":id", $_SESSION['user_id']);
        return $this->db->resultSet();
    }

    public function get_no_of_products(){
        $this->db->query("SELECT count(*) as no_of_products from raw_material where user_id = :id  ");
        $this->db->bind(":id", $_SESSION['user_id']);
        return $this->db->single();
    }
}
?>