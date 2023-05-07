<?php

class purchase extends Controller {
   
    private $buyerModel;
    public function __construct(){
        $this->buyerModel = $this->model('M_buyer');
    }

    public function display_all_purchases(){
        $data = [];
                                                                        
        $this->view('Buyer/Purchases/purchase_list',$data);
    }


    public function getOrderDetails($no){


      
        $orderdetails =  $this->buyerModel->getOrderDetails($no);
        header('Content-Type: application/json');
        if($orderdetails){
            echo json_encode($orderdetails);
    }
    else{
        echo json_encode("No data found");
    }
    }




}

?>