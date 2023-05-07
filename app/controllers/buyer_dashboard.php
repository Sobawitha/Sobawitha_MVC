<?php


class buyer_dashboard extends controller{

private $buyerModel;

public function   __construct()
{
 
  
    $this->buyerModel = $this->model('M_buyer');




}

public function getTotalReviews(){

  $this->db->query("SELECT COUNT()");


}


public function getTotalPurchases(){


  $this->db->query('SELECT COUNT(Product_id) as total_completed_orders FROM orders WHERE status = 1 AND created_at BETWEEN DATE_SUB(NOW(), INTERVAL 1 MONTH) AND NOW()');
     
  $row= $this->db->single();

  if($this->db->rowCount() >0){
        return $row;
  }
  else
  {
        return false;
  }


}





public function getTotalPurchasesTotal(){









  
}
public function  fertilizer_type_donut_chart()
{

  $fertilizer_type_details =  $this->buyerModel->get_fertilizer_type_details();
  $fertilizer_crop_type_details =  $this->buyerModel->get_fertilizer_crop_type_details();
   if($fertilizer_type_details)
   {
    $response  = [
   "fertilizer_type_details" => $fertilizer_type_details,
   "crop_type_details" => $fertilizer_crop_type_details,
   "success" => true
   ];
    header('Content-Type: application/json');
    echo json_encode($response);




   }
    else
    {
     $response  = [
    "message" => "No data found"
    ,
    "success" => false
     ];

     header('Content-Type: application/json');
     echo json_encode($response);


}


}

















}




?>