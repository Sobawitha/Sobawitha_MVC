<?php

    class Login extends Controller{
        private $userModel;

        public function __construct(){
            $this->userModel = $this->model('M_Login');
        }
   
        public function login(){
            if($_SERVER['REQUEST_METHOD']=='POST'){

                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
                
                $data = [
                    'email' => trim($_POST['email']),       
                    'password' => trim($_POST['password']),

                    'email_err' => '',
                    'password_err' => '',
                    'login_err' => ''
                ];

                
                // Validate email
                if(empty($data['email'])) {
                    $data['email_err'] = 'Email required';
                }
                else {
                    //check for existing emails
                    if($this->userModel->findUserByEmail($data['email'])) {
                        // User found
                    } else {
                        // User not found
                        $data['password_err'] = 'Invalid email or password';
                    }
                }

                // Validate password
                if(empty($data['password'])) {
                    $data['password_err'] = 'Password required';
                }

                // Login user after validation
                if(empty($data['email_err']) && empty($data['password_err'])) {
                    // Log the user
                    $loggeduser = $this->userModel->login($data['email'], $data['password']);
                    
                    if($loggeduser) {
                        // User is authenticated
                        // Create user session
                        $this->createUserSession($loggeduser);
                    }
                    else {
                        $data['password_err'] = 'Invalid email or password';
                        
                        // Load view
                         $this->view('User/v_login_user', $data);
                    }
           
                }
                else{
                    // Load view
                    $this->view('User/v_login_user', $data);
                }
              
            }else{
                //initial form
                $data = [
                    'username' =>'',
                    'password' =>'',

                    'login_err' =>'',
                    'email_err' => '',
                    'password_err' => ''
                ];

                //load view
                $this->view('User/v_login_user', $data);
            }
    } 

    public function createUserSession($loggeduser) {
        $_SESSION['user_id']=$loggeduser->user_id;
        $_SESSION['user_name']=$loggeduser->first_name;
        $_SESSION['user_email']=$loggeduser->email; 
        $_SESSION['user_flag']=$loggeduser->user_flag;
        
        if($loggeduser->gender=='m'){
           $_SESSION['user_gender']='Mr.';
        }else if($loggeduser->gender=='f'){
            $_SESSION['user_gender']='Ms.';
        } 
        
      
        if($loggeduser->user_flag=='1'){
            redirect('Admin_dashboard/main_view');
        }else if($loggeduser->user_flag=='2'){
            redirect('Admin_ad_management/reviewed_ads');
        }else if($loggeduser->user_flag=='3'){
            redirect('Admin_complaints_management/comp_solved');
        }else if($loggeduser->user_flag=='4'){
            redirect('Admin_feedback_management/feed_reviewed');
        }else if($loggeduser->user_flag=='5'){
            redirect('Admin_payments/view_payments');
        }
    }

    public function logout() {
        if(isset($_SESSION['user_id'])){  
             unset($_SESSION['user_id']);
             unset($_SESSION['user_email']);
             unset($_SESSION['user_name']);
             unset($_SESSION['user_gender']);
             unset($_SESSION['user_flag']);

             // session_destroy();

             $_SESSION['logout'] = true;
             redirect('Login/login');
         }
         redirect('Login/login');
    }    
}
?>