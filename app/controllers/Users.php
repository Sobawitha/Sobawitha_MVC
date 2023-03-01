<?php
    class users extends Controller {
        private $userModel;
        public function __construct(){
            $this-> userModel =$this->model('M_Users');
        }

        public function register(){
            $data=[];
            $this->view('/users/v_register', $data);
        }
        
        public function changePW()
        {
        
            if(isset($_SESSION['user_id']) && $_SESSION['user_flag'] == 1||2||3||4||5 ) {
        
            //  $user= $this->userModel->changeUserPW($_SESSION['admin_id']);
            $data=[                      
                'current_password_err'=>'',
                'retype_new_password_err'=>'' ,
                'new_password_err'=>''
            ];
            $this->view('Users/user/v_changePW',$data);

        }else{
            redirect('Login/login');  
        }
        }

        public function updatePW($id){
            if(isset($_SESSION['user_id']) && $_SESSION['user_flag']==1||2||3||4||5) {
              if($_SERVER["REQUEST_METHOD"] == 'POST'){
               $_POST=filter_input_array(INPUT_POST,FILTER_SANITIZE_STRING);
         
               $data = [
                 'user_id' => $id,  
                 'current_password'=>trim($_POST['current_password']),
                 'new_password'=>trim($_POST['new_password']),      
                 'retype_new_password'=>trim($_POST['retype_new_password']),      
               
                 'current_password_err'=>'',
                 'retype_new_password_err'=>'' ,
                 'new_password_err'=>'' 
                ];      
                
        
               if(empty($data['current_password'])){
                 $data['current_password_err']='Please enter your current password';
               }else{
                  if($this->userModel->findUserPWMatch($id,$data['current_password'])){
             
                 }else{
                        $data['current_password_err']='Current password is incorrect';
                  }  
                
               }

               if($data['new_password']!=$data['retype_new_password']){
                $data['new_password_err']='New password and retype new password is incorrect';
               } 
        
               if(empty($data['new_password'])){
                  $data['new_password_err']='Please enter a new password';
               } 
               
               if(empty($data['retype_new_password'])){
                $data['retype_new_password_err']='Please retype your new password';
             } 
        
               if(empty($data['current_password_err']) && empty($data['retype_new_password_err']) && empty($data['new_password_err'])){
             
                $data['password']=password_hash($data['new_password'],PASSWORD_DEFAULT);
                $changeUserPW=$this->userModel->changePW($data);
        
                  if($changeUserPW){
                    $_SESSION['profileUpdatePassword']="true";
                    if($_SESSION['user_flag']==1){
                        redirect('Admin/profile');      
                    }else if($_SESSION['user_flag']==2){
                        redirect('Buyer/profile');
                    }else if($_SESSION['user_flag']==3){
                        redirect('Seller/profile');
                    }else if($_SESSION['user_flag']==4){
                        redirect('Supplier/profile');
                    }else if($_SESSION['user_flag']==5){
                        redirect('AgriOfficer/profile');
                    }
                  }
                  else{
                   $data['retype_new_password_err']='something wrong';
                   $this->view('Users/user/v_changePW',$data);
                  }   
               }else{
                 $this->view('Users/user/v_changePW',$data);
               } 

             }else{
             $data = [
              'current_password'=>'',
              'new_password'=>'',      
              'retype_new_password'=>'',      
            
              'current_password_err'=>'',
              'retype_new_password_err'=>'' ,
              'new_password_err'=>''    
             ];
              $this->view('Users/user/v_changePW',$data);     
           }
          }else{
            redirect('Login/login');  
          }
        
        }  

        public function forgot_password(){
            $data=[];
            $this->view('users/v_fogotpw', $data);
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