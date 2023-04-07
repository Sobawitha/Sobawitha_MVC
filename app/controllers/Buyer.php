<?php
    class Buyer extends Controller {
        private $buyerModel;
        public function __construct(){
            $this-> buyerModel =$this->model('M_buyer');
        }

       
        public function profile()
        {
         if(isset($_SESSION['user_id']) && $_SESSION['user_flag'] == 2) {
                 
            $user= $this->buyerModel->findUserByID($_SESSION['user_id']);
            $data=[                      
              'user_id'=>$user->user_id,
              'first_name'=>$user->first_name,
              'last_name'=>$user->last_name,
              'nic'=>$user->nic_no,
              'email'=>$user->email,
              'dob'=>$user->dob,
              'profile_picture'=>$user->profile_picture,
              'address_line_one'=>$user->address_line_one,
              'address_line_two'=>$user->address_line_two,
              'address_line_three'=>$user->address_line_three,
              'address_line_four'=>$user->address_line_four,    
              'contact_number'=>$user->contact_no,
              'gender'=>$user->gender,

              
      
              'first_name_err'=>'',
              'last_name_err'=>'',
              'nic_err'=>'',
              'contact_number_err'=>'',
              'gender_err'=>''
      
            ];
            $this->view('Buyer/Buyer/v_buyer_view_profile',$data);
        
          }else{
            redirect('Login/login');  
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