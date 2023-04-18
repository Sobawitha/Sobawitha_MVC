<?php
    class Admin_complaints_management extends Controller{
        
        private $adminComplaintsMgnt;
        public function __construct(){
            $this->adminComplaintsMgnt = $this->model('M_Admin_complaints_management');
    }

    public function view_complaints(){
        if(isset($_SESSION['user_id']) && $_SESSION['user_flag'] ==1){ 
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
                $filter_type = trim($_POST['comp_type']);
                $complaints = $this->adminComplaintsMgnt->getCompDetails($filter_type);
           
            $data=[
            'complaints' =>  $complaints,
            'search' => "Search by complaint category",
            ];
        
            $this->view('Admin/AdminCompManage/v_admin_comp_pending', $data);
        }else{
            $complaints = $this->adminComplaintsMgnt->getCompDetails();
           
            $data=[
            'complaints' =>  $complaints,
            'search' => "Search by complaint category",
            ];
        
            $this->view('Admin/AdminCompManage/v_admin_comp_pending', $data);
           }
        }else{
            redirect('Login/login');  
        }
      }

      public function  adminSearchComplaint()
      {
        if(isset($_SESSION['user_id']) && $_SESSION['user_flag'] ==1){  
          $complaints= $this->adminComplaintsMgnt->getCompDetails();
          
          $data=[                      
            'complaints'=>$complaints,
            'search'=>"Search by complaint category",
            'message' => ''
          ];
        if($_SERVER['REQUEST_METHOD']=='GET'){
          $_GET=filter_input_array(INPUT_GET, FILTER_SANITIZE_STRING);
              

          $search=trim($_GET['search']);

          if (!empty($search)) {
            $complaints= $this->adminComplaintsMgnt->getSearchComplaints($search);
            $message = '';
            if (empty($complaints)) {
                $message = "No complaints found on category: $search";
            }
            $data['complaints'] = $complaints;
            $data['search'] = $search;
            $data['message'] = $message;
          }
        }
        $this->view('Admin/AdminCompManage/v_admin_comp_pending',$data);

        }else{
          redirect('Login/login');  
        }
      }
      
      // public function view_more_complaint($comp_id){
      //   if(isset($_SESSION['user_id']) && $_SESSION['user_flag'] == 1) {
      //       $complaint= $this->adminComplaintsMgnt->getComplaintDetails($comp_id);
      //       $data=[                      
      //         'user'=>$complaint
              
      //       ];
      //       $this->view('Admin/AdminCompManage/v_admin_comp_pending', $data);
            
      //      }else{
      //        redirect('Login/login');  
      //      }    
        
      //  }  

      public function view_more_complaint($comp_id){
        if(isset($_SESSION['user_id']) && $_SESSION['user_flag'] == 1) {
            $complaint= $this->adminComplaintsMgnt->getComplaintDetails($comp_id);
            header('Content-Type: application/json');
            echo json_encode($complaint);
            exit();
        } else {
            redirect('Login/login');
        }
    }
    
      
    public function comp_solved(){
        $data=[
            'title' => 'Sobawitha'
        ];
        $this->view('Admin/AdminCompManage/v_admin_comp_solved', $data);
      
       }

}