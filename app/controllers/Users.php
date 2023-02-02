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
            $_SESSION['gender'] = $user->gender;
            redirect('blog_post/create_posts');
        }

        public function logout(){
            unset($_SESSION['user_id']);
            unset($_SESSION['username'] );
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
        
        public function view_profile(){
            $data=[];
            $this->view('users/v_view_profile', $data);
        }

}

?>