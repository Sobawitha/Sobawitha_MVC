<?php
    class Admin_feedback_management extends Controller{
        private $adminFeedMgntModel;
        public function __construct(){
            $this->adminFeedMgntModel = $this->model('M_Admin_feedback_management');
    }
   
   public function feed_reviewed(){
    $data=[
        'title' => 'Sobawitha'
    ];
    $this->view('Admin/AdminFeedbackManage/v_admin_feedback_publish', $data);
  
   }

   public function view_feedback(){
    $records_per_page = 3;
    if(isset($_SESSION['user_id']) && $_SESSION['user_flag'] ==1){ 
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            if(isset($_POST['feed_type'])){
            $filter_type = trim($_POST['feed_type']);  
            }

            $current_page = isset($_GET['page']) ? $_GET['page'] : 1;
            $offset = ($current_page - 1) * $records_per_page;
            
            if(!empty($filter_type)){
            $feed = $this->adminFeedMgntModel->getFeedbackDetails($filter_type, $records_per_page, $offset);
            }else{
              $feed = $this->adminFeedMgntModel->getFeedbackDetails('', $records_per_page, $offset);
            }

            $total_records = $feed['row_count'];
            // echo "<script>";
            // echo "alert('" . $total_records . "')";
            // echo "</script>";
          $total_pages = ceil($total_records / $records_per_page);
          if(empty($feed['row_count'])){
        $data=[
        'feed' =>  $feed['rows'],
        'search' =>'Search by feedback category',
        'emptydata' => "No feedbacks to Show...",
         
        'pagination' => [
            'total_records' => $total_records,
            'records_per_page' => $records_per_page,
            'total_pages' => $total_pages,
            'current_page' => $current_page,
           ],
        ];
        }else{
            $data=[
                'feed' =>  $feed['rows'],
                'search' =>'Search by feedback category',
                'emptydata' => '',
                 
                'pagination' => [
                    'total_records' => $total_records,
                    'records_per_page' => $records_per_page,
                    'total_pages' => $total_pages,
                    'current_page' => $current_page,
                   ],
                ];
        }   
        $this->view('Admin/AdminFeedbackManage/v_admin_feedback_pending', $data);

    }else{
        $current_page = isset($_GET['page']) ? $_GET['page'] : 1;
        $offset = ($current_page - 1) * $records_per_page; 
        $feed = $this->adminFeedMgntModel->getFeedbackDetails('',$records_per_page, $offset);
        
        $total_records = $feed['row_count'];
        $total_pages = ceil($total_records / $records_per_page);

        if(empty($feed['row_count'])){
            $data=[
                'feed' =>  $feed['rows'],
                'search' =>"Search by feedback category",
                'emptydata' => "No feedbacks to Show...",
                 
                'pagination' => [
                    'total_records' => $total_records,
                    'records_per_page' => $records_per_page,
                    'total_pages' => $total_pages,
                    'current_page' => $current_page,
                   ],
                ];
            }else{
                $data=[
                    'feed' =>  $feed['rows'],
                    'search' => "Search by feedback category",
                    'emptydata'=>'',
                    
                    'pagination' => [
                      'total_records' => $total_records,
                      'records_per_page' => $records_per_page,
                      'total_pages' => $total_pages,
                      'current_page' => $current_page,
                    ],
                  ];
              }

        $this->view('Admin/AdminFeedbackManage/v_admin_feedback_pending', $data);

    }
  
    }else{
        redirect('Login/login');  
    } 
  }

  public function  adminSearchFeedback()
  {
    $records_per_page = 3;
    if (isset($_SESSION['user_id']) && $_SESSION['user_flag'] == 1) {

      $current_page = isset($_GET['page']) ? $_GET['page'] : 1;
      $offset = ($current_page - 1) * $records_per_page;

      $feed = $this->adminFeedMgntModel->getFeedbackDetails('', $records_per_page, $offset);
      $total_records = $feed['row_count'];

      $total_pages = ceil($total_records / $records_per_page);
      if(empty($feed['row_count'])) {
      $data = [
        'feed' => $feed['rows'],
        'search' => "Search by feedback category",
        'message' => '',
        'emptydata' => "No Feedbacks to Show...",

        'pagination' => [
          'total_records' => $total_records,
          'records_per_page' => $records_per_page,
          'total_pages' => $total_pages,
          'current_page' => $current_page,
        ],
      ];
      }else{
        $data = [
          'feed' => $feed['rows'],
          'search' => "Search by feedback category",
          'message' => '',
          'emptydata' =>'',
  
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

        if (!empty($search)) {
          $current_page = isset($_GET['page']) ? $_GET['page'] : 1;
          $offset = ($current_page - 1) * $records_per_page;

          $feed = $this->adminFeedMgntModel->getSearchFeedbacks($search);

          $total_records = $feed['row_count'];
          $total_pages = ceil($total_records / $records_per_page);
          $message = '';

          if (empty($feed['row_count'])) {
            $message = "No feedbacks found on category: $search";
          }


          $data = [
            'feed' =>  $feed['rows'],
            'search' =>  $search,
            'message' => $message,
            'emptydata' => '',
            'pagination' => [
              'total_records' => $total_records,
              'records_per_page' => $records_per_page,
              'total_pages' => $total_pages,
              'current_page' => $current_page,
            ],
          ];
          
        
          $this->view('Admin/AdminFeedbackManage/v_admin_feedback_pending', $data);
        }

      }

      $this->view('Admin/AdminFeedbackManage/v_admin_feedback_pending', $data);
    } else {
      redirect('Login/login');
    }
  }

  public function  adminReviewFeedback($feed_id)
  {
    if(isset($_SESSION['user_id']) && $_SESSION['user_flag'] ==1){  
        $solveStatus= $this->adminFeedMgntModel->reviewFeed($feed_id);

   
        redirect('Admin_feedback_management/view_feedback');
     
    }else{
      redirect('Login/login');  
    }
  }

  public function  adminRejectFeedback($feed_id)
  {
    if(isset($_SESSION['user_id']) && $_SESSION['user_flag'] ==1){  
        $solveStatus= $this->adminFeedMgntModel->rejectFeed($feed_id);

   
        redirect('Admin_feedback_management/view_feedback');
     
    }else{
      redirect('Login/login');  
    }
  }
}
?>