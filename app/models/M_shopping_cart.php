<?php

class M_shopping_cart
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }


    
    public function insertItem($pro_id){


        $this->db->query("INSERT INTO cart (Product_id,User_id,quantity,CreatedAt) VALUES (:Product_id,:user_id,1,NOW())");
        $this->db->bind(':Product_id',$pro_id);
        $this->db->bind(':user_id',$_SESSION['user_id']);
        $this->db->execute();
        return;
        


    }


    public function getAllItems(){


        $this->db->query("SELECT  cart.*,fertilizer.product_name as product_name,fertilizer.price as product_price,fertilizer.fertilizer_img as product_img from cart INNER JOIN fertilizer ON fertilizer.Product_id = cart.Product_id WHERE cart.user_id = :user_id");
        $this->db->bind(':user_id',$_SESSION['user_id']);
        $cart =  $this->db->resultSet();
        return $cart;

    }


    public function deleteItem($pro_id){

        $this->db->query("DELETE FROM cart WHERE Product_id = :pro_id AND user_id = :user");
        $this->db->bind(':pro_id',$pro_id);

        $this->db->bind(':user',$_SESSION['user_id']);
        $this->db->execute();
        return ;

    }


    public function updateItem($pro_id,$quantity)

    {
 
         $this->db->query("UPDATE cart SET quantity = :quantity WHERE Product_id = :pro_id AND User_id = :user");
         $this->db->bind(':pro_id',$pro_id);
         $this->db->bind(':quantity',$quantity);
         $this->db->bind(':user',$_SESSION['user_id']);
         $this->db->execute();
         return true;
         

    }


    public function clearAll()
    {

        $this->db->query("DELETE FROM cart where User_id = :user");
        $this->db->bind(':user',$_SESSION['user_id']);
        $this->db->execute();
        return true;

    }


    public function findByCartId($pro_id)
    {
      
        $this->db->query("SELECT * FROM cart WHERE User_id = :user AND Product_id = :pro_id");
        $this->db->bind(':user',$_SESSION['user_id']);
        $this->db->bind(':pro_id',$pro_id);
        $cart =  $this->db->resultSet();
        if($cart)
        {
            return true;
        }

        else

        {

            return false;

        }

    
        
    }
    
}


?>