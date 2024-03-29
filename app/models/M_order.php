<?php

class M_order
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }


    



    

    public function createOnlineOrder($data) {
       
       
        if($_SESSION['user_flag'] == '2'){
       
        $this->db->beginTransaction();
         
        
        // Insert a record into the `order_products` table
        $this->db->query("INSERT INTO buyer_orders(cust_id,status) VALUES(:cust_id,1)");

        $this->db->bind(':cust_id', $_SESSION['user_id']);
        
        $result = $this->db->execute();
        if (!$result) {
            $this->db->rollBack();
            return false;
        }
    
        // Get the ID of the last inserted record in the `order_products` table
        $order_id = $this->db->lastInsertId();
    
        // Insert records into the `order_items` table
        for ($i = 0; $i < count($data); $i++) {
            $this->db->query("INSERT INTO buyer_order_items(order_id, product_id, price, quantity, user_id) VALUES(:order_id, :product_id, :price, :quantity, :user_id)");
            
            $this->db->bind(':order_id', $order_id);
            $this->db->bind(':product_id', $data[$i]['price_data']['product_data']['metadata']['product_id']);
            $this->db->bind(':price', ($data[$i]['price_data']['unit_amount']/100));
            $this->db->bind(':quantity', $data[$i]['quantity']);
            $this->db->bind(':user_id', $_SESSION['user_id']);
            $result = $this->db->execute();
            if (!$result) {
                $this->db->rollBack();
                return false;
            }

            // $this->db-query("UPDATE TABLE fertilizer  SET quantity = :quantity WHERE Product_id = :product_id");
          
            $this->db->query("SELECT quantity FROM fertilizer WHERE Product_id = :product_id");
            $this->db->bind(":product_id", $data[$i]['price_data']['product_data']['metadata']['product_id']);
            $result = $this->db->single();
            $current_quantity = $result->quantity;
            // if ($current_quantity < $data[$i]['quantity']) {
            //     // Return an error or throw an exception to indicate that the order cannot be fulfilled due to insufficient stock
            //     $this->db->rollBack();
            //     return false;
            // }
         
            $this->db->query("UPDATE  fertilizer SET quantity = quantity -:order_quantity WHERE Product_id = :product_id");
            $this->db->bind(":product_id",$data[$i]['price_data']['product_data']['metadata']['product_id']);
            $this->db->bind(":order_quantity",$data[$i]['quantity']);

            if(!($this->db->execute())){
                $this->db->rollBack();
                 return false;
            }

            $this->db->query("SELECT created_by FROM fertilizer WHERE Product_id = :product_id");
            $this->db->bind(":product_id", $data[$i]['price_data']['product_data']['metadata']['product_id']);
            $result = $this->db->single();
            $created_by = $result->created_by;

            $this->db->query("INSERT INTO payments (payer_id,order_id,total_fee,payee_fee,payee_id,profit) VALUES (:payer_id,:order_id,:total_fee,:payee_fee,:payee_id,:profit)");
            $this->db->bind(":payer_id", $_SESSION['user_id']);
            $this->db->bind(":order_id", $order_id);
            $this->db->bind(":total_fee", $data[$i]['price_data']['unit_amount']*0.01);
            $this->db->bind(":payee_fee", $data[$i]['price_data']['unit_amount']*0.01*0.9);
            $this->db->bind(":payee_id", $created_by);
            $this->db->bind(":profit", $data[$i]['price_data']['unit_amount']*0.01*0.1);
            if(!($this->db->execute())){
                $this->db->rollBack();
                 return false;
            }
 
            
        
          
        }
    
        // Commit the transaction
      
        $this->db->commit();
        // $this->db->query("SELECT * from user WHERE user_id = :user_id");
        // $this->db->bind(":user_id", $_SESSION['user_id']);
        // $result = $this->db->single();
        // $payer_email = $result->email;
        // $payer_name = $result->first_name;
        // $payer_password = $result->password;
        $name = $_SESSION['username'].$_SESSION['lastname'];
        sendMail($_SESSION['user_email'],$name,$order_id,4,'','','');
        return true;
            

    }
       if($_SESSION['user_flag'] == '3')


       {
          

        $this->db->beginTransaction();
         
        
        // Insert a record into the `order_products` table
        $this->db->query("INSERT INTO seller_orders(seller_id,current_status) VALUES(:cust_id,1)");

        $this->db->bind(':cust_id', $_SESSION['user_id']);
        
        $result = $this->db->execute();
        if (!$result) {
            $this->db->rollBack();
            return false;
        }
    
        $order_id = $this->db->lastInsertId();
        $name = $_SESSION['username'].' '.$_SESSION['lastname'];
    
        // Insert records into the `order_items` table
        for ($i = 0; $i < count($data); $i++) {
            $this->db->query("INSERT INTO seller_order_raw_material(order_id, product_id,  quantity) VALUES(:order_id, :product_id, :quantity)");
            
            $this->db->bind(':order_id', $order_id);
            $this->db->bind(':product_id', $data[$i]['price_data']['product_data']['metadata']['product_id']);
            
            $this->db->bind(':quantity', $data[$i]['quantity']);
           
            $result = $this->db->execute();
            if (!$result) {
                $this->db->rollBack();
                return false;
            }
            
            $this->db->query("SELECT quantity FROM raw_material WHERE Product_id = :product_id");
            $this->db->bind(":product_id", $data[$i]['price_data']['product_data']['metadata']['product_id']);
            $result = $this->db->single();
            $current_quantity = $result->quantity;
            if ($current_quantity < $data[$i]['quantity']) {
                // Return an error or throw an exception to indicate that the order cannot be fulfilled due to insufficient stock
                $this->db->rollBack();
                return false;
            }
         
            $this->db->query("UPDATE  raw_material SET quantity = quantity -:order_quantity WHERE Product_id = :product_id");
            $this->db->bind(":product_id",$data[$i]['price_data']['product_data']['metadata']['product_id']);
            $this->db->bind(":order_quantity",$data[$i]['quantity']);

            if(!($this->db->execute())){
                $this->db->rollBack();
                 return false;
            }

            $this->db->query("SELECT user_id FROM raw_material WHERE Product_id = :product_id");
            $this->db->bind(":product_id", $data[$i]['price_data']['product_data']['metadata']['product_id']);
            $result = $this->db->single();
            $created_by = $result->user_id;

            $this->db->query("INSERT INTO payments (payer_id,order_id,total_fee,payee_fee,payee_id,profit) VALUES (:payer_id,:order_id,:total_fee,:payee_fee,:payee_id,:profit)");
            $this->db->bind(":payer_id", $_SESSION['user_id']);
            $this->db->bind(":order_id", $order_id);
            $this->db->bind(":total_fee", $data[$i]['price_data']['unit_amount']*0.01);
            $this->db->bind(":payee_fee", $data[$i]['price_data']['unit_amount']*0.01*0.9);
            $this->db->bind(":payee_id", $created_by);
            $this->db->bind(":profit", $data[$i]['price_data']['unit_amount']*0.01*0.1);
            if(!($this->db->execute())){
                $this->db->rollBack();
                 return false;
            }



             

       }
       
       
       $this->db->commit();

 
      sendMail($_SESSION['user_email'],$name,$order_id,4,'','','');
      return true;    
      
    }
    

}
}

?>