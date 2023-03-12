<?php

    class Admin_payments extends Controller{
        private $adminPaymentModel;
        public function __construct(){
            $this->adminPaymentModel = $this->model('M_Admin_payments');
    }

    public function view_payments(){
        if(isset($_SESSION['user_id']) && $_SESSION['user_flag'] ==1){ 
            $payments = $this->adminPaymentModel->getPaymentDetails();
           
            $data=[
            'payments' =>  $payments
            ];
        
            $this->view('Admin/AdminPayments/v_admin_payment', $data);
      
        }else{
            redirect('Login/login');  
        }

    }

    public function generate_report(){
        if(isset($_SESSION['user_id']) && $_SESSION['user_flag'] ==1){ 
            // Get the data for the report from the model
        $payments = $this->adminPaymentModel->getPaymentDetails();
        
        // Generate the PDF report using the FPDF library
        require_once('../fpdf/fpdf.php');
        $pdf = new FPDF();
        $pdf->AddPage('L','A4');
        
        $pdf->SetFont('Arial', 'B', 18);
        $pdf->Cell(0, 10, 'Sobawitha Payments Details', 0, 1, 'C');
        
        $pdfWidth = $pdf->GetPageWidth();
        $pdfHeight = $pdf->GetPageHeight();

        $pdf->Rect(5, 5, $pdfWidth-8, $pdfHeight-10, 'D');    

        $pdf->SetFont('Arial', 'B', 14);
        $pdf->SetTitle('Sobawitha Payment Details Report');
        $pdf->SetTextColor(255, 255, 255);
       


        $pdf->Cell(30, 10, 'Payment Id', 1 , 0, 'C',1);
        $pdf->Cell(30, 10, 'Type', 1 , 0, 'C',1);
        $pdf->Cell(60, 10, 'Payer Full Name', 1 , 0, 'C',1);
        $pdf->Cell(30, 10, 'Total Fee', 1 , 0, 'C',1);
        $pdf->Cell(50, 10, 'Payee Fee', 1 , 0, 'C',1);
        $pdf->Cell(30, 10, 'Profit', 1 , 0, 'C',1);
        $pdf->Cell(52, 10, 'Date & Time', 1 , 0, 'C',1);
        $pdf->Ln();
        
        $pdf->SetTextColor(0, 0, 0);
        
        $pdf->SetFont('Arial', '', 12);
        foreach ($payments as $row) {
        
          
            $pdf->Cell(30,10,$row->payment_id, 1 , 0, 'C');
            $pdf->Cell(30,10,$row->type, 1 , 0, 'C');
            $pdf->Cell(60,10,$row->payer_first.' '.$row->payer_last, 1 , 0, 'C');
            $pdf->Cell(30,10,'Rs. '.$row->total_fee, 1 , 0, 'C');
            $pdf->Cell(50,10,'Rs. '.$row->payee_fee, 1 , 0, 'C');
            $pdf->Cell(30,10,'Rs. '.$row->profit, 1 , 0, 'C');
            $pdf->Cell(52,10,$row->date, 1 , 0, 'C');
            $pdf->Ln();



        }

       
        
        $pdf->AliasNbPages();
        $pdf->SetFont('Arial', 'B', 12);
        $pdf->Cell(0, 10, 'Page ' . $pdf->PageNo() . ' of {nb}', 0, 0, 'C');
        
  
        // $pdf->Output();
         $pdf->Output('Payments Details.pdf', 'D');
           
            $data=[
            'payments' =>  $payments
            ];
        
            $this->view('Admin/AdminPayments/v_admin_payment', $data);
      
        }else{
            redirect('Login/login');  
        }

    }
}