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
                         $this->view('Users/user/v_login_user', $data);
                    }
           
                }
                else{
                    // Load view
                    $this->view('Users/user/v_login_user', $data);
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
                $this->view('Users/user/v_login_user', $data);
            }
    } 

    public function createUserSession($loggeduser) {
        $_SESSION['user_id']=$loggeduser->user_id;
        $_SESSION['username']=$loggeduser->first_name;
        $_SESSION['user_email']=$loggeduser->email; 
        $_SESSION['user_flag']=$loggeduser->user_flag;
        $_SESSION['lastname'] = $loggeduser->last_name;
        $_SESSION['profile_image'] = $loggeduser->profile_picture;
        $_SESSION['profile_image_path'] = "upload/user_profile_pics/" .  $_SESSION['profile_image'];
        

            $flag = $_SESSION['user_flag'];
            if($flag==1){
                $_SESSION['position'] = "Admin";
                redirect('Admin_dashboard/main_view');
            }
            else if($flag==2){
                $_SESSION['position'] = "Seller";
                redirect('dashboard/seller_dashboard');
            }
            else if($flag==3){
                $_SESSION['position'] = "Buyer";
                redirect('dashboard/buyer_dashboard');
            }
            else if($flag==4){
                $_SESSION['position'] = "Supplier";
                redirect('dashboard/supplier_dashboard');
            }
            else if($flag==5){
                $_SESSION['position'] = "Agri-officer";
                redirect('dashboard/officer_dashboard');
            }
    }

    public function logout() {
        if(isset($_SESSION['user_id'])){  
             unset($_SESSION['user_id']);
             unset($_SESSION['user_email']);
             unset($_SESSION['username']);
             unset($_SESSION['user_gender']);
             unset($_SESSION['user_flag']);
            unset($_SESSION['lastname']);
            unset($_SESSION['position']);
            session_destroy();
            redirect('Users/login');

             // session_destroy();

             $_SESSION['logout'] = true;
             redirect('Login/login');
         }
         redirect('Login/login');
    }   
}
?>