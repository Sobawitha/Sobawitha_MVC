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

        

        


}

?>