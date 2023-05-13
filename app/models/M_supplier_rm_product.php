<?php

class M_supplier_rm_product
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }
    

 /*comment */

    public function view_individual_product($id){
    
      $this->db->query('SELECT f.*, COUNT(fb.id) AS total_feedback_count, 
      COUNT(CASE WHEN fb.rating = 1 THEN 1 ELSE NULL END) AS rating_1_count,
      COUNT(CASE WHEN fb.rating = 2 THEN 1 ELSE NULL END) AS rating_2_count,
      COUNT(CASE WHEN fb.rating = 3 THEN 1 ELSE NULL END) AS rating_3_count,
      COUNT(CASE WHEN fb.rating = 4 THEN 1 ELSE NULL END) AS rating_4_count,
      COUNT(CASE WHEN fb.rating = 5 THEN 1 ELSE NULL END) AS rating_5_count
        FROM fertilizer f
        LEFT JOIN feedback fb ON f.created_by = fb.receiver_id
        WHERE f.Product_id = :id AND fb.feed_status = 1
        GROUP BY f.Product_id

    ');
      $this->db->bind(':id',$id);  


      $row= $this->db->single();

      if($this->db->rowCount() >0){
            return $row;
      }else{
            return false;
      }
    
    }

    public function show_similar($title, $crop_type, $type, $id) {
        $this->db->query("SELECT * FROM fertilizer WHERE (product_name LIKE '%$title%' OR crop_type LIKE '%$crop_type%' OR type LIKE '%$type%') AND current_status = 1 AND Product_id != :id LIMIT 2");
        $this->db->bind(":id",$id);
        return $this->db->resultset();
    }

    public function update_fertilizer_count( $product_id, $count) {
        $this->db->query("UPDATE fertilizer SET quantity = quantity - :count WHERE product_id = :product_id");
        $this->db->bind(":count", $count);
        $this->db->bind(":product_id", $product_id);
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

   

    public function add_to_cart($data){
        $this->db->query("INSERT INTO cart (user_id, product_id, quantity) VALUES (:user_id, :product_id, :quantity)");
        $this->db->bind(":user_id", $data['user_id']);
        $this->db->bind(":product_id", $data['product_id']);
        $this->db->bind(":quantity", $data['quantity']);
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }

    }

    public function check_similer_item($product_id, $user_id){
        $this->db->query("SELECT COUNT(*) as count_row from cart where user_id=:user_id AND product_id=:product_id");
        $this->db->bind(":user_id", $user_id);
        $this->db->bind(":product_id", $product_id);
        $row_count = $this->db->single();
        return $row_count;
    }
    

    public function update_cart($data){
        $this->db->query("UPDATE cart SET quantity=:quantity where product_id=:product_id AND user_id=:user_id");
        $this->db->bind(":user_id", $data['user_id']);
        $this->db->bind(":product_id", $data['product_id']);
        $this->db->bind(":quantity", $data['quantity']);
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
    

    public function find_price_from_id($product_id){
        $this->db->query("SELECT price as product_price from fertilizer WHERE product_id = :product_id");
        $this->db->bind(":product_id", $product_id);
        return $this->db->single();
    }

    public function check_cart($id){
        $this->db-> query("SELECT count(*) as count_item from cart where user_id = :user_id");
        $this->db->bind("user_id", $id);
        return $this->db->single();
    }


    public function find_order_id(){
        $this->db->query('SELECT order_id as order_id FROM order_items WHERE user_id = :user_id ORDER BY order_id DESC LIMIT 1 ');
        $this->db->bind(":user_id", $_SESSION['user_id']);  
        return $this->db->single();
    }

    public function list_order_details($id){
        $this->db->query("SELECT `fp`.`order_id` AS `order_id`, concat(`u1`.`first_name`,' ',`u1`.`last_name`) AS `customer`, `fpr`.`created_at` AS `date`, GROUP_CONCAT(`fpr1`.`product_name` SEPARATOR ',') AS `product_names`, `fp`.`quantity` AS `quantity`, SUM((`fp`.`quantity`)*(`fpr1`.`price`)) AS total_price, `fpr1`.`user_id` AS `owner_id` FROM (((`seller_order_raw_material` `fp` left join `seller_orders` `fpr` on(`fp`.`order_id` = `fpr`.`order_id`)) left join `user` `u1` on(`fpr`.`seller_id` = `u1`.`user_id`)) left join `raw_material` `fpr1` on(`fp`.`product_id` = `fpr1`.`Product_id`)) WHERE `fpr1`.`user_id` = :id GROUP BY order_id");
        $this->db->bind(":id", $id);
        return $this->db->resultSet();
           
    }

    public function calculate_total($id){
        $this->db->query("SELECT sum((quantity*price)-5/100) as total_income from  view_seller_orders FROM view_seller_orders WHERE owner_id = :user_id GROUP BY order_id; ");
        $this->db->bind(":user_id", $id);
        return $this->db->single();
    }

    
    

}


?>

<!-- 
SELECT `fp`.`order_id` AS `order_id`, concat(`u1`.`first_name`,' ',`u1`.`last_name`) AS `customer`, `fpr`.`created_at` AS `created_at`, `fpr`.`current_status` AS `current_status`, `fpr`.`payment_type` AS `payment_type`, `fpr1`.`product_name` AS `product_name`, `fp`.`quantity` AS `quantity`, SUM((`fp`.`quantity` AS `quantity`)*(`fp`.`price` AS `price`)) FROM (((`seller_order_raw_material` `fp` left join `seller_orders` `fpr` on(`fp`.`order_id` = `fpr`.`order_id`)) left join `user` `u1` on(`fp`.`user_id` = `u1`.`user_id`)) left join `raw_material` `fpr1` on(`fp`.`product_id` = `fpr1`.`Product_id`)) ; -->
