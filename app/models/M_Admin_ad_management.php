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
  
    // public function display_all_ads(){
    //     if(isset($_POST['ad_type']) && !empty($_POST['ad_type'])){
    //         if ($_POST['ad_type'] == 'pending_ads'){            
    //             $this->db->query('SELECT fertilizer.*, fertilizer.fertilizer_img as listing_image FROM fertilizer WHERE current_status =0');
    //               $fertilizer =$this->db->resultSet();
    //               $this->db->query('SELECT raw_material.*, raw_material.raw_material_image as listing_image FROM raw_material WHERE current_status =0 ');
    //               $raw_materials =$this->db->resultSet();
    //               $allProducts = array_merge($fertilizer, $raw_materials);
                  
    //                return $allProducts; 
    //         }
    //         if ($_POST['ad_type'] == 'reviewed_ads'){
    //             $this->db->query('SELECT fertilizer.*, fertilizer.fertilizer_img as listing_image FROM fertilizer WHERE current_status =1');
    //             $fertilizer =$this->db->resultSet();
    //             $this->db->query('SELECT raw_material.*, raw_material.raw_material_image as listing_image FROM raw_material WHERE current_status =1');
    //             $raw_materials =$this->db->resultSet();
    //             $allProducts = array_merge($fertilizer, $raw_materials);
                
    //             return $allProducts; 
    //         }
    //         if ($_POST['ad_type'] == 'rejected_ads'){
    //             $this->db->query('SELECT fertilizer.*, fertilizer.fertilizer_img as listing_image FROM fertilizer WHERE current_status =2');
    //             $fertilizer =$this->db->resultSet();
    //             $this->db->query('SELECT raw_material.*, raw_material.raw_material_image as listing_image FROM raw_material WHERE current_status =2');
    //             $raw_materials =$this->db->resultSet();
    //             $allProducts = array_merge($fertilizer, $raw_materials);
                
    //             return $allProducts; 
    //         }
  
    //     }else{
    //         $this->db->query('SELECT fertilizer.*, fertilizer.fertilizer_img as listing_image FROM fertilizer WHERE current_status =0');
    //         $fertilizer =$this->db->resultSet();
    //         $this->db->query('SELECT raw_material.*, raw_material.raw_material_image as listing_image FROM raw_material WHERE current_status =0 ');
    //         $raw_materials =$this->db->resultSet();
    //         $allProducts = array_merge($fertilizer, $raw_materials);
            
    //          return $allProducts;
    //     }
                  
    // }
    // public function display_all_ads(){
    //     if(isset($_POST['ad_type']) && !empty($_POST['ad_type'])){
    //         if ($_POST['ad_type'] == 'pending_ads'){            
    //             $this->db->query('SELECT fertilizer.*, fertilizer.fertilizer_img as listing_image FROM fertilizer WHERE current_status =0');
    //             $fertilizer = $this->db->resultSet();
    //             $this->db->query('SELECT raw_material.*, raw_material.raw_material_image as listing_image FROM raw_material WHERE current_status =0 ');
    //             $raw_materials = $this->db->resultSet();
    //             $allProducts = array_merge($fertilizer, $raw_materials);
    //             $total_rows = count($fertilizer) + count($raw_materials);
    //             return array('products' => $allProducts, 'total_rows' => $total_rows); 
    //         }
    //         if ($_POST['ad_type'] == 'reviewed_ads'){
    //             $this->db->query('SELECT fertilizer.*, fertilizer.fertilizer_img as listing_image FROM fertilizer WHERE current_status =1');
    //             $fertilizer = $this->db->resultSet();
    //             $this->db->query('SELECT raw_material.*, raw_material.raw_material_image as listing_image FROM raw_material WHERE current_status =1');
    //             $raw_materials = $this->db->resultSet();
    //             $allProducts = array_merge($fertilizer, $raw_materials);
    //             $total_rows = count($fertilizer) + count($raw_materials);
    //             return array('products' => $allProducts, 'total_rows' => $total_rows); 
    //         }
    //         if ($_POST['ad_type'] == 'rejected_ads'){
    //             $this->db->query('SELECT fertilizer.*, fertilizer.fertilizer_img as listing_image FROM fertilizer WHERE current_status =2');
    //             $fertilizer = $this->db->resultSet();
    //             $this->db->query('SELECT raw_material.*, raw_material.raw_material_image as listing_image FROM raw_material WHERE current_status =2');
    //             $raw_materials = $this->db->resultSet();
    //             $allProducts = array_merge($fertilizer, $raw_materials);
    //             $total_rows = count($fertilizer) + count($raw_materials);
    //             return array('products' => $allProducts, 'total_rows' => $total_rows); 
    //         }
    //     } else {
    //         $this->db->query('SELECT fertilizer.*, fertilizer.fertilizer_img as listing_image FROM fertilizer WHERE current_status =0');
    //         $fertilizer = $this->db->resultSet();
    //         $this->db->query('SELECT raw_material.*, raw_material.raw_material_image as listing_image FROM raw_material WHERE current_status =0 ');
    //         $raw_materials = $this->db->resultSet();
    //         $allProducts = array_merge($fertilizer, $raw_materials);
    //         $total_rows = count($fertilizer) + count($raw_materials);
    //         return array('products' => $allProducts, 'total_rows' => $total_rows);
    //     }
    // }
    

    public function display_all_ads() {
        if (isset($_POST['ad_type']) && !empty($_POST['ad_type'])) {
            if ($_POST['ad_type'] == 'pending_ads') {
                $this->db->query('SELECT fertilizer.*, fertilizer.fertilizer_img as listing_image, CONCAT(user.first_name, " ", user.last_name) as seller_name , user.address_line_four as location FROM fertilizer INNER JOIN user ON fertilizer.created_by = user.user_id WHERE fertilizer.current_status = 0');
                $fertilizer = $this->db->resultSet();
                $this->db->query('SELECT raw_material.*, raw_material.raw_material_image as listing_image, CONCAT(user.first_name, " ", user.last_name) as seller_name, user.address_line_four as location FROM raw_material INNER JOIN user ON raw_material.created_by = user.user_id WHERE raw_material.current_status = 0');
                $raw_materials = $this->db->resultSet();
                $allProducts = array_merge($fertilizer, $raw_materials);
                $total_rows = count($fertilizer) + count($raw_materials);
                return array('products' => $allProducts, 'total_rows' => $total_rows);
            }
            if ($_POST['ad_type'] == 'reviewed_ads') {
                $this->db->query('SELECT fertilizer.*, fertilizer.fertilizer_img as listing_image, CONCAT(user.first_name, " ", user.last_name) as seller_name, user.address_line_four as location FROM fertilizer INNER JOIN user ON fertilizer.created_by = user.user_id WHERE fertilizer.current_status = 1');
                $fertilizer = $this->db->resultSet();
                $this->db->query('SELECT raw_material.*, raw_material.raw_material_image as listing_image, CONCAT(user.first_name, " ", user.last_name) as seller_name, user.address_line_four as location FROM raw_material INNER JOIN user ON raw_material.created_by = user.user_id WHERE raw_material.current_status = 1');
                $raw_materials = $this->db->resultSet();
                $allProducts = array_merge($fertilizer, $raw_materials);
                $total_rows = count($fertilizer) + count($raw_materials);
                return array('products' => $allProducts, 'total_rows' => $total_rows);
            }
            if ($_POST['ad_type'] == 'rejected_ads') {
                $this->db->query('SELECT fertilizer.*, fertilizer.fertilizer_img as listing_image, CONCAT(user.first_name, " ", user.last_name) as seller_name, user.address_line_four as location FROM fertilizer INNER JOIN user ON fertilizer.created_by = user.user_id WHERE fertilizer.current_status = 2');
                $fertilizer = $this->db->resultSet();
                $this->db->query('SELECT raw_material.*, raw_material.raw_material_image as listing_image, CONCAT(user.first_name, " ", user.last_name) as seller_name, user.address_line_four as location FROM raw_material INNER JOIN user ON raw_material.created_by = user.user_id WHERE raw_material.current_status = 2');
                $raw_materials = $this->db->resultSet();
                $allProducts = array_merge($fertilizer, $raw_materials);
                $total_rows = count($fertilizer) + count($raw_materials);
                return array('products' => $allProducts, 'total_rows' => $total_rows);
            }
        } else {
            $this->db->query('SELECT fertilizer.*, fertilizer.fertilizer_img as listing_image, CONCAT(user.first_name, " ", user.last_name) as seller_name, user.address_line_four as location FROM fertilizer INNER JOIN user ON fertilizer.created_by = user.user_id WHERE fertilizer.current_status = 0');
            $fertilizer = $this->db->resultSet();
            $this->db->query('SELECT raw_material.*, raw_material.raw_material_image as listing_image, CONCAT(user.first_name, " ", user.last_name) as seller_name, user.address_line_four as location FROM raw_material INNER JOIN user ON raw_material.created_by = user.user_id WHERE raw_material.current_status = 0');
            $raw_materials = $this->db->resultSet();
            $allProducts = array_merge($fertilizer, $raw_materials);
            $total_rows = count($fertilizer) + count($raw_materials);
            return array('products' => $allProducts, 'total_rows' => $total_rows);
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
        
        $total_fertilizers = count($fertilizers);
        $total_raw_materials = count($raw_materials);
        $total_rows = $total_fertilizers + $total_raw_materials;
        
        return array("ads" => $result, "total_rows" => $total_rows);
    }

    public function reviewAd($product_id,$category)
    {   
        if(stripos(strtolower($category), 'fertilizer') !== false){
            $this->db->query('UPDATE fertilizer set current_status=1, Admin_Id= :admin WHERE Product_id = :id');
            $this->db->bind(':id',$product_id);
            $this->db->bind(':admin',$_SESSION['user_id']);
        }else if ((stripos(strtolower($category), 'raw_material') !== false)){
            $this->db->query('UPDATE raw_material set current_status=1, Admin_Id= :admin WHERE Product_id = :id');
            $this->db->bind(':id',$product_id);
            $this->db->bind(':admin',$_SESSION['user_id']);
        }
       
  
        if($this->db->execute()){
           return true;
        }else{
            return false;
        }    
    } 

    public function rejectAd($product_id, $category) {
        if (stripos(strtolower($category), 'fertilizer') !== false) {
            $this->db->query('UPDATE fertilizer SET current_status = 2, Admin_Id = :admin WHERE Product_id = :id');
            $this->db->bind(':id', $product_id);
            $this->db->bind(':admin', $_SESSION['user_id']);
        } else if (stripos(strtolower($category), 'raw_material') !== false) {
            $this->db->query('UPDATE raw_material SET current_status = 2, Admin_Id = :admin WHERE Product_id = :id');
            $this->db->bind(':id', $product_id);
            $this->db->bind(':admin', $_SESSION['user_id']);
        }
    
        // $this->db->query('INSERT INTO admin_manage_ads(category, rejected_reason, product_id) VALUES (:category, :rejected_reason, :id)');
        // $this->db->bind(':category', $category);
        // $this->db->bind(':rejected_reason', $rejected_reason);
        // $this->db->bind(':id', $product_id);
       
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
    
    
    
 }