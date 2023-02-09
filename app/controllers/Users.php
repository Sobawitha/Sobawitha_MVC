<?php
    class users extends Controller {
        public function __construct(){
            $this-> userModel =$this->model('M_Users');
        }

        public function register(){
            $data=[];
            $this->view('/users/v_register', $data);
        }

        public function login(){
            if($_SERVER['REQUEST_METHOD']=='POST'){
                //forum is submitted

                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
                $data = [
                    'username' => trim($_POST['username']),
                    'password' => trim($_POST['password']),
    
                    'login_err'=>''
                    
                ];

                if($this-> userModel ->findUserByusername($data['username'])){
                            //user found
                            //validate pw
                            redirect('blog_post/create_posts');
                }
                else{
                    $data['login_err'] = 'Invalid username or password.';
                }

            if (empty($data['login_err'])) {
                //log the user
                $loggeduser = $this-> userModel ->login( $data['username'],$data['password']);

                if ($loggeduser) {
                    //user authenticated
                    //create SESSION
                    $this->create_user_session($loggeduser);
                }
                else {
                    $data['login_err'] = 'Invalid username or password.';
                    //show error
                    //load view
                    $this->view('users/v_login', $data);
                }
            }
            else{
                $this->view('users/v_login', $data); 
            }
                

            }
            else{
                //initial form

                $data = [
                    'username' => '',
                    'password' => '',

                    'login_err'=>''
                ];

                //load view
                $this->view('users/v_login', $data);
            }
        }

        public function forgot_password(){
            $data=[];
            $this->view('users/v_fogotpw', $data);
        }
        

        public function create_user_session($user){
            $_SESSION['user_id'] = $user->user_id;
            $_SESSION['username'] = $user->first_name;
            $_SESSION['lastname'] = $user->last_name;
            $_SESSION['profile_image'] = $user->profile_picture;

            $flag = $user->user_flag;
            if($flag==1){
                $_SESSION['position'] = "Admin";
            }
            else if($flag==2){
                $_SESSION['position'] = "Seller";
            }
            else if($flag==3){
                $_SESSION['position'] = "Buyer";
            }
            else if($flag==4){
                $_SESSION['position'] = "Supplier";
            }
            else if($flag==5){
                $_SESSION['position'] = "Agri-officer";
            }
            
            redirect('blog_post/create_posts');
        }

        public function logout(){
            unset($_SESSION['user_id']);
            unset($_SESSION['username'] );
            unset($_SESSION['lastname']);
            unset($_SESSION['position']);
            session_destroy();
            redirect('Users/login');
        }

        public function isLoggedIn(){
            if(isset($_SESSION['user_id'])){
                return true;
            }
            else{
                return false;
            }
        }
        
        public function admin_view_profile(){
            $data=[];
            $this->view('Admin/Admin/v_admin_view_profile', $data);
        }

        public function officer_view_profile(){
            $data=[];
            $this->view('Agri_officer/Agri_officer/v_officer_view_profile', $data);
        }

        public function seller_view_profile(){
            $data=[];
            $this->view('Seller/Seller/v_seller_view_profile', $data);
        }

        public function buyer_view_profile(){
            $data=[];
            $this->view('Buyer/Buyer/v_buyer_view_profile', $data);
        }

        public function supplier_view_profile(){
            $data=[];
            $this->view('Raw_material_supplier/Raw_material_supplier/v_supplier_view_profile', $data);
        }

        


}

?>