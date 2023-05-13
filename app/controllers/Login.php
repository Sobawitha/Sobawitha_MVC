<?php
    
    class Login extends Controller{
      
        private $loginModel;
        private $userModel;

        public function __construct(){
            $this->loginModel = $this->model('M_Login');
            $this->userModel = $this->model('M_Users');
        }
        
       
        public function login(){
            
            if(isset($_POST['login_btn'])){
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
                    if($this->loginModel->findUserByEmail($data['email'])){
                        // User found
                        if($this->loginModel->checkUserStatus($data['email'])){

                        }else{
                            $data['password_err'] = 'Your account is deactivated.Please contact our support team';
                        }
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
                    $loggeduser = $this->loginModel->login($data['email'], $data['password']);
                    
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

    public function createUserSession($loggeduser)
    {
        $_SESSION['user_id'] = $loggeduser->user_id;
        $_SESSION['username'] = $loggeduser->first_name;
        $_SESSION['user_email'] = $loggeduser->email;
        $_SESSION['user_flag'] = $loggeduser->user_flag;
        $_SESSION['lastname'] = $loggeduser->last_name;
        $_SESSION['profile_image'] = $loggeduser->profile_picture;
        $_SESSION['user_gender'] = $loggeduser->gender;
        $_SESSION['profile_image_path'] = "upload/user_profile_pics/" .  $_SESSION['profile_image'];
        // $_SESSION['profile_updateAdmin']="false";
        $_SESSION['radio_admin_comp'] = '';
        $_SESSION['radio_admin_feed'] = '';
        $_SESSION['radio_admin_role'] = '';

        $flag = $_SESSION['user_flag'];
        if ($flag == 1) {
            $_SESSION['position'] = "Admin";
            redirect('Admin_dashboard/main_view');
        } else if ($flag == 2) {
            $_SESSION['position'] = "Customer";
            redirect('dashboard/buyer_dashboard');
        } else if ($flag == 3) {
            $_SESSION['position'] = "Seller";
            redirect('seller_dashboard/seller_dashboard');
        } else if ($flag == 3) {
            $_SESSION['position'] = "Seller";
            redirect('dashboard/seller_dashboard');
        } else if ($flag == 4) {
            $_SESSION['position'] = "Supplier";
            redirect('supplier_dashboard/supplier_dashboard');
        } else if ($flag == 5) {
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
            unset($_SESSION['profile_image']);
            unset($_SESSION['profile_image_path']);
            unset($_SESSION['radio_admin_role']);
            session_destroy();
        
            // session_destroy();

             $_SESSION['logout'] = true;
             redirect('Login/login');
         }
         redirect('Login/login');
    }  
    

   

    public function forgot_password(){
        
        if($_SERVER['REQUEST_METHOD']=='POST'){
           
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
             if(isset($_POST['forgot_btn'])) {
                    // echo "<script>";
                    // echo "alert('" . $emailCheckResult . "')";
                    // echo "</script>";
                
                $email = $_POST['forgot_email'];
                $token = md5(rand());
            
                // session_start();
                $_SESSION['email'] = $email;
    
                $row = $this->loginModel->checkEmail($email);
                 

        
                 // if query run
                 if ($row) {
                    $name = $row->first_name;
                    $updateResult= $this->loginModel->setToken($token,$email);
                    $flag=1;
                    if($updateResult) {
                    $val = sendMail($email,$name, $token, $flag, '','','');
     
                  if($val){
                        $data = [
                            'login_err' =>'',
                            'email_err' => '',
                            'password_err' => 'We emailed you a password reset link'
                        ];
        
                           $this->view('Users/user/v_forgot_password', $data);  
                     }else{
                        $data = [
                            'login_err' =>'',
                            'email_err' => '',
                            'password_err' => 'Oops... Something went wrong'
                        ];
        
                           $this->view('Users/user/v_forgot_password', $data); 
                     }
                        
                                                        
                        } else {
                            $_SESSION['status'] = "Something went wrong.";
                            $data = [
                                'login_err' =>'',
                                'email_err' => 'Something went wrong.',
                                'password_err' => ''
                            ];
            
                               $this->view('Users/user/v_forgot_password', $data);
                        }
                          
                
                }else{
                    $data = [
                    'login_err' =>'',
                    'email_err' => 'No Email Found',
                    'password_err' => ''
                ];

                   $this->view('Users/user/v_forgot_password', $data);
                } 
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
                $this->view('Users/user/v_forgot_password', $data);
            }
  
    }

    public function reset_password()
     {
        if($_SERVER['REQUEST_METHOD']=='POST'){
           $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
             if(isset($_POST['change_pw_btn'])) {
               
                    $token = trim($_POST['pwd_token']);
                    if($token != null) { 
                    $email = trim($_POST['email']);
                   
                    $userRow=$this->loginModel->findUserId($email);
                    
                    $tokenExpire = $this->loginModel->checkToken($email);
                    }
                    // echo "<script>";
                    // echo "alert('" . $tokenExpire->verify_token . "')";
                    // echo "</script>";

                    $data = [
                        'new_pwd' => trim($_POST['new_pwd']),       
                        'password' => trim($_POST['password']),
                        'email' => trim($_POST['email']),
                        'pwd_token' => trim($_POST['pwd_token']),
                        'user_id'=> $userRow -> user_id,
     
                        'new_pwd_err' => '',
                        'password_err' => '',
                        'confirm_password_err' => '',
                        'retype_new_password_err' => '',
                        'token_expire_err' => '',
                        'old_password_err' => '',
                         'empty_token_err' => ''
                    ];
                    
                    // $pwd   = $data['password'];
                    // $oldPwd = $this->loginModel->checkOldPwd($email,$pwd);
                   
                    if($data['new_pwd']!=$data['password']){
                        $data['password_err']='New password and confirm password is diffrent';
                       } 
                
                       if(empty($data['new_pwd'])){
                        $data['new_pwd_err'] = 'Please enter a new password';
                      } else {
                        $pwdValidationResult = validatePassword($data['new_pwd']);
                        if($pwdValidationResult !== true){ 
                          $data['new_pwd_err'] = $pwdValidationResult; 
                        } else {
                          $data['new_pwd_err'] = ''; 
                        }
                      }
                      
                    if(empty($data['password'])){
                        $data['confirm_password_err'] = 'Please retype your new password';
                      } else {
                        $pwdValidationResult = validatePassword($data['password']);
                        if($pwdValidationResult !== true){
                          $data['confirm_password_err'] = $pwdValidationResult;
                        }else{
                            $data['confirm_password_err'] = ''; 
                        }
                      }
                      
                     }

                    if(empty($data['pwd_token'])){
                        $data['empty_token_err']='Error: Authentication token missing. Please retrieve a token using the forgot password option.';
                    }
                 

                    if(!empty($data['pwd_token'])){
                        if($token != $tokenExpire->verify_token){
                            $data['token_expire_err'] = 'Oops, it looks like your password reset link has expired. Please request a new password reset link and try again.';
                        }
                    }

                    if(empty($data['new_pwd_err']) && empty($data['password_err']) && empty($data['confirm_password_err']) && empty($data['token_expire_err']) && empty($data['retype_new_password_err']) && empty($data['empty_token_err']) ){
             
                        $data['password']=password_hash($data['password'],PASSWORD_DEFAULT);
                        $resetPW=$this->userModel->changePW($data);
                        $token = md5(rand());
                        $this->loginModel->setToken($token,$email);
                
                          if($resetPW){
                            $_SESSION['profileResetPassword']="true";
                                redirect('Login/login');      
                           
                          }else{
                           $data['retype_new_password_err']='something wrong';
                           $this->view('Users/user/v_reset_password', $data);
                          }   
                       }else{
                         $this->view('Users/user/v_reset_password', $data);
                       }
        } else {
            //initial form
            $data = [
                'new_pwd' => '',
                'password' => '',
                'email' => '',
                'pwd_token' => '',

                'new_pwd_err' => '',
                'password_err' => '',
                'confirm_password_err' => '',
                'old_password_err' => '',
                'retype_new_password_err' => '',
                'token_expire_err' => '',
                'old_password_err' => '',
                'empty_token_err' => ''
            ];

            //load view
            $this->view('Users/user/v_reset_password', $data);
        }
    }

}

?>
