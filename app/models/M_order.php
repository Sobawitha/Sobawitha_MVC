<?php

class M_order
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function createCOD($orderdata)
    {
        
        $this->db->beginTransaction();

        $this->db->query("INSERT INTO buyer_orders(cust_id,payment_type) VALUES(:cust_id,:payment_type)");
        $this->db->bind(":payment_type","COD");
      
        $this->db->bind(':cust_id', $_SESSION['user_id']);

        $result = $this->db->execute();
        if (!$result) {
            $this->db->rollBack();
            return false;
        }
   
        $order_id = $this->db->lastInsertId();

         // Insert records into the `order_items` table
         for ($i = 0; $i < count($orderdata); $i++) {
            $this->db->query("INSERT INTO buyer_order_items(order_id, product_id, price, quantity, user_id) VALUES(:order_id, :product_id, :price, :quantity, :user_id)");
            
            $this->db->bind(':order_id', $order_id);
            $this->db->bind(':product_id', $orderdata[$i]->Product_id);
            $this->db->bind(':price', $orderdata[$i]->product_price);
            $this->db->bind(':quantity', $orderdata[$i]->quantity);
            $this->db->bind(':user_id', $_SESSION['user_id']);
            $result = $this->db->execute();
            if (!$result) {
                $this->db->rollBack();
                return false;
            }

            // $this->db-query("UPDATE TABLE fertilizer  SET quantity = :quantity WHERE Product_id = :product_id");
            $this->db->query("SELECT quantity FROM fertilizer WHERE Product_id = :product_id");
            $this->db->bind(":product_id", $orderdata[$i]->Product_id);
            $result = $this->db->single();
            $current_quantity = $result->quantity;
          
            // if ($current_quantity < $orderdata[$i]->quantity) {
            //     // Return an error or throw an exception to indicate that the order cannot be fulfilled due to insufficient stock
            //     $this->db->rollBack();
            //     return false;
            // }
         //check this logic later with group members
            $this->db->query("UPDATE  fertilizer SET quantity = quantity -:order_quantity WHERE Product_id = :product_id");
            $this->db->bind(":product_id",$orderdata[$i]->Product_id);
            $this->db->bind(":order_quantity",$orderdata[$i]->quantity);

            if(!($this->db->execute())){
                $this->db->rollBack();
                 return false;
            }

            $this->db->query("SELECT created_by FROM fertilizer WHERE Product_id = :product_id");
            $this->db->bind(":product_id", $orderdata[$i]->Product_id);
            $result = $this->db->single();
            $created_by = $result->created_by;

            $this->db->query("INSERT INTO payments (payer_id,order_id,total_fee,payee_fee,payee_id,profit) VALUES (:payer_id,:order_id,:total_fee,:payee_fee,:payee_id,:profit)");
            $this->db->bind(":payer_id", $_SESSION['user_id']);
            $this->db->bind(":order_id", $order_id);
            $this->db->bind(":total_fee", $orderdata[$i]->product_price*$orderdata[$i]->quantity);
            $this->db->bind(":payee_fee", $orderdata[$i]->product_price*$orderdata[$i]->quantity*0.9);
            $this->db->bind(":payee_id", $created_by);
            $this->db->bind(":profit", $orderdata[$i]->product_price*$orderdata[$i]->quantity*0.1);
            if(!($this->db->execute())){
                $this->db->rollBack();
                 return false;
            }
 
          
        
          
        // }
    
        }
         
         
        // // Commit the transaction
        $this->db->commit();

        $this->db->query("SELECT * from user WHERE user_id = :user_id");
        $this->db->bind(":user_id", $_SESSION['user_id']);
        $result = $this->db->single();
        $payer_email = $result->email;
        $payer_name = $result->first_name;
        $payer_password = $result->password;

     
        return true;

        




    }



    



    

    public function createOnlineOrder($data) {
        $this->db->beginTransaction();
         
        
        // Insert a record into the `order_products` table
        $this->db->query("INSERT INTO buyer_orders(cust_id,payment_type) VALUES(:cust_id,:payment_type)");

        $this->db->bind(':cust_id', $_SESSION['user_id']);
        $this->db->bind(':payment_type',"Online");
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
        $this->db->query("SELECT * from user WHERE user_id = :user_id");
        $this->db->bind(":user_id", $_SESSION['user_id']);
        $result = $this->db->single();
        $payer_email = $result->email;
        $payer_name = $result->first_name;
        $payer_password = $result->password;

        // if(sendmail($payer_email,$payer_name,$order_id,4,$payer_password));
        // {
        //     return true;
        // }
        return true;
    
       
    }
    

}

?>