<?php
    class M_seller_ad_management{
    private $db;

    public function __construct(){
        $this->db = new Database();
    }


    public function add_fertilizer_advertisment($data)
    {
        //  print_r ($data);die();
        $this->db->query('INSERT INTO fertilizer (product_name, quantity, manufacturer, price, product_description, category, registration_no, date, current_status,created_by,fertilizer_img,img_two, img_three, img_four, img_five, crop_type, type ,avg_rating) values (:product_name, :quantity, :manufacturer, :price, :product_description, :category, :registration_no, NOW(), :current_status, :created_by, :fertilizer_img, :img_two, :img_three, :img_four, :img_five, :crop_type, :type, :avg_rating)');

        $this->db->bind(":product_name", $data['product_name']);
        $this->db->bind(":category", $data['category']);
        $this->db->bind(":registration_no", $data['registration_no']);
        $this->db->bind(":manufacturer", $data['manufacturer']);
        $this->db->bind(":product_description", $data['description']);
        $this->db->bind(":price", $data['price']);
        $this->db->bind(":quantity", $data['quantity']);
        $this->db->bind(":fertilizer_img", $data['image_1']);
        $this->db->bind(":img_two", $data['image_2']);
        $this->db->bind(":img_three", $data['image_3']);
        $this->db->bind(":img_four", $data['image_4']);
        $this->db->bind(":img_five", $data['image_5']);
        $this->db->bind(":current_status", $data['current_status']);
        $this->db->bind(":created_by", $data ['created_by']);
        $this->db->bind(":crop_type", $data ['crop_type'] );
        $this->db->bind(":type", $data ['type'] );
        $this->db->bind(":avg_rating", $data ['avg_rating'] );


        if($this->db->execute()){
            return true;
        }
        else{
            return false;
        }

    }

    public function display_advertisement($filter_type,$user_id){
        if(isset($filter_type) && !empty($filter_type)){
            if ($filter_type == 'pending_ads'){

                $this->db->query("SELECT * FROM fertilizer WHERE created_by =:userid AND current_status = 0");
                $this->db->bind(':userid', $_SESSION['user_id']);

                $result=$this->db->resultSet();
                return $result;
            }
            if ($filter_type == 'published_ads'){
                $this->db->query("SELECT * FROM fertilizer WHERE created_by =:userid AND current_status = 1");
                $this->db->bind(':userid', $_SESSION['user_id']);

                $result=$this->db->resultSet();
                return $result;
            }
            if ($filter_type == 'rejected_ads'){                
               
                $this->db->query("SELECT * FROM fertilizer WHERE created_by =:userid AND current_status = 2");
                $this->db->bind(':userid', $_SESSION['user_id']);

                $result=$this->db->resultSet();
                return $result;
            }
            
        } else {            
            $this->db->query("SELECT * FROM fertilizer WHERE created_by =:userid AND current_status = 0");
            $this->db->bind(':userid', $_SESSION['user_id']);

            $result=$this->db->resultSet();
            return $result;
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

    public function getAverageRating($id){
        $this->db->query('SELECT AVG(rating) AS average_rating FROM feedback WHERE receiver_id=:id AND feed_status=1');
        $this->db->bind(':id',$id);
              
        $row=$this->db->single();
        return $row->average_rating;
    }

    public function getSearchAds($userid, $search)
{
    $searchTerm = "%".str_replace(" ","%",$search)."%"; // Replace spaces with % for wildcard search
    $this->db->query("SELECT * FROM fertilizer WHERE LOWER(REPLACE(product_name, ' ', '')) LIKE LOWER(REPLACE(:search_term, ' ', '')) AND created_by = :user_id");
    $this->db->bind(':search_term', $searchTerm);  
    $this->db->bind(':user_id',$userid);  
    $result=$this->db->resultSet();
    return $result;   
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
 

     public function  searchResults($keyword){
    
         $query = "SELECT * FROM fertilizer WHERE product_name LIKE :key OR product_description LIKE :key";
        $this->db->query($query);
        $this->db->bind(":key", $keyword);
        $fetched_results =  $this->db->resultSet();
       

        return $fetched_results;
     }
}
?>