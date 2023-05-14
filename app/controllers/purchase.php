<?php

class purchase extends Controller {
   
    private $buyerModel, $notification_model;
    public function __construct(){
        $this->buyerModel = $this->model('M_buyer');
        $this->notification_model = $this->model('M_notifications');
    }

    public function display_all_purchases(){
        $no_of_notifications = $this->notification_model->find_notification_count()->total_count;
        $notifications = $this->notification_model->notifications();
        $data = [
            'no_of_notifications' =>$no_of_notifications,
            'notifications' => $notifications
        ];
                                                                        
        $this->view('Buyer/Purchases/purchase_list',$data);
    }


    public function generatePDF(){
       
            // Get the data for the report from the model
            $orderID = $_GET['order_id'];
           
        $order = $this->buyerModel->getOrderDetailsById($orderID);
        $order_items = $this->buyerModel->getOrderItemDetails($orderID);
        $sum = 0;
 
        // Generate the PDF report using the FPDF library
        require_once(APPROOT.'/fpdf/fpdf.php');
        $pdf = new FPDF();
        $pdf->AddPage('L','A4');
        
        $pdf->SetFont('Arial', 'B', 18);
        $pdf->Cell(0, 10, 'Sobawitha Order Details - Order ID:'.$orderID, 0, 1, 'C');
        
        $pdfWidth = $pdf->GetPageWidth();
        $pdfHeight = $pdf->GetPageHeight();

        $pdf->Rect(5, 5, $pdfWidth-8, $pdfHeight-10, 'D');    

        $pdf->SetFont('Arial', 'B', 14);
        $pdf->SetTitle('Sobawitha Order Details Report');
        $pdf->SetTextColor(255, 255, 255);
       


        $pdf->Cell(30, 10, 'Order Id', 1 , 0, 'C',1);
        $pdf->Cell(60, 10, 'Customer Name', 1 , 0, 'C',1);
        $pdf->Cell(50, 10, 'Email', 1 , 0, 'C',1);
        $pdf->Cell(30, 10, 'Phone', 1 , 0, 'C',1);
        $pdf->Cell(70, 10, 'Address', 1 , 0, 'C',1);
       
        $pdf->Cell(42, 10, 'Date & Time', 1 , 0, 'C',1);
        $pdf->Ln();
        
        $pdf->SetTextColor(0, 0, 0);
        
        $pdf->SetFont('Arial', '', 12);
        
     
     
            $pdf->Cell(30, 20, $order->order_id, 1 , 0, 'C');
            $pdf->Cell(60, 20, $order->customer_name, 1 , 0, 'C');
            $pdf->Cell(50, 20, $order->email, 1 , 0, 'C');
            $pdf->Cell(30, 20, $order->phone, 1 , 0, 'C');
            $pdf->Cell(70, 20, $order->address, 1 , 0, 'C');
          
            $pdf->Cell(42, 20, $order->created_at, 1 , 0, 'C');
            $pdf->Ln();
            $pdf->Ln();


      

         $pdf->SetFont('Arial','B',12);
         $pdf->Cell(180,10,'Product Name',1);
         $pdf->Cell(30,10,'Quantity',1);
         $pdf->Cell(30,10,'Unit Price',1);
         $pdf->Cell(30,10,'SubTotal',1);     
         $pdf->Ln();
         $pdf->SetFont('Arial', '', 12);
         if($order_items)
foreach ($order_items as $row) {
    $pdf->Cell(180, 10, $row->product_name, 1);
    $pdf->Cell(30, 10, $row->quantity, 1);
    $pdf->Cell(30, 10, 'Rs. '.$row->price, 1);
    $pdf->Cell(30, 10, 'Rs. '.($row->price*$row->quantity), 1);
    $pdf->Ln();
    $sum += $row->price*$row->quantity;
}


$pdf->Ln();
$pdf->Ln();
$pdf->SetFont('Arial', 'B', 12);

$pdf->Cell(40, 10, 'Total Amount.', 1);
$pdf->Cell(40, 10, 'Rs. '.$sum.'.00', 1);
         
         


        

           
       
        
       
        
  
        // $pdf->Output();
         $pdf->Output($orderID.'Order Details.pdf', 'I');
           
     
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


 
    public function  SearchPurchases(){

          // retrieve the JSON data from the AJAX request
$json = file_get_contents('php://input');

$data = json_decode($json);


if(isset($data) && isset($data->searchText) ){
    // your code here


// extract the search text and order type from the JSON data
$searchText = $data->searchText;

$searchResults = $this->buyerModel->getOrderDetailsBySearch($searchText);


// format the search results as JSON and send them back as the response
header('Content-Type: application/json');
echo json_encode($searchResults);
       



}
else {
    // handle the case where $object is null or its properties are not set
    echo "No data found";
}








    }



}

?>