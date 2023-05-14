<?php
    class M_Buyer{
    private $db;

        public function __construct(){
            $this->db = new Database();
        }

        //Find user by email
    public function findUserByEmail($email)
    {
      $this->db->query('SELECT * FROM user WHERE email= :email');
      $this->db->bind(':email',$email);  

      $row= $this->db->single();

      if($this->db->rowCount() >0){
            return true;
      }else{
            return false;
      }
    }

    public function findSameNic($nic)
     {
       $this->db->query('SELECT * FROM user WHERE nic_no= :nic');
       $this->db->bind(':nic',$nic);  
 
       $row= $this->db->single();
 
       if($this->db->rowCount() >0){
             return true;
       }else{
             return false;
       }
     }

    // Add Admin

    public function  addBuyer($data)
    {
        $this->db->query('INSERT INTO user(first_name,last_name,email,user_flag,contact_no,nic_no,dob,profile_picture,address_line_one,address_line_two,address_line_three,address_line_four,qualifications,gender,password,verify_token) VALUES (:first_name,:last_name,:email,:user_flag,:contact_no,:nic,:dob,:propic,:address_line_one,:address_line_two,:address_line_three,:address_line_four,:qualifications,:gender,:password, :verify_token)');
        $this->db->bind(':first_name',$data['first_name']);
        $this->db->bind(':last_name', $data['last_name']);
        $this->db->bind(':email', $data['email']);
        $this->db->bind(':user_flag', 2);
        $this->db->bind(':contact_no',$data['contact_number']);
        $this->db->bind(':nic', $data['nic']);
        $this->db->bind(':dob',$data['birthday']);
   //     $this->db->bind(':profile_picture',$data['profile_pic_name']);
        $this->db->bind(':propic',$data['propic_name']);
        $this->db->bind(':address_line_one', $data['address_line_one']);
        $this->db->bind(':address_line_two', $data['address_line_two']);
        $this->db->bind(':address_line_three', $data['address_line_three']);
        $this->db->bind(':address_line_four', $data['address_line_four']);
        $this->db->bind(':qualifications','');
        $this->db->bind(':gender', $data['gender']);
        $this->db->bind(':password',$data['password']);
        $this->db->bind(':verify_token',$data['verify_token']);
     
       
        if($this->db->execute()){
            return true;
        }else{
            return false;
        }    
} 
    
    public function get_fertilizer_type_details(){

        $this->db->query("SELECT f.type, COUNT(*) AS count
        FROM buyer_orders o
        JOIN buyer_order_items oi ON o.order_id = oi.order_id
        JOIN fertilizer f ON oi.product_id = f.Product_id
        WHERE o.cust_id = :user_id
        AND o.status = '1'
        GROUP BY f.type;");
        $this->db->bind(":user_id",$_SESSION['user_id']);
        $result = $this->db->resultSet();
        if($this->db->rowCount() > 0){
            return $result;
        }
        else{      


            return false;
        }



}
    public  function get_fertilizer_crop_type_details()
{
    $this->db->query("SELECT f.crop_type, COUNT(*) AS count
    FROM buyer_orders o
    JOIN buyer_order_items oi ON o.order_id = oi.order_id
    JOIN fertilizer f ON oi.product_id = f.Product_id
    WHERE o.cust_id = :user_id
    AND o.status = '1'
    GROUP BY f.crop_type;");
    $this->db->bind(":user_id",$_SESSION['user_id']);
    $result = $this->db->resultSet();
    if($this->db->rowCount() > 0){
        return $result;
    }
    else{
 

return false;




}


}



    public function findUserByID($id)
    {
      $this->db->query('SELECT * FROM user WHERE user_id= :id');
      $this->db->bind(':id',$id);  

      $row= $this->db->single();

      if($this->db->rowCount() >0){
            return $row;
      }else{
            return false;
      }
     }

     public function deactivateUser($user_id)
     {
         $this->db->query('UPDATE user set active_status=0 WHERE user_id = :id');
         $this->db->bind(':id',$user_id);
 
         if($this->db->execute()){
            return true;
         }else{
             return false;
         }    
     } 

     public function deleteProPic($user_id,$user_gender)
    {
        if($user_gender=='m'|| $user_gender=='M'){
            $this->db->query('UPDATE user set profile_picture="Men_Default_Avatar.png" WHERE user_id = :id');
            $this->db->bind(':id',$user_id);
            $_SESSION['profile_image']="Men_Default_Avatar.png";
            $_SESSION['profile_image_path'] = "upload/user_profile_pics/" .  $_SESSION['profile_image'];
        }else{
            $this->db->query('UPDATE user set profile_picture="Women_Default_Avatar.png" WHERE user_id = :id');
            $this->db->bind(':id',$user_id);
            $_SESSION['profile_image']="Women_Default_Avatar.png";
            $_SESSION['profile_image_path'] = "upload/user_profile_pics/" .  $_SESSION['profile_image'];
        }
       

        if($this->db->execute()){
           return true;
          
        }else{
            return false;
        }    
    } 
    
    public function updateProPic($data)
    {

         $this->db->query('UPDATE user set profile_picture = :propic WHERE user_id = :id');
         $this->db->bind(':id',$data['user_id']);
         $this->db->bind(':propic',$data['propic_name']);

        if($this->db->execute()){
            $_SESSION['profile_image']=$data['propic_name'];
            $_SESSION['profile_image_path'] = "upload/user_profile_pics/" .  $_SESSION['profile_image'];
           return true;
        }else{
            return false;
        }    
    } 

    public function updateBuyer($data){
        $this->db->query('UPDATE user set first_name=:first_name, last_name = :last_name, address_line_one =:address_line_one, address_line_two =:address_line_two, address_line_three =:address_line_three, address_line_four =:address_line_four,  nic_no = :nic, contact_no=:contact_number, dob =:dob  WHERE user_id = :id');
        $this->db->bind(':id', $data['user_id']);
        $this->db->bind(':first_name', $data['first_name']);
        $this->db->bind(':last_name',$data['last_name']);
        $this->db->bind(':address_line_one',$data['address_line_one']);
        $this->db->bind(':address_line_two',$data['address_line_two']);
        $this->db->bind(':address_line_three',$data['address_line_three']);
        $this->db->bind(':address_line_four',$data['address_line_four']);
        $this->db->bind(':nic', $data['nic']);
        $this->db->bind(':contact_number', $data['contact_number']);
        $this->db->bind(':dob', $data['birthday']);

       

        if($this->db->execute()){
          $_SESSION['username']=$data['first_name'];
          $_SESSION['lastname']=$data['last_name'];
            return true;
        }else{
            return false;
        } 
      }
      
    

      public function getOrderDetails($no){
      
       $this->db->query("SELECT fertilizer.*,buyer_order_items.quantity,buyer_orders.created_at,buyer_orders.order_id,CONCAT(user.first_name,' ',user.last_name) AS seller_name
FROM fertilizer
INNER JOIN buyer_order_items
ON fertilizer.Product_id = buyer_order_items.product_id
INNER JOIN buyer_orders
ON buyer_order_items.order_id = buyer_orders.order_id

INNER JOIN user
ON fertilizer.created_by =  user.user_id

WHERE buyer_orders.status = :no AND buyer_orders.cust_id = :user_id");
         $this->db->bind(":no",$no);
         $this->db->bind(":user_id",41);
         $result = $this->db->resultSet();
         if($this->db->rowCount() > 0){
              return $result;
         }
         else{
              return false;
         }
    }


    public function getOrderDetailsById($orderId){

     

        $this->db->query("SELECT buyer_orders.created_at,buyer_orders.order_id,CONCAT(user.first_name,' ',user.last_name) AS customer_name,CONCAT(user.address_line_one,' ',user.address_line_two,' ',user.address_line_three,' ',user.address_line_four) AS address, user.contact_no AS phone, user.email AS email
        FROM buyer_orders 
        INNER JOIN user
        ON buyer_orders.cust_id =  user.user_id
        
        WHERE buyer_orders.order_id = :OrderId  AND buyer_orders.cust_id= :user_id");
              $this->db->bind(":OrderId",$orderId);
              $this->db->bind(":user_id",$_SESSION['user_id']);
              $result = $this->db->single();
              if($this->db->rowCount() > 0){
                   return $result;
              }
              else{
                return $result;
              }











    }
          
    
    public function getOrderItemDetails($orderID){


        $this->db->query("SELECT 
      
    
        buyer_order_items.quantity, 
    
        fertilizer.product_name, 
        
        buyer_order_items.price
      FROM 
        buyer_order_items 
        INNER JOIN fertilizer ON buyer_order_items.product_id = fertilizer.Product_id 
        INNER JOIN buyer_orders ON buyer_order_items.order_id = :orderID
        INNER JOIN user ON buyer_orders.cust_id = :userID
      GROUP BY 
        :userID, 
        fertilizer.Product_id
      ");
              $this->db->bind(":orderID",$orderID);
              $this->db->bind(":userID",$_SESSION['user_id']);
              $result = $this->db->resultSet();
              if($this->db->rowCount() > 0){
                   return $result;
              }
              else{
                   return false;
              }




    }


    
 public function getOrderDetailsBySearch($searchText)
 {

    $search =  strtolower(str_replace(' ','',$searchText));
   

        $this->db->query("SELECT 
        fertilizer.*, 
        buyer_order_items.quantity, 
        buyer_orders.created_at, 
        buyer_orders.order_id, 
        CONCAT(user.first_name, ' ', user.last_name) AS seller_name
      FROM 
        fertilizer
        INNER JOIN buyer_order_items ON fertilizer.Product_id = buyer_order_items.product_id
        INNER JOIN buyer_orders ON buyer_order_items.order_id = buyer_orders.order_id
        INNER JOIN user ON fertilizer.created_by = user.user_id
      WHERE 
        (buyer_orders.status = 1 AND buyer_orders.cust_id = :user_id) AND 
        (
          LOWER(fertilizer.product_name) LIKE :search OR 
       
          
          LOWER(user.first_name) LIKE :search OR 
          LOWER(user.last_name) LIKE :search OR 
          LOWER(buyer_orders.order_id) LIKE :search OR 
          DATE(buyer_orders.created_at) LIKE :search
        )
      ");
        $this->db->bind(":user_id",$_SESSION['user_id']);
        $this->db->bind(":search","%".$search."%");
        $result = $this->db->resultSet();
        if($this->db->rowCount() > 0){
             return $result;
        }
        else{
             return false;
        }

    




    


 


 } 


 
 
public function getTotalReviews(){

  $this->db->query("SELECT COUNT(*) AS review_count FROM feedback WHERE sender_id = :user_id AND date BETWEEN DATE_SUB(NOW(), INTERVAL 1 MONTH) AND NOW() ");
  $this->db->bind(":user_id",$_SESSION["user_id"]);
  $row= $this->db->single();
  if($this->db->rowCount() >0){
    return $row;
}
else
{
    return false;
}


}


public function getTotalPurchases(){


  $this->db->query('SELECT COUNT(order_id) as total_completed_orders FROM buyer_orders WHERE status = 1 AND  cust_id = :cust_id AND created_at BETWEEN DATE_SUB(NOW(), INTERVAL 1 MONTH) AND NOW()');
  $this->db->bind(":cust_id",$_SESSION['user_id']);
  $row= $this->db->single();

  if($this->db->rowCount() >0){
        return $row;
  }
  else
  {
        return false;
  }


}

  /*for notifications */
  public function notifications(){
    $this->db->query("SELECT time, message, type, current_status
    FROM (
    SELECT time, message, type, current_status
    FROM notification_based_on_user_role
    WHERE user_role = 6 OR user_role = :user_role AND current_status = 0
    UNION
    SELECT time, message, type, current_status
    FROM notification_based_on_users
    WHERE user = :user_id AND current_status = 0
    ) AS combined_notifications  
    ORDER BY time DESC  LIMIT 3");
    $this->db->bind(":user_id", $_SESSION['user_id']);
    $this->db->bind(":user_role", $_SESSION['user_flag']);
    return $this->db->resultSet();
}


}





?>