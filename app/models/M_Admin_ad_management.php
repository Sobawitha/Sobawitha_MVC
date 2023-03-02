<?php
    class M_Admin_ad_management{
    private $db;

    public function __construct(){
        $this->db = new Database();
    }
    
    public function getProducts(){
        
      $this->db->query('SELECT fertilizer.*, fertilizer.fertilizer_img as listing_image FROM fertilizer');
      $fertilizer =$this->db->resultSet();
      $this->db->query('SELECT raw_material.*, raw_material.raw_material_image as listing_image FROM raw_material ');
      $raw_materials =$this->db->resultSet();
      $allProducts = array_merge($fertilizer, $raw_materials);
      
       return $allProducts;
    }

}