<?php

    class Admin_payments extends Controller{
        private $adminPaymentModel;
        private $notification_model;

        public function __construct(){
            $this->adminPaymentModel = $this->model('M_Admin_payments');
            $this->notification_model = $this->model('M_notifications');
    }

    public function view_payments(){
      $records_per_page = 4;

        if(isset($_SESSION['user_id']) && $_SESSION['user_flag'] ==1){ 
          $no_of_notifications = $this->notification_model->find_notification_count()->total_count;
          $notifications = $this->notification_model->notifications();
            
           if($_SERVER['REQUEST_METHOD'] == 'POST'){
             $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
             $filter_type = trim($_POST['payment_type']);
             
             $current_page = isset($_GET['page']) ? $_GET['page'] : 1;
             $offset = ($current_page - 1) * $records_per_page;
             
             $payments = $this->adminPaymentModel->getPaymentDetails($filter_type, $records_per_page, $offset);
             
             $total_records = $payments['row_count'];
             // echo "<script>";
             // echo "alert('" . $total_records . "')";
             // echo "</script>";
           $total_pages = ceil($total_records / $records_per_page);
          
           if(empty($payments['row_count'])){

           $data=[
            'payments' =>  $payments['rows'],
            'search' => "Search by payer firstname or lastname",
            'emptydata' => "No Payments details to Show...",
            'no_of_notifications' =>$no_of_notifications,
            'notifications' => $notifications,
              
            'pagination' => [
               'total_records' => $total_records,
               'records_per_page' => $records_per_page,
               'total_pages' => $total_pages,
               'current_page' => $current_page,
              ],
            ];
        
            // $this->view('Admin/AdminPayments/v_admin_payment', $data);
          }else{
            $data=[
            'payments' =>  $payments['rows'],
            'search' => "Search by payer firstname or lastname",
            'emptydata' => '',
            'no_of_notifications' =>$no_of_notifications,
            'notifications' => $notifications,
              
            'pagination' => [
               'total_records' => $total_records,
               'records_per_page' => $records_per_page,
               'total_pages' => $total_pages,
               'current_page' => $current_page,
              ],
            ];
          }
            $this->view('Admin/AdminPayments/v_admin_payment', $data);
         
          }else{
          $current_page = isset($_GET['page']) ? $_GET['page'] : 1;
          $offset = ($current_page - 1) * $records_per_page;


            $payments = $this->adminPaymentModel->getPaymentDetails('',$records_per_page, $offset);
            $total_records = $payments['row_count'];
            $total_pages = ceil($total_records / $records_per_page);
            
            if(empty($payments['row_count'])){
            $data=[
            'payments' =>   $payments['rows'],
            'search' => "Search by payer firstname or lastname",
            'emptydata' => "No Payments details to Show...",
            'no_of_notifications' =>$no_of_notifications,
            'notifications' => $notifications,
              
            'pagination' => [
               'total_records' => $total_records,
               'records_per_page' => $records_per_page,
               'total_pages' => $total_pages,
               'current_page' => $current_page,
              ],
            ];
        
            
         }else{
          $data=[
            'payments' =>   $payments['rows'],
            'search' => "Search by payer firstname or lastname",
            'emptydata' => '',
            'no_of_notifications' =>$no_of_notifications,
            'notifications' => $notifications,
              
            'pagination' => [
               'total_records' => $total_records,
               'records_per_page' => $records_per_page,
               'total_pages' => $total_pages,
               'current_page' => $current_page,
              ],
            ];
         }
         $this->view('Admin/AdminPayments/v_admin_payment', $data);
         }
        
        }else{
            redirect('Login/login');  
        }

    }

    public function generate_report(){
        if(isset($_SESSION['user_id']) && $_SESSION['user_flag'] ==1){ 
        //for notifications
        $no_of_notifications = $this->notification_model->find_notification_count()->total_count;
        $notifications = $this->notification_model->notifications();
            // Get the data for the report from the model
        $payments = $this->adminPaymentModel->getPaymentDetailsForDoc();
        
        // Generate the PDF report using the FPDF library
        require_once(APPROOT.'/fpdf/fpdf.php');
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
        $pdf->Cell(60, 10, 'Payer Full Name', 1 , 0, 'C',1);
        $pdf->Cell(30, 10, 'Total Fee', 1 , 0, 'C',1);
        $pdf->Cell(50, 10, 'Payee Fee', 1 , 0, 'C',1);
        $pdf->Cell(30, 10, 'Profit', 1 , 0, 'C',1);
        $pdf->Cell(30, 10, 'Order', 1 , 0, 'C',1);
        $pdf->Cell(52, 10, 'Date & Time', 1 , 0, 'C',1);
        $pdf->Ln();
        
        $pdf->SetTextColor(0, 0, 0);
        
        $pdf->SetFont('Arial', '', 12);
        foreach ($payments as $row) {
        
          
            $pdf->Cell(30,10,$row->payment_id, 1 , 0, 'C');
            $pdf->Cell(60,10,$row->payer_first.' '.$row->payer_last, 1 , 0, 'C');
            $pdf->Cell(30,10,'Rs. '.$row->total_fee, 1 , 0, 'C');
            $pdf->Cell(50,10,'Rs. '.$row->payee_fee, 1 , 0, 'C');
            $pdf->Cell(30,10,'Rs. '.$row->profit, 1 , 0, 'C');
            $pdf->Cell(30,10,$row->order_id, 1 , 0, 'C');
            $pdf->Cell(52,10,$row->date, 1 , 0, 'C');
            $pdf->Ln();



        }

       
        
        $pdf->AliasNbPages();
        $pdf->SetFont('Arial', 'B', 12);
        $pdf->Cell(0, 10, 'Page ' . $pdf->PageNo() . ' of {nb}', 0, 0, 'C');
        
  
        // $pdf->Output();
         $pdf->Output('Payments Details.pdf', 'D');
           
            $data=[
            'payments' =>  $payments,
            'no_of_notifications' =>$no_of_notifications,
            'notifications' => $notifications,
            ];
        
            $this->view('Admin/AdminPayments/v_admin_payment', $data);
      
        }else{
            redirect('Login/login');  
        }

    }

    public function  adminSearchPayment()
      {
        
        $records_per_page = 4;
        if(isset($_SESSION['user_id']) && $_SESSION['user_flag'] ==1){  
          $no_of_notifications = $this->notification_model->find_notification_count()->total_count;
          $notifications = $this->notification_model->notifications();

          $current_page = isset($_GET['page']) ? $_GET['page'] : 1;
          $offset = ($current_page - 1) * $records_per_page;
          
          $payments= $this->adminPaymentModel->getPaymentDetails('',$records_per_page,$offset);
          $total_records = $payments['row_count'];
          $total_pages = ceil($total_records / $records_per_page);

          if(empty($payments['row_count'])) {
          $data=[                      
            'payments'=>$payments['rows'],
            'search'=>"Search by payer firstname or lastname",
            'message' => '',
            'emptydata' => "No Payment Details to Show...",
            'no_of_notifications' =>$no_of_notifications,
            'notifications' => $notifications,
             
            'pagination' => [
              'total_records' => $total_records,
              'records_per_page' => $records_per_page,
              'total_pages' => $total_pages,
              'current_page' => $current_page,
            ],
         
          ];
        }else{
          $data=[                      
            'payments'=>$payments['rows'],
            'search'=>"Search by payer firstname or lastname",
            'message' => '',
            'emptydata' => '',
            'no_of_notifications' =>$no_of_notifications,
            'notifications' => $notifications,
             
            'pagination' => [
              'total_records' => $total_records,
              'records_per_page' => $records_per_page,
              'total_pages' => $total_pages,
              'current_page' => $current_page,
            ],
         
          ];

         }

          if($_SERVER['REQUEST_METHOD']=='GET'){
          $_GET=filter_input_array(INPUT_GET, FILTER_SANITIZE_STRING);
              
             
          $search=trim($_GET['search']);
          
              if (!empty($search)) {
              $current_page = isset($_GET['page']) ? $_GET['page'] : 1;
              $offset = ($current_page - 1) * $records_per_page;

              $payments= $this->adminPaymentModel->searchPayments($search);
              
              $total_records = $payments['row_count'];
              
              $total_pages = ceil($total_records / $records_per_page);
              $message = '';

              if (empty($payments['row_count'])) {
                $message = 'No payment details found...';
              }
              $data=[                      
                'payments'=>$payments['rows'],
                'search'=>$search,
                'message' => $message,
                'emptydata' =>'',
                'no_of_notifications' =>$no_of_notifications,
                'notifications' => $notifications,

                     
            'pagination' => [
              'total_records' => $total_records,
              'records_per_page' => $records_per_page,
              'total_pages' => $total_pages,
              'current_page' => $current_page,
            ],
         
              ];
              $this->view('Admin/AdminPayments/v_admin_payment',$data);
             }
            }
              $this->view('Admin/AdminPayments/v_admin_payment',$data);
  
        }else{
          redirect('Login/login');  
        }
      }
}