<?php

class M_fertilizer_product
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }
    

 /*comment */


    public function post_comment($data){

        $this->db->query('INSERT INTO fertilizer_product_comment (product_id, comment, commented_by) VALUES (:product_id, :comment, :commented_by) ');
        $this->db->bind(":product_id", $data['product_id']);
        $this->db->bind(":comment", $data['comment']);
        $this->db->bind(":commented_by", $data['commented_by']);
        
        //execute the query
        if($this->db->execute()){
            return true;
        }
        else{
            return false;
        }
    }

    public function post_reply($data){
        $this->db->query('INSERT INTO fertilizer_product_comment_reply (comment_id, replied_by, product_id, reply) VALUES (:comment_id, :replied_by, :product_id, :reply) ');
        $this->db->bind(":comment_id", $data['comment_id']);
        $this->db->bind(":replied_by", $data['replied_by']);
        $this->db->bind(":product_id", $data['product_id']);
        $this->db->bind(":reply", $data['reply']);

        //execute the query
        if($this->db->execute()){
            return true;
        }
        else{
            return false;
        }
    }

    public function display_all_comment($data){
        $this->db->query('SELECT  comment_id,comment, comment_date, commented_by_full_name, count(reply_id) as no_of_reply FROM view_fertilizer_product_comment_reply WHERE product_id=:productid group by(comment_id)');
        $this->db->bind(":productid", $data['product_id']);
        return $this->db->resultSet();
    }

    public function display_all_replies($data){
        $this->db->query('SELECT  comment_id, comment, comment_date, commented_by_full_name, reply, reply_comment_id, reply_date, reply_user_full_name  FROM view_fertilizer_product_comment_reply WHERE product_id=:productid');
        $this->db->bind(":productid", $data['product_id']);
        return $this->db->resultSet();
    }

    public function post_question($data){

        $this->db->query('INSERT INTO fertilizer_product_related_question ( product_id, asked_by, question) VALUES (:product_id, :asked_by, :question) ');
        $this->db->bind(":product_id", $data['product_id']);
        $this->db->bind(":question", $data['question']);
        $this->db->bind(":asked_by", $data['asked_by']);
        
        //execute the query
        if($this->db->execute()){
            return true;
        }
        else{
            return false;
        }
    }

    public function post_answer($data){
        $this->db->query('INSERT INTO fertilizer_product_related_answers ( product_id,question_id, answered_by, answer) VALUES (:product_id, :question_id, :answered_by, :answer) ');
        $this->db->bind(":question_id", $data['question_id']);
        $this->db->bind(":answered_by", $data['answered_by']);
        $this->db->bind(":product_id", $data['product_id']);
        $this->db->bind(":answer", $data['answer']);

        //execute the query
        if($this->db->execute()){
            return true;
        }
        else{
            return false;
        }
    }

    public function display_all_questions($data){
        $this->db->query('SELECT  question_id,question, q_date, asked_by_full_name, count(answer_id) as no_of_answers, asked_user_gender FROM view_fertilizer_product_question_answers WHERE product_id=:productid group by(question_id)');
        $this->db->bind(":productid", $data['product_id']);
        return $this->db->resultSet();
    }

    public function display_all_answers($data){
        $this->db->query('SELECT  answer_id, answer, answer_date, answer_user_full_name,answer_question_id,  answer_date, answer_user_full_name, answer_user_gender  FROM view_fertilizer_product_question_answers WHERE product_id=:productid');
        $this->db->bind(":productid", $data['product_id']);
        return $this->db->resultSet();
    }

    public function find_gender($id){
        $this->db->query('SELECT gender as gender from user where user_id=:id');
        $this->db->bind(":id", $id);
        return $this->db->single();
    }

    public function find_owner_id($product_id){
        $this->db->query('SELECT created_by as owner_id from fertilizer where product_id=:product_id');
        $this->db->bind(":product_id", $product_id);
        return $this->db->single();

    }

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

    public function insert_order_product_table($data){
        $this->db->query("INSERT INTO order_products (cust_id, payment_type) VALUES (:user_id,'cod')");
        $this->db->bind(":user_id", $data['user_id']);
        if($this->db->execute()){
            return true;
        }else{
                return false;
        }
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

    public function update_order_state($order_id){
        $this->db->query("UPDATE order_items set current_status=1 WHERE order_id = :order_id");
        $this->db->bind(":order_id", $order_id);
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function insert_order_table($data, $order_id){
        $this->db->query("INSERT INTO order_items (order_id,product_id,price,quantity,user_id) VALUES (:order_id, :product_id, :price, :quantity, :user_id)");
        $this->db->bind(":order_id", $order_id);
        $this->db->bind(":product_id", $data['product_id']);
        $this->db->bind(":price", $data['price']);
        $this->db->bind(":quantity", $data['quantity']);
        $this->db->bind(":user_id", $data['user_id']);
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

    public function select_last_raw_id(){
        $this->db->query('SELECT LAST_INSERT_ID() as raw_id');
        return $this->db->single();
    }

    public function get_user_detail(){
        $this->db->query('SELECT first_name , last_name, concat(address_line_one,", ",address_line_two,", ",address_line_three,", ",address_line_four,".") as address, contact_no, email from user where user_id=:user_id');
        $this->db->bind(":user_id", $_SESSION['user_id']);
        return $this->db->single();
    }

    public function find_order_id(){
        $this->db->query('SELECT order_id as order_id FROM order_items WHERE user_id = :user_id ORDER BY order_id DESC LIMIT 1 ');
        $this->db->bind(":user_id", $_SESSION['user_id']);  
        return $this->db->single();
    }

    public function update_cache_on_delivery_table($order_id){
        $this->db->query("INSERT into cache_on_delivery_orders (order_id) VALUES (:order_id)");
        $this->db->bind(":order_id", $order_id);
        if ($this->db->execute()) {
            $_SESSION['order_complete_msg']="complete_order_successfully";
            return true;
        } else {
            return false;
        }

    }

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

    
    

}


?>