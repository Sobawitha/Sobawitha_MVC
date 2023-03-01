<?php
    class M_Admin_dashboard{
    private $db;

    public function __construct(){
        $this->db = new Database();
    }

    public function getTotalSellers()
    {
      $this->db->query('SELECT COUNT(user_id) as total_seller_count FROM user WHERE user_flag="3"');
     
      $row= $this->db->single();

      if($this->db->rowCount() >0){
            return $row;
      }else{
            return false;
      }
    } 

    public function getTotalSuppliers()
    {
      $this->db->query('SELECT COUNT(user_id) as total_supplier_count FROM user WHERE user_flag="4"');
     
      $row= $this->db->single();

      if($this->db->rowCount() >0){
            return $row;
      }else{
            return false;
      }
    } 

    public function getTotalAgrio()
    {
      $this->db->query('SELECT COUNT(user_id) as total_agrio_count FROM user WHERE user_flag="5"');
     
      $row= $this->db->single();

      if($this->db->rowCount() >0){
            return $row;
      }else{
            return false;
      }
    } 

    public function getTotalFertilizerAds()
    {
      $this->db->query('SELECT COUNT(Product_id) as total_fertilizer_adds_count FROM fertilizer WHERE date BETWEEN DATE_SUB(NOW(), INTERVAL 1 MONTH) AND NOW()');
     
      $row= $this->db->single();

      if($this->db->rowCount() >0){
            return $row;
      }else{
            return false;
      }
    } 

    public function getTotalProfit()
    {
      $this->db->query('SELECT SUM(profit) as total_profit FROM payments WHERE date >= DATE_SUB(NOW(), INTERVAL 1 MONTH)');
     
      $row= $this->db->single();

      if($this->db->rowCount() >0){
            return $row;
      }else{
            return false;
      }
    }

    public function getTotalComplaints()
    {
      $this->db->query('SELECT COUNT(complaint_id) as total_complaints FROM complaint WHERE date BETWEEN DATE_SUB(NOW(), INTERVAL 1 MONTH) AND NOW()');
     
      $row= $this->db->single();

      if($this->db->rowCount() >0){
            return $row;
      }else{
            return false;
      }
    }


}