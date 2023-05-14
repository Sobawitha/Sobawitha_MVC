<?php

class M_supplier_view
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function getPostsView() {
        // Check Expired ones
        $this->db->query('UPDATE raw_material SET current_status = 3 WHERE date <= DATE_SUB(NOW(), INTERVAL 2 WEEK)');
        $this->db->execute();

        $this->db->query('SELECT * FROM raw_material WHERE (ad_status != 1 AND (date > DATE_SUB(NOW(), INTERVAL 2 WEEK))) AND current_status = 1');

        $results = $this->db->resultSet();

        return $results;
    }
    public function getPostsfilter() {
        // Check Expired ones
        $this->db->query('UPDATE raw_material SET current_status = 3 WHERE date <= DATE_SUB(NOW(), INTERVAL 2 WEEK)');
        $this->db->execute();

        $user_id = $_SESSION['user_id'];
        if(isset($_POST['current_status']) && !empty($_POST['current_status'])){
            if ($_POST['current_status'] == 'all'){
                $this->db->query('SELECT * FROM raw_material WHERE (user_id = :uid AND ad_status != 1)');

                $this->db->bind(':uid', $user_id);
                return $this->db->resultSet(); 
            }
            if ($_POST['current_status'] == 'Pending'){
                $this->db->query('SELECT * FROM raw_material WHERE ((ad_status != 1 AND current_status=0) AND user_id = :uid)');
                $this->db->bind(':uid', $user_id);
                return $this->db->resultSet(); 
            }
            if ($_POST['current_status'] == 'Accepted'){
                $this->db->query('SELECT * FROM raw_material WHERE ((ad_status != 1 AND current_status=1) AND user_id = :uid)');
                $this->db->bind(':uid', $user_id);
                return $this->db->resultSet(); 
            }
    
            if ($_POST['current_status'] == 'Rejected'){
              $this->db->query('SELECT * FROM raw_material WHERE ((ad_status != 1 AND current_status=2) AND user_id = :uid)');
              $this->db->bind(':uid', $user_id);
              return $this->db->resultSet(); 
            }
            if ($_POST['current_status'] == 'Expired'){
                $this->db->query('SELECT * FROM raw_material WHERE ((ad_status != 1 AND current_status=3) AND user_id = :uid)');
                $this->db->bind(':uid', $user_id);
                return $this->db->resultSet(); 
            }
        }else{
            $this->db->query('SELECT * FROM raw_material WHERE (user_id = :uid AND ad_status != 1)');
            $this->db->bind(':uid', $user_id);
            return $this->db->resultSet(); 
        }
    }

    public function getPostById($productId) {
        // Check Expired ones
        $this->db->query('UPDATE raw_material SET current_status = 3 WHERE date <= DATE_SUB(NOW(), INTERVAL 2 WEEK)');
        $this->db->execute();
        
        $this->db->query('SELECT * FROM raw_material WHERE (Product_id = :id AND ad_status != 1)');
        $this->db->bind(':id', $productId);

        $row = $this->db->single();

        return $row;
    }

    public function create($data) {
        $this->db->query('INSERT INTO raw_material(product_name, quantity, price, product_description, type, raw_material_image, rm_image_two, rm_image_three, user_id, current_status) VALUES (:product_name, :quantity, :price, :product_description, :type, :image1, :image2, :image3, :user_id, :current_status)');
        $this->db->bind(':user_id', $_SESSION['user_id']);
        $this->db->bind(':image1', $data['image_name1']);
        $this->db->bind(':image2', $data['image_name2']);
        $this->db->bind(':image3', $data['image_name3']);
        $this->db->bind(':product_name', $data['product_name']);
        $this->db->bind(':quantity', $data['quantity']);
        $this->db->bind(':price', $data['price']);
        $this->db->bind(':product_description', $data['product_description']);
        $this->db->bind(':type', $data['type']);
        
        $this->db->bind(':current_status', $data['current_status']);
        
        // Execute
        if($this->db->execute()) {
            return true;
        }
        else {
            return false;
        }
    }

    

    public function edit($data) {
        $this->db->query('UPDATE raw_material SET raw_material_image = :image1, rm_image_two = :image2, rm_image_three = :image3, product_name = :product_name, quantity=:quantity, price=:price, product_description=:product_description, type=:type WHERE Product_id = :id');
        $this->db->bind(':image1', $data['image_name1']);
        $this->db->bind(':image2', $data['image_name2']);
        $this->db->bind(':image3', $data['image_name3']);
        $this->db->bind(':product_name', $data['product_name']);
        $this->db->bind(':quantity', $data['quantity']);
        $this->db->bind(':price', $data['price']);
        $this->db->bind(':product_description', $data['product_description']);
        $this->db->bind(':type', $data['type']);
        $this->db->bind(':id', $data['product_id']);
        
        // Execute
        if($this->db->execute()) {
            return true;
        }
        else {
            return false;
        }
    }

    public function delete($productId) {
        $this->db->query('UPDATE raw_material SET ad_status = 1 WHERE Product_id = :id');
        $this->db->bind(':id', $productId);
        
        // Execute
        if($this->db->execute()) {
            return true;
        }
        else {
            return false;
        }
    }


    /*buying process */
    public function show_similar($title, $crop_type, $type, $id) {
        $this->db->query("SELECT * FROM fertilizer WHERE (product_name LIKE '%$title%' OR crop_type LIKE '%$crop_type%' OR type LIKE '%$type%') AND current_status = 1 AND Product_id != :id LIMIT 2");
        $this->db->bind(":id",$id);
        return $this->db->resultset();
    }


    /*ok */
    public function update_raw_material_count( $product_id, $count) {
        $this->db->query("UPDATE raw_material SET quantity = quantity - :count WHERE product_id = :product_id");
        $this->db->bind(":count", $count);
        $this->db->bind(":product_id", $product_id);
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }


    public function re_update_raw_material_count($product_id, $count){
        $this->db->query("UPDATE raw_material SET quantity = quantity + :count WHERE product_id = :product_id");
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

    public function remove_from_cart($data){
        $this->db->query("DELETE from cart where Product_id = :product_id AND user_id=:user_id");
        $this->db->bind(":user_id", $data['user_id']);
        $this->db->bind(":product_id", $data['product_id']);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }


    }

    /*ok */
    public function check_similer_item($product_id, $user_id){
        $this->db->query("SELECT COUNT(*) as count_row from cart where User_id=:user_id AND Product_id=:product_id");
        $this->db->bind(":user_id", $user_id);
        $this->db->bind(":product_id", $product_id);
        $row_count = $this->db->single();
        return $row_count;
    }
    

    /*ok */
    public function update_cart($data){
        $this->db->query("UPDATE cart SET quantity=:quantity where Product_id=:product_id AND User_id=:user_id");
        $this->db->bind(":user_id", $data['user_id']);
        $this->db->bind(":product_id", $data['product_id']);
        $this->db->bind(":quantity", $data['quantity']);
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
    
/* */
    public function find_price_from_id($product_id){
        $this->db->query("SELECT price as product_price from raw_material WHERE product_id = :product_id");
        $this->db->bind(":product_id", $product_id);
        return $this->db->single();
    }

    public function find_price_from_id_fertilizer($product_id){
        $this->db->query("SELECT  price from fertilizer WHERE Product_id = :product_id");
        $this->db->bind(":product_id", $product_id);
        return $this->db->single();
    }
    public function find_name_from_id($product_id){
        $this->db->query("SELECT product_name as product_name from raw_material WHERE product_id = :product_id");
        $this->db->bind(":product_id", $product_id);
        return $this->db->single();
    }
    public function find_name_from_id_fertilizer($product_id){
        $this->db->query("SELECT product_name as name from fertilizer WHERE Product_id = :product_id");
        $this->db->bind(":product_id", $product_id);
        return $this->db->single();
    }
    

    /*ok */
    public function check_cart($id){
        $this->db-> query("SELECT count(*) as count_item from cart where User_id = :user_id");
        $this->db->bind("user_id", $id);
        return $this->db->single();
    }

    /*ok*/
    public function select_last_raw_id(){
        $this->db->query('SELECT LAST_INSERT_ID() as raw_id');
        return $this->db->single();
    }

    /*ok */
    public function find_order_id(){
        $this->db->query('SELECT order_id as order_id FROM seller_orders WHERE seller_id = :user_id ORDER BY order_id DESC LIMIT 1 ');
        $this->db->bind(":user_id", $_SESSION['user_id']);  
        return $this->db->single();
    }

    /*for order list Naveendra */
    public function list_order_deatils($id){
        if(isset($_POST['order_type'])){
            if ($_POST['order_type'] == 'all'){
                $this->db->query("SELECT order_id, customer, DATE(created_at) as date, current_status, payment_type, GROUP_CONCAT(product_name SEPARATOR ', ') AS product_names,quantity, SUM(quantity * price) AS total_price FROM view_seller_orders WHERE owner_id = :user_id GROUP BY order_id;");
                $this->db->bind(":user_id", $id);
                return $this->db->resultSet();
            }
            if ($_POST['order_type'] == 'pending'){
                $this->db->query("SELECT order_id, customer, DATE(created_at) as date, current_status, payment_type, GROUP_CONCAT(product_name SEPARATOR ', ') AS product_names,quantity, SUM(quantity * price) AS total_price FROM view_seller_orders WHERE owner_id = :user_id AND current_status=0 GROUP BY order_id;");
                $this->db->bind(":user_id", $id);
                return $this->db->resultSet();
            }
            if ($_POST['order_type'] == 'completed'){
                $this->db->query("SELECT order_id, customer, DATE(created_at) as date, current_status, payment_type, GROUP_CONCAT(product_name SEPARATOR ', ') AS product_names,quantity, SUM(quantity * price) AS total_price FROM view_seller_orders WHERE owner_id = :user_id AND current_status=1 GROUP BY order_id;");
                $this->db->bind(":user_id", $id);
                return $this->db->resultSet();
            }
        }
        else{
            $this->db->query("SELECT order_id, customer, DATE(created_at) as date, current_status, payment_type, GROUP_CONCAT(product_name SEPARATOR ', ') AS product_names,quantity, SUM(quantity * price) AS total_price FROM view_seller_orders WHERE owner_id = :user_id GROUP BY order_id;");
            $this->db->bind(":user_id", $id);
            return $this->db->resultSet();
        }
        
    }

    public function calculate_total($id){
        $this->db->query("SELECT sum((quantity*price)-5/100) as total_income from  view_seller_orders FROM view_seller_orders WHERE owner_id = :user_id GROUP BY order_id; ");
        $this->db->bind(":user_id", $id);
        return $this->db->single();
    }

    /*to that */

    /*according to the login user check whethe given itm in the wishlist or not(according to user and product) */
    public function is_in_wishlist($product_id){
        $this->db->query("SELECT count(*) as row_count from wishlist where Product_id=:product_id AND User_id=:user_id ");
        $this->db->bind(":product_id", $product_id);
        $this->db->bind(":user_id", $_SESSION['user_id']);
        return $this->db->single();
   
    }

    

    public function view_individual_product($id){
        $this->db->query('SELECT * FROM raw_material WHERE Product_id = :id');
  
        $this->db->bind(':id',$id);  
        $row= $this->db->single();
      
        if($this->db->rowCount() >0){
                return $row;
        }else{
                return false;
        }
    }

    public function get_feedback_details($user_id){
    
        $this->db->query('SELECT COUNT(id) AS total_feedback_count, 
        COUNT(CASE WHEN rating = 1 THEN 1 ELSE NULL END) AS rating_1_count,
        COUNT(CASE WHEN rating = 2 THEN 1 ELSE NULL END) AS rating_2_count,
        COUNT(CASE WHEN rating = 3 THEN 1 ELSE NULL END) AS rating_3_count,
        COUNT(CASE WHEN rating = 4 THEN 1 ELSE NULL END) AS rating_4_count,
        COUNT(CASE WHEN rating = 5 THEN 1 ELSE NULL END) AS rating_5_count,
        AVG(rating) AS avg_rating
          FROM feedback 
          WHERE receiver_id = :id AND feed_status = 1
      ');
        $this->db->bind(':id',$user_id);  
  
  
        $row= $this->db->single();
  
        if($this->db->rowCount() >0){
              return $row;
        }else{
              return false;
        }
      
      }
    

}
?>