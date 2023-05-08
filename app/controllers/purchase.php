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


    public function generatePDF(){
       
            // Get the data for the report from the model
            $orderID = $_GET['order_id'];
            echo $orderID;
        $order = $this->buyerModel->getOrderDetailsById($orderID);
        $order_items = $this->buyerModel->getOrderItemDetails($orderID);
        echo $order;
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
        $pdf->Cell(30, 10, 'Email', 1 , 0, 'C',1);
        $pdf->Cell(50, 10, 'Phone', 1 , 0, 'C',1);
        $pdf->Cell(30, 10, 'Address', 1 , 0, 'C',1);
        $pdf->Cell(30, 10, 'Total', 1 , 0, 'C',1);
        $pdf->Cell(52, 10, 'Date & Time', 1 , 0, 'C',1);
        $pdf->Ln();
        
        $pdf->SetTextColor(0, 0, 0);
        
        $pdf->SetFont('Arial', '', 12);
        
     
     
            $pdf->Cell(30, 10, $order->order_id, 1 , 0, 'C');
            $pdf->Cell(60, 10, $order->customer_name, 1 , 0, 'C');
            $pdf->Cell(30, 10, $order->email, 1 , 0, 'C');
            $pdf->Cell(50, 10, $order->phone, 1 , 0, 'C');
            $pdf->Cell(30, 10, $order->address, 1 , 0, 'C');
            $pdf->Cell(30, 10, 'Rs. '.$order->total, 1 , 0, 'C');
            $pdf->Cell(52, 10, $order->created_at, 1 , 0, 'C');
            $pdf->Ln();

      

         $pdf->SetFont('Arial','B',12);
         $pdf->Cell(40,10,'Product Name',1);
         $pdf->Cell(30,10,'Quantity',1);
         $pdf->Cell(30,10,'Unit Price',1);
         $pdf->Cell(30,10,'SubTotal',1);     
         $pdf->Ln();
         $pdf->SetFont('Arial', '', 12);
foreach ($order_items as $item) {
    $pdf->Cell(40, 10, $item->product_name, 1);
    $pdf->Cell(30, 10, $item->quantity, 1);
    $pdf->Cell(30, 10, 'Rs. '.$item->price, 1);

    $pdf->Ln();
}

$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell(100, 10, '', 0);
$pdf->Cell(40, 10, 'Total Amount:', 1);
$pdf->Cell(40, 10, 'Rs. '.$order->total_amount, 1);
         
         


        

           
       
        
        $pdf->AliasNbPages();
        $pdf->SetFont('Arial', 'B', 12);
        $pdf->Cell(0, 10, 'Page ' . $pdf->PageNo() . ' of {nb}', 0, 0, 'C');
        
  
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




}

?>