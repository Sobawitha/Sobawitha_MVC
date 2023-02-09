<?php
    class Seller extends Controller{
        public function __construct(){
            $this->userModel = $this->model('M_Seller');
    }

    public function seller_register(){
       
        $data=[
               'title' => 'Sobawitha'
           ];
           $this->view('Seller/v_seller_register', $data);
         
          
   }

    public function login(){
        if($_SERVER['REQUEST_METHOD']=='POST'){

            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $data = [
                'username' => trim($_POST['username']),
                'password' => trim($_POST['password']),

                'login_err' => ''

            ];
            if($this -> usermodel->findUserByUsername($data['username'])){
                redirect();
            }else{
                $data['login_err'] = 'Invalid username or password.';
            }

        if(empty($data['login_err'])){

            $loggeduser = $this -> userModel->login($data['username'],$data['password']);

            if($loggeduser){
                $this->create_user_session($loggeduser);
            }else{
                $data['login_err'] = 'Invalid username or password.';
                $this ->view('Seller/v_login', $data);
            }
        }else{
            $this->view('Seller/v_login', $data);
        }
    }else{
        $data = [
            'username' =>'',
            'password' =>'',

            'login_err' =>''
        ];

        $this->view('Seller/v_login', $data);
    }
}

    public function forgot_password(){
        $data=[];
        $this->view('Seller/v_forgotpw', $data);
    }

    public function create_user_session($user){
        $_SESSION['user_id'] = $user->user_id;
        $_SESSION['usernames'] = $user->first_name;
        $_session['Gender'] = $user->gender;
        redirect();
    }

    public function logout(){
        unset($_SESSION['user_id']);
        unset($_SESSION['username']);
        session_destroy();
        redirect();
    }

    public function isLoggedIn(){
        if(isset($_SESSION['user_id'])){
            return true;
        }else{
            return false;
        }
    }

    public function view_profile(){
        $data=[
            'title' => 'Sobawitha'
        ];
        $this->view('Seller/v_view_profile', $data);
       }

       public function change_pwd(){
        $data=[
            'title' => 'Sobawitha'
        ];
        $this->view('Seller/v_change_pwd', $data);
       }
}
?>
