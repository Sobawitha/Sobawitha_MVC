<?php
    class M_seller_ad_management{
    private $db;

    public function __construct(){
        $this->db = new Database();
    }


    public function add_fertilizer_advertisment($data)
    {
        //  print_r ($data);die();
        $this->db->query('INSERT INTO fertilizer (product_name, quantity, manufacturer, price, product_description, category, certificate_no, current_status,created_by,fertilizer_img, location) values (:product_name, :quantity, :manufacturer, :price, :product_description, :category, :certificate_no, :current_status, :created_by, :fertilizer_img, :location)');

        $this->db->bind(":product_name", $data['product_name']);
        $this->db->bind(":category", $data['category']);
        $this->db->bind(":certificate_no", $data['certificate_no']);
        $this->db->bind(":manufacturer", $data['manufacturer']);
        $this->db->bind(":product_description", $data['description']);
        $this->db->bind(":price", $data['price']);
        $this->db->bind(":quantity", $data['quantity']);
        $this->db->bind(":fertilizer_img", $data['fertilizer_image_name']);
        $this->db->bind(":location", $data['location']);
        $this->db->bind(":current_status", $data['current_status']);
        $this->db->bind(":created_by", $data ['created_by']);


        if($this->db->execute()){
            return true;
        }
        else{
            return false;
        }

    }

    public function display_pending_advertisement(){
        $this->db->query('SELECT * FROM fertilizer WHERE created_by =:userid');
        $this->db->bind(':userid', $_SESSION['user_id']);

        return $this->db->resultSet();
    }


    public function delete_advertisment($advertisementid){
        $this->db->query('DELETE FROM fertilizer WHERE product_id =:advertisementid');
        $this->db->bind(':advertisementid', $advertisementid);
        if($this->db->execute()){
            return true;
        }
        else{
            return false;
        }
    }

    public function get_fertilizer_details($fertilizer_id){
        $this->db->query('SELECT *  FROM fertilizer WHERE Product_id = :product_id');
        $this->db->bind(':product_id',$fertilizer_id);
        return $this->db->single();
    }
    

    public function get_all_fertilizer_details(){

        $this->db->query('SELECT *  FROM fertilizer');
        return $this->db->resultSet();
        
    }


    public function customized_query($data){
       
        $this->db->query($data);
        return $this->db->resultSet();

    }
//    public   function generateQuery( $columns, $condition) {
//         $query = "SELECT ";
//         if ($columns == '*') {
//             $query .= "*";
//         } else {
//             $query .= implode(",", $columns);
//         }
//         $query .= " FROM  fertilizer" ;
//         if (!empty($condition)) {
//             $query .= " WHERE " . $condition;
//         }
//         $this->db->query($query);
        
//         return  $query;
//     }


     public function  get_manufacturer_names()
     {



        $this->db->query('SELECT DISTINCT manufacturer FROM fertilizer');
        return $this->db->resultSet();
     }
 

     public function  searchResults($keyword){
    
         $query = "SELECT * FROM fertilizer WHERE product_name LIKE :key OR product_description LIKE :key";
        $this->db->query($query);
        $this->db->bind(":key", $keyword);
        $fetched_results =  $this->db->resultSet();
       

        return $fetched_results;
     }
}
?>