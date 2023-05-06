<?php


class buyer_dashboard extends controller{

private $buyerModel;

public function   __construct()
{
 
  
    $this->buyerModel = $this->model('M_buyer');




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