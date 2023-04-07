<?php
    class M_Admin_ad_management{
    private $db;

    public function __construct(){
        $this->db = new Database();
    }
    
    // public function getProducts(){
        
    //   $this->db->query('SELECT fertilizer.*, fertilizer.fertilizer_img as listing_image FROM fertilizer');
    //   $fertilizer =$this->db->resultSet();
    //   $this->db->query('SELECT raw_material.*, raw_material.raw_material_image as listing_image FROM raw_material ');
    //   $raw_materials =$this->db->resultSet();
    //   $allProducts = array_merge($fertilizer, $raw_materials);
      
    //    return $allProducts;
    // }
  
    public function display_all_ads(){
        if(isset($_POST['ad_type']) && !empty($_POST['ad_type'])){
            if ($_POST['ad_type'] == 'pending_ads'){            
                $this->db->query('SELECT fertilizer.*, fertilizer.fertilizer_img as listing_image FROM fertilizer WHERE review_status =0');
                  $fertilizer =$this->db->resultSet();
                  $this->db->query('SELECT raw_material.*, raw_material.raw_material_image as listing_image FROM raw_material WHERE review_status =0 ');
                  $raw_materials =$this->db->resultSet();
                  $allProducts = array_merge($fertilizer, $raw_materials);
                  
                   return $allProducts; 
            }
            if ($_POST['ad_type'] == 'reviewed_ads'){
                $this->db->query('SELECT fertilizer.*, fertilizer.fertilizer_img as listing_image FROM fertilizer WHERE review_status =1');
                $fertilizer =$this->db->resultSet();
                $this->db->query('SELECT raw_material.*, raw_material.raw_material_image as listing_image FROM raw_material WHERE review_status =1');
                $raw_materials =$this->db->resultSet();
                $allProducts = array_merge($fertilizer, $raw_materials);
                
                return $allProducts; 
            }
            if ($_POST['ad_type'] == 'rejected_ads'){
                $this->db->query('SELECT fertilizer.*, fertilizer.fertilizer_img as listing_image FROM fertilizer WHERE review_status =2');
                $fertilizer =$this->db->resultSet();
                $this->db->query('SELECT raw_material.*, raw_material.raw_material_image as listing_image FROM raw_material WHERE review_status =2');
                $raw_materials =$this->db->resultSet();
                $allProducts = array_merge($fertilizer, $raw_materials);
                
                return $allProducts; 
            }
  
        }else{
            $this->db->query('SELECT fertilizer.*, fertilizer.fertilizer_img as listing_image FROM fertilizer WHERE review_status =0');
            $fertilizer =$this->db->resultSet();
            $this->db->query('SELECT raw_material.*, raw_material.raw_material_image as listing_image FROM raw_material WHERE review_status =0 ');
            $raw_materials =$this->db->resultSet();
            $allProducts = array_merge($fertilizer, $raw_materials);
            
             return $allProducts;
        }
                  
    }



    // public function getSearchAds($search)
    // {
    // $this->db->query("SELECT fertilizer.*, fertilizer.fertilizer_img as listing_image FROM fertilizer WHERE 
    //  fertilizer.product_name LIKE '%$search%'
    // ");

    // $fertilizers = $this->db->resultSet();

    // $this->db->query("SELECT raw_material.*, raw_material.raw_material_image as listing_image FROM raw_material WHERE
    // raw_material.product_name LIKE '%$search%' ");

    // $raw_materials = $this->db->resultSet();

    // $result = array_merge($fertilizers, $raw_materials);

    // return $result;
    // }

    public function getSearchAds($search)
    {
        $search = strtolower(str_replace(' ', '', $search));
        $this->db->query("SELECT fertilizer.*, fertilizer.fertilizer_img as listing_image FROM fertilizer WHERE 
         REPLACE(LOWER(fertilizer.product_name), ' ', '') LIKE '%$search%'
        ");
    
        $fertilizers = $this->db->resultSet();
    
        $this->db->query("SELECT raw_material.*, raw_material.raw_material_image as listing_image FROM raw_material WHERE
        REPLACE(LOWER(raw_material.product_name), ' ', '') LIKE '%$search%' ");
    
        $raw_materials = $this->db->resultSet();
    
        $result = array_merge($fertilizers, $raw_materials);
    
        return $result;
    }
 }