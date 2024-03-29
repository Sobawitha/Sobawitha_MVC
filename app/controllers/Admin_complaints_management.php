<?php
  class Admin_complaints_management extends Controller{
        
    private $adminComplaintsMgnt;
      public function __construct(){
        $this->adminComplaintsMgnt = $this->model('M_Admin_complaints_management');
        $this->notification_model = $this->model('M_notifications');
      }

  // public function view_complaints(){
  //   $records_per_page = 3;
    
  //   if(isset($_SESSION['user_id']) && $_SESSION['user_flag'] ==1){
  //     if($_SERVER['REQUEST_METHOD'] == 'POST'){
  //       $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
  //       // $filter_type = trim($_POST['comp_type']);
  //       $filter_type = isset($_POST['comp_type']) ? trim($_POST['comp_type']) : '';

        
  //       $current_page = isset($_GET['page']) ? $_GET['page'] : 1;
  //       $offset = ($current_page - 1) * $records_per_page;
                
  //       $complaints = $this->adminComplaintsMgnt->getCompDetails($filter_type, $records_per_page, $offset);
                 
  //       $total_records = $complaints['row_count'];
  //         // echo "<script>";
  //         // echo "alert('" . $total_records . "')";
  //         // echo "</script>";
  //       $total_pages = ceil($total_records / $records_per_page);

  //         if(empty($complaints['row_count'])){
              
  //           $data=[
  //             'complaints' =>  $complaints['rows'],
  //             'search' => "Search by complaint category",
  //             'emptydata' => "No Complaints to Show...",
              
  //             'pagination' => [
  //                'total_records' => $total_records,
  //                'records_per_page' => $records_per_page,
  //                'total_pages' => $total_pages,
  //                'current_page' => $current_page,
  //               ],
  //             ];
            
  //         }else{
              
  //           $data=[
  //             'complaints' =>  $complaints['rows'],
  //             'search' => "Search by complaint category",
  //             'emptydata'=>'',
  //             'compType'=> $filter_type,
              
  //             'pagination' => [
  //               'total_records' => $total_records,
  //               'records_per_page' => $records_per_page,
  //               'total_pages' => $total_pages,
  //               'current_page' => $current_page,
  //             ],
  //           ];
          
  //         }

  //           $this->view('Admin/AdminCompManage/v_admin_comp_pending', $data);
        
  //     }else{
        
  //       $current_page = isset($_GET['page']) ? $_GET['page'] : 1;
  //       $offset = ($current_page - 1) * $records_per_page; 
          
  //       $complaints = $this->adminComplaintsMgnt->getCompDetails('',$records_per_page, $offset);
        
  //       $total_records = $complaints['row_count'];
  //       $total_pages = ceil($total_records / $records_per_page);

  //         if(empty($complaints['row_count'])){
  //           $data=[
  //             'complaints' =>  $complaints['rows'],
  //             'search' => "Search by complaint category",
  //             'emptydata' => "No Complaints to Show...",
            
  //             'pagination' => [
  //               'total_records' => $total_records,
  //               'records_per_page' => $records_per_page,
  //               'total_pages' => $total_pages,
  //               'current_page' => $current_page,
  //              ],
          
  //           ];
          
  //         }else{
  //             $data=[
  //               'complaints' =>  $complaints['rows'],
  //               'search' => "Search by complaint category",
  //               'emptydata'=>'',
                
  //               'pagination' => [
  //                 'total_records' => $total_records,
  //                 'records_per_page' => $records_per_page,
  //                 'total_pages' => $total_pages,
  //                 'current_page' => $current_page,
  //               ],
  //             ];
  //         }
        
  //         $this->view('Admin/AdminCompManage/v_admin_comp_pending', $data);
  //     }
    
  //   }else{
  //     redirect('Login/login');  
  //   }
  // }

  public function view_complaints()
  {
    $no_of_notifications = $this->notification_model->find_notification_count()->total_count;
    $notifications = $this->notification_model->notifications();
    $records_per_page = 3;
    
    if(isset($_SESSION['user_id']) && $_SESSION['user_flag'] == 1) {
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
          
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $filter_type = isset($_POST['comp_type']) ? trim($_POST['comp_type']) : '';
            $_SESSION['radio_admin_comp'] = $filter_type; // set session variable for filter type
            
            $current_page = isset($_GET['page']) ? $_GET['page'] : 1;
            $offset = ($current_page - 1) * $records_per_page;
                    
            $complaints = $this->adminComplaintsMgnt->getCompDetails($_SESSION['radio_admin_comp'], $records_per_page, $offset);
                     
            $total_records = $complaints['row_count'];
            $total_pages = ceil($total_records / $records_per_page);
    
            if(empty($complaints['row_count'])){
                $data=[
                    'complaints' =>  $complaints['rows'],
                    'search' => "Search by complaint category",
                    'emptydata' => "No Complaints to Show...",
                    'no_of_notifications' =>$no_of_notifications,
                    'notifications' => $notifications,
                    
                    'pagination' => [
                        'total_records' => $total_records,
                        'records_per_page' => $records_per_page,
                        'total_pages' => $total_pages,
                        'current_page' => $current_page,
                    ],
                ];
                
            } else {
                $data=[
                    'complaints' =>  $complaints['rows'],
                    'search' => "Search by complaint category",
                    'emptydata' => '',
                    'compType' => $_SESSION['radio_admin_comp'], // pass filter type for display
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
    
            $this->view('Admin/AdminCompManage/v_admin_comp_pending', $data);
        
        } else {
            $current_page = isset($_GET['page']) ? $_GET['page'] : 1;
            $offset = ($current_page - 1) * $records_per_page; 
              
            $complaints = $this->adminComplaintsMgnt->getCompDetails($_SESSION['radio_admin_comp'], $records_per_page, $offset);
            
            $total_records = $complaints['row_count'];
            $total_pages = ceil($total_records / $records_per_page);
    
            if(empty($complaints['row_count'])) {
                $data=[
                    'complaints' =>  $complaints['rows'],
                    'search' => "Search by complaint category",
                    'emptydata' => "No Complaints to Show...",
                    'no_of_notifications' =>$no_of_notifications,
                    'notifications' => $notifications,
                    
                    'pagination' => [
                        'total_records' => $total_records,
                        'records_per_page' => $records_per_page,
                        'total_pages' => $total_pages,
                        'current_page' => $current_page,
                    ],
                ];
              
            } else {
                $data=[
                    'complaints' =>  $complaints['rows'],
                    'search' => "Search by complaint category",
                    'emptydata' => '',
                    'compType' => $_SESSION['radio_admin_comp'], // pass filter type for display
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
                              
                                $this->view('Admin/AdminCompManage/v_admin_comp_pending', $data);
                            }
                          
                          }else{
                            redirect('Login/login');  
                      }
       }

  public function  adminSearchComplaint()
  {
    $no_of_notifications = $this->notification_model->find_notification_count()->total_count;
    $notifications = $this->notification_model->notifications();
    $records_per_page = 3;
    if (isset($_SESSION['user_id']) && $_SESSION['user_flag'] == 1) {

      $current_page = isset($_GET['page']) ? $_GET['page'] : 1;
      $offset = ($current_page - 1) * $records_per_page;

      $complaints = $this->adminComplaintsMgnt->getCompDetails('', $records_per_page, $offset);
      $total_records = $complaints['row_count'];

      $total_pages = ceil($total_records / $records_per_page);
      if(empty($complaints['row_count'])) {
      $data = [
        'complaints' => $complaints['rows'],
        'search' => "Search by complaint category",
        'message' => '',
        'emptydata' => "No Complaints to Show...",
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
        $data = [
          'complaints' => $complaints['rows'],
          'search' => "Search by complaint category",
          'message' => '',
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
      }
      if ($_SERVER['REQUEST_METHOD'] == 'GET') {
        $_GET = filter_input_array(INPUT_GET, FILTER_SANITIZE_STRING);

        $search = trim($_GET['search']);
      //   if (isset($_GET['search']) && $_GET['search'] === 'value') {
      //     $search = 'value';
      // } else {
      //     $search = '';
      // }

        if (!empty($search)) {
          $current_page = isset($_GET['page']) ? $_GET['page'] : 1;
          $offset = ($current_page - 1) * $records_per_page;

          $complaints = $this->adminComplaintsMgnt->getSearchComplaints($search,$records_per_page,$offset);

          $total_records = $complaints['row_count'];
          $total_pages = ceil($total_records / $records_per_page);
          $message = '';

          if (empty($complaints['row_count'])) {
            $message = "No complaints found on category: $search";
          }


          $data = [
            'complaints' =>  $complaints['rows'],
            'search' =>  $search,
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
          
        
          $this->view('Admin/AdminCompManage/v_admin_comp_pending', $data);
        }
      }

      $this->view('Admin/AdminCompManage/v_admin_comp_pending', $data);
      
    } else {
      redirect('Login/login');
    }
  }
      

   
    public function  adminSolveComplaint($comp_id)
    {
      if(isset($_SESSION['user_id']) && $_SESSION['user_flag'] ==1){  
          $solveStatus= $this->adminComplaintsMgnt->solveComplaint($comp_id);

     
          redirect('Admin_complaints_management/view_complaints');
       
      }else{
        redirect('Login/login');  
      }
    }



    public function comp_solved(){
        $no_of_notifications = $this->notification_model->find_notification_count()->total_count;
        $notifications = $this->notification_model->notifications();
        $data=[
            'title' => 'Sobawitha',
            'no_of_notifications' =>$no_of_notifications,
            'notifications' => $notifications,
        ];
        $this->view('Admin/AdminCompManage/v_admin_comp_solved', $data);
      
       }

}