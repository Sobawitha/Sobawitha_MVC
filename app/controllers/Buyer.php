<?php
    class Buyer extends Controller {
        public function __construct(){
            $this-> userModel =$this->model('M_Users');
        }

        
       
    public function buyer_register()
    {
          
        if($_SERVER['REQUEST_METHOD'] == 'POST')
        {
          
        
         $_POST =  fitler_input_array(INPUT_POST,FILTER_SANITIZE_STRING);

         $data = [

            'name' => trim($_POST['name']),
            'email' => trim($_POST['email']),
            'password' => trim($_POST['password']),
            'confirm_password' => trim($_POST['confirm_password']),
            'confirm_password_err' => trim($_POST['confirm_password_err'])

            
         ];
                 
          
         
         if(empty($data['name']))
         {
                $data['name_err'] = 'This field is required';
         }


         if(empty($data['email']))
         {
                $data['email_err'] =  'This field is required';
         }
         else{
            
            if(findUserByEmail($data['email']))
            {
                 $data['email_err'] = 'Email is already is registered';
            }
             

         }
         
         if(empty($data['password']))
         {
                $data['password_err' ] =  'This field is required';
         }
        
         
         


       else if(empty($data['confirm_password'])){

              $data['confirm_password'] = 'Please confirm your password';


        }
        else
        {
   
            
                if((empty($data['password']) != empty($data['confirm_password'])))       
                      $data['confirm_password'] =  'Passwords are not mathching';
            
        }

        if(empty($data['password_err']) && empty($data['confirm_password_err']) && empty($data['name_err']) && empty($data['email_err']))
        {
                 
            $data['password'] = password_hash($data['password'],PASSWORD_DEFAULT);
            $this->userModel->register($data);


        }

        else
         $this->view('Buyer/Buyer/v_buyer_register',$data);



    }
        else{


            $data = [
                'name' => '',
                'email' => '',
                'password' => '',
                'confirm_password'=>'',
                'name_err' => '',
                'email_err' => '',
                'password_err' => '',
                 'confirm_password_err' => '',
            ];



            $this->view('Buyer/Buyer/v_buyer_register',$data);

        }





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