<?php

class M_raw_material_orders
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

   
    public function view_cart(){
        $this->db->query("SELECT cart.*, raw_material.price, raw_material.product_name, raw_material.raw_material_image, raw_material.quantity as stock_quantity from cart inner join raw_material on raw_material.product_id =  cart.product_id WHERE cart.user_id = :user_id");
        $this->db->bind(":user_id", $_SESSION['user_id']);
        return $this->db->resultset();
    }

}

?>