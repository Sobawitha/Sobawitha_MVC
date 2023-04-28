<?php
    class users extends Controller {
        public function __construct(){
            $this-> userModel =$this->model('M_Users');
        }

        
        public function admin_view_profile(){
            if(isset($_SESSION['user_id'])){
                $user_id = $_SESSION['user_id'];
                $profile_detail = $this-> userModel-> get_profile_detail($user_id);
                $data=[
                    'profile_detail' => $profile_detail,
                ];
                $this->view('Admin/Admin/v_admin_view_profile', $data);
            }
            else{
                redirect('Login/login');
            }

            
        }

        public function officer_view_profile(){
            if(isset($_SESSION['user_id'])){
                $user_id = $_SESSION['user_id'];
                $profile_detail = $this-> userModel-> get_profile_detail($user_id);
                $data=[
                    'profile_detail' => $profile_detail,
                ];
                $this->view('Agri_officer/Agri_officer/v_officer_view_profile', $data);
            }
            else{
                redirect('Login/login');
            }
            
        }

        public function seller_view_profile(){
            if(isset($_SESSION['user_id'])){
                $user_id = $_SESSION['user_id'];
                $profile_detail = $this-> userModel-> get_profile_detail($user_id);
                $data=[
                    'profile_detail' => $profile_detail,
                ];
                
                $this->view('Seller/Seller/v_seller_view_profile', $data);
                }
            else{
                redirect('Login/login');
            }
            
        }

        public function buyer_view_profile(){
            if(isset($_SESSION['user_id'])){
                $user_id = $_SESSION['user_id'];
                $profile_detail = $this-> userModel-> get_profile_detail($user_id);
                $data=[
                    'profile_detail' => $profile_detail,
                ];
                $this->view('Buyer/Buyer/v_buyer_view_profile', $data);
                }
            else{
                redirect('Login/login');
            }
            
        }

        public function supplier_view_profile(){
            if(isset($_SESSION['user_id'])){
                $user_id = $_SESSION['user_id'];
                $profile_detail = $this-> userModel-> get_profile_detail($user_id);
                $data=[
                    'profile_detail' => $profile_detail,
                ];
                $this->view('Raw_material_supplier/Raw_material_supplier/v_supplier_view_profile', $data);
            }
            else{
                redirect('Login/login');
            }
            
        }

        public function register_as_new_sletter(){
            $current_url = $_GET['current_url'];
            $url_parts = explode('/', $current_url);
            $redirect_parts = array_slice($url_parts, 2);
            $redirect_part = implode('/', $redirect_parts);
            if($_SERVER['REQUEST_METHOD']=='POST'){
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
    
                $data =[
                    'email'=> trim($_POST['email']),
                ];

                $no_of_users_have_samemail = $this->userModel->email_exists($data)->count_users;

                if($no_of_users_have_samemail >0){
                    $_SESSION['error'] = 'Email is already taken';
                    redirect($redirect_part .'#footer');

                }
                else{
                    if($this->userModel->reg_as_new_sletter($data)){
                        $_SESSION['error']='Your registration successfully';
                        redirect($redirect_part.'#footer');
                    }
                    else{
                        $_SESSION['error'] = 'Some thing happening wrong';
                        redirect($redirect_part .'#footer');

                    }
                }
    
                
            }
        }

        

        


}

?>