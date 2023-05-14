<?php

class M_wishlist
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();

    }

    public function findByWishlistId($pro_id)
    {

        // $this->db->query("SELECT wishlist.*, fertilizer.fertilizer_img FROM wishlist inner join fertilizer on fertilizer.product_id = wishlist.Product_id WHERE User_id = :user_id AND Product_id = :product_id");
        $this->db->query("SELECT wishlist.*, fertilizer.fertilizer_img FROM wishlist inner join fertilizer on fertilizer.product_id = wishlist.Product_id WHERE User_id = :user_id");
        $this->db->bind(':user_id', $_SESSION['user_id']);
        // $this->db->bind(':product_id', $pro_id);
        $wishlist = $this->db->single();

        if ($wishlist) {
            return true;
        } else {
            return false;

        }

    }

    public function insertItem($pro_id)
    {

        //echo ($pro_id);
        $this->db->query("insert into wishlist(User_id,Product_id, CreatedAt) values (:user_id,:product_id,:now)");
        $this->db->bind(':now', date('Y-m-d'));
        $this->db->bind(':user_id', $_SESSION['user_id']);
        $this->db->bind(':product_id', $pro_id);
        $this->db->execute();
        return;
    }

    public function deleteItem($pro_id)
    {

        $this->db->query("DELETE FROM wishlist WHERE User_id = :user_id AND Product_id = :product_id");
        $this->db->bind(':user_id', $_SESSION['user_id']);
        $this->db->bind(':product_id', $pro_id);
        $this->db->execute();
        return;

    }

    public function getAllItems()
    {

        $this->db->query("SELECT wishlist.*,fertilizer.fertilizer_img,fertilizer.manufacturer,fertilizer.product_name,fertilizer.price FROM fertilizer INNER JOIN wishlist ON wishlist.Product_id = fertilizer.Product_id WHERE wishlist.User_id = :user_id");
        if(isset($_SESSION['user_id'])){
            $this->db->bind(':user_id', $_SESSION['user_id']);
        }else{
            $this->db->bind(':user_id', 0);
        }
        
        return $this->db->resultSet();

    }


    

}
