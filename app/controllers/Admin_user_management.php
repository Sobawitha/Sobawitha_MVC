<?php
    class Admin_user_management extends Controller{
        private $adminUserMngtModel;

        public function __construct(){
            $this->adminUserMngtModel = $this->model('M_Admin_user_management');
    }
   
   public function user_manage(){
    $data=[
        'title' => 'Sobawitha'
    ];
    $this->view('Admin/AdminUserManagement/v_user_management', $data);
  
   }

   public function add_new_agri(){
    if(isset($_SESSION['user_id'])){  
  
        if($_SERVER['REQUEST_METHOD']=='POST'){
            $_POST=filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            
                $data=[
                'first_name'=>trim($_POST['first_name']),
                'last_name'=>trim($_POST['last_name']),
                'address_line_one'=>trim($_POST['address_line_one']),
                'address_line_two'=>trim($_POST['address_line_two']),
                'address_line_three'=>trim($_POST['address_line_three']),
                'address_line_four'=>trim($_POST['address_line_four']),
                'email'=>trim($_POST['email']),
                'contact_number'=>trim($_POST['contact_number']),
                'nic'=>trim($_POST['nic']),
                'birthday'=>trim($_POST['birthday']),
                'a_gender'=>trim($_POST['a_gender']),
                'aa_propic'=>$_FILES['aa_propic'],
                'qualification'=>trim($_POST['qualification']),
                'password'=>trim($_POST['password']),
                'confirm_password'=>trim($_POST['confirm_password']),
                // 'profile_pic_name'=>trim($_POST['first_name']).' '.trim($_POST['last_name']).'_'.$_FILES['pp']['name'],
                'propic_name'=>trim($_POST['first_name']).' '.trim($_POST['last_name']).'_'.$_FILES['aa_propic']['name'],
   
        
                'first_name_err'=>'',
                'last_name_err'=>'',
                'address_line_one_err'=>'',
                'address_line_two_err'=>'',
                'address_line_three_err'=>'',
                'address_line_four_err'=>'',
                'email_err'=>'',
                'contact_number_err'=>'',
                'nic_err'=>'',
                'birthday_err'=>'',
                'gender_err'=>'',
                // //'profile_pic_err'=>'',
                'qualification_err'=>'',
                'password_err'=>'',
                'confirm_password_err'=>'',
                'propic_err'=>'',
            ];
        
            if($this->adminUserMngtModel->findUserByEmail($data['email'])){
                $data['email_err']='Email is already exists';
            } 

            if(empty($data['aa_propic'])){
                $data['propic_err']='profile picture cannot be empty';
            
            }
            else{
                $fileExt=explode('.',$_FILES['aa_propic']['name']);
                $fileActualExt=strtolower(end($fileExt));
                $allowed=array('jpg','jpeg','png');
  
              
                if(!in_array($fileActualExt,$allowed)){
                  $data['propic_err']='You cannot upload files of this type';
  
                }
          
  
                if($data['aa_propic']['size']>0){
                  if(uploadFile($data['aa_propic']['tmp_name'],$data['propic_name'],'/upload/')){
                            
                  }else{  
                  $data['propic_err']='Unsuccessful propic uploading';
                  
                  }
                }else{
                  $data[ 'propic_err'] ="qualification file size is empty";
                
                }
      
            }


            if(empty($data['first_name'])){
                $data['first_name_err']='first name cannot be empty';
            }
        
            if(empty($data['last_name'])){
                $data['last_name_err']='last name cannot be empty';
            }

            if(empty($data['address_line_one'])){
                $data['address_line_one_err']='address line 01 cannot be empty';
            }
        
            if(empty($data['address_line_two'])){
                $data['address_line_two_err']='address line 02 cannot be empty';
            }
        
            if(empty($data['address_line_three'])){
                $data['address_line_three_err']='address line 03 cannot be empty';
            }
      
            if(empty($data['nic'])){
            $data['nic_err']='nic cannot be empty';
            }
      
            if(empty($data['contact_number'])){
                $data['contact_number_err']='contact number cannot be empty';
            }
        
            if(empty($data['email'])){
                $data['email_err']='email cannot be empty';
            }

            if(empty($data['birthday'])){
                $data['birthday_err']='birthday cannot be empty';
            }
            
            if(empty($data['password'])){
                $data['password_err']='password cannot be empty';
            }
      
            if(empty($data['confirm_password'])){
            $data['confirm_password_err']='confirm password cannot be empty';
            }
      
            if(empty($data['a_gender'])){
            $data['gender_err']='gender cannot be empty';
            }

           
            if(empty($data['qualification'])){
                $data['qualification_err']='qualifications cannot be empty';
            }

  
          if(empty($data['first_name_err']) && empty($data['last_name_err']) && empty($data['address_line_one_err']) && empty($data['address_line_two_err']) && empty($data['address_line_three_err'])  && empty($data['nic_err'])&& empty($data['contact_number_err'])&& empty($data['email_err']) && empty($data['password_err']) && empty($data['confirm_password_err'])&& empty($data['gender_err']) && empty($data['birthday_err']) && empty($data['qualification_err']) && empty($data['propic_err']) && empty($data['address_line_four_err'])){
              if($this->adminUserMngtModel->addAgri($data)){
                  flash('post_msg', 'add new agri officer successfully');
                       redirect('Admin_user_management/user_manage'); 
              }else{
                die('Error creating');
              }  
         
            }else{
              $this->view('Admin/AdminUserManagement/v_add_agri_o',$data);
  
            }
        
             
        }else{
                
               
   
          $data=[
   
            'first_name'=>'',
            'last_name'=>'',
            'address_line_one'=>'',
            'address_line_two'=>'',
            'address_line_three'=>'',
            'address_line_four'=>'',
            'email'=>'',
            'contact_number'=>'',
            'nic'=>'',
            'birthday'=>'',
            'a_gender'=>'',
            'aa_propic'=>'',
            'qualification'=>'',
            'password'=>'',
            'confirm_password'=>'',
            'propic'=>'',
        
        
            'first_name_err'=>'',
            'last_name_err'=>'',
            'address_line_one_err'=>'',
            'address_line_two_err'=>'',
            'address_line_three_err'=>'',
            'address_line_four_err'=>'',
            'email_err'=>'',
            'contact_number_err'=>'',
            'nic_err'=>'',
            'birthday_err'=>'',
            'gender_err'=>'',
            //'profile_pic_err'=>'',
            'qualification_err' => '',
            'password_err'=>'',
            'confirm_password_err'=>'',
            'propic_err'=>'',
   
  
         
        ];
   
        $this->view('Admin/AdminUserManagement/v_add_agri_o',$data);
  
    }

  }else{
    redirect('Login/login');  
  }
}
   
   
   //Add Admin
   public function add_new_admin(){
    
    if(isset($_SESSION['user_id'])){  
  
        if($_SERVER['REQUEST_METHOD']=='POST'){
            $_POST=filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            
                $data=[
                'first_name'=>trim($_POST['first_name']),
                'last_name'=>trim($_POST['last_name']),
                'address_line_one'=>trim($_POST['address_line_one']),
                'address_line_two'=>trim($_POST['address_line_two']),
                'address_line_three'=>trim($_POST['address_line_three']),
                'address_line_four'=>trim($_POST['address_line_four']),
                'email'=>trim($_POST['email']),
                'contact_number'=>trim($_POST['contact_number']),
                'nic'=>trim($_POST['nic']),
                'birthday'=>trim($_POST['birthday']),
                'admin_gender'=>trim($_POST['admin_gender']),
                'propic'=>$_FILES['propic'],
                'bank_account_name'=>trim($_POST['bank_account_name']),
                'bank_account_no'=>trim($_POST['bank_account_no']),
                'bank'=>trim($_POST['bank']),
                'branch'=>trim($_POST['branch']),
                'password'=>trim($_POST['password']),
                'confirm_password'=>trim($_POST['confirm_password']),
                // 'profile_pic_name'=>trim($_POST['first_name']).' '.trim($_POST['last_name']).'_'.$_FILES['pp']['name'],
                'propic_name'=>trim($_POST['first_name']).' '.trim($_POST['last_name']).'_'.$_FILES['propic']['name'],
   
        
                'first_name_err'=>'',
                'last_name_err'=>'',
                'address_line_one_err'=>'',
                'address_line_two_err'=>'',
                'address_line_three_err'=>'',
                'address_line_four_err'=>'',
                'email_err'=>'',
                'contact_number_err'=>'',
                'nic_err'=>'',
                'birthday_err'=>'',
                'gender_err'=>'',
                // //'profile_pic_err'=>'',
                'bank_account_name_err'=>'',
                'bank_err'=>'',
                'branch_err'=>'',
                'bank_account_no_err'=>'',
                'password_err'=>'',
                'confirm_password_err'=>'',
                'propic_err'=>'',
            ];
        
            if($this->adminUserMngtModel->findUserByEmail($data['email'])){
                $data['email_err']='Email is already exists';
            } 

            if(empty($data['propic'])){
                $data['propic_err']='profile picture cannot be empty';
            
            }
            else{
                $fileExt=explode('.',$_FILES['propic']['name']);
                $fileActualExt=strtolower(end($fileExt));
                $allowed=array('jpg','jpeg','png');
  
              
                if(!in_array($fileActualExt,$allowed)){
                  $data['propic_err']='You cannot upload files of this type';
  
                }
          
  
                if($data['propic']['size']>0){
                  if(uploadFile($data['propic']['tmp_name'],$data['propic_name'],'/upload/')){
                            
                  }else{  
                  $data['propic_err']='Unsuccessful propic uploading';
                  
                  }
                }else{
                  $data[ 'propic_err'] ="qualification file size is empty";
                
                }
      
            }


            if(empty($data['first_name'])){
                $data['first_name_err']='first name cannot be empty';
            }
        
            if(empty($data['last_name'])){
                $data['last_name_err']='last name cannot be empty';
            }

            if(empty($data['address_line_one'])){
                $data['address_line_one_err']='address line 01 cannot be empty';
            }
        
            if(empty($data['address_line_two'])){
                $data['address_line_two_err']='address line 02 cannot be empty';
            }
        
            if(empty($data['address_line_three'])){
                $data['address_line_three_err']='address line 03 cannot be empty';
            }
      
            if(empty($data['nic'])){
            $data['nic_err']='nic cannot be empty';
            }
      
            if(empty($data['contact_number'])){
                $data['contact_number_err']='contact number cannot be empty';
            }
        
            if(empty($data['email'])){
                $data['email_err']='email cannot be empty';
            }

            if(empty($data['birthday'])){
                $data['birthday_err']='birthday cannot be empty';
            }
            
            if(empty($data['password'])){
                $data['password_err']='password cannot be empty';
            }
      
            if(empty($data['confirm_password'])){
            $data['confirm_password_err']='confirm password cannot be empty';
            }
      
            if(empty($data['admin_gender'])){
            $data['gender_err']='gender cannot be empty';
            }

            if(empty($data['bank_account_no'])){
                $data['bank_account_no_err']='bank account number cannot be empty';
            }

            if(empty($data['bank_account_name'])){
                $data['bank_account_name_err']='bank account name cannot be empty';
            }
          
            if(empty($data['bank'])){
                $data['bank_err']='bank name cannot be empty';
            }

            if(empty($data['branch'])){
                $data['branch_err']='bank branch cannot be empty';
            }

  
          if(empty($data['first_name_err']) && empty($data['last_name_err']) && empty($data['address_line_one_err']) && empty($data['address_line_two_err']) && empty($data['address_line_three_err'])  && empty($data['nic_err'])&& empty($data['contact_number_err'])&& empty($data['email_err']) && empty($data['password_err']) && empty($data['confirm_password_err'])&& empty($data['gender_err']) && empty($data['birthday_err']) && empty($data['bank_account_no_err']) && empty($data['bank_account_name_err']) && empty($data['bank_err']) && empty($data['branch_err']) && empty($data['propic_err']) && empty($data['address_line_four_err'])){
              if($this->adminUserMngtModel->addAdmin($data)){
                  flash('post_msg', 'add new admin successfully');
                       redirect('Admin_user_management/user_manage'); 
              }else{
                die('Error creating');
              }  
         
            }else{
              $this->view('Admin/AdminUserManagement/v_add_admin',$data);
  
            }
        
             
        }else{
                
               
   
          $data=[
   
            'first_name'=>'',
            'last_name'=>'',
            'address_line_one'=>'',
            'address_line_two'=>'',
            'address_line_three'=>'',
            'address_line_four'=>'',
            'email'=>'',
            'contact_number'=>'',
            'nic'=>'',
            'birthday'=>'',
            'admin_gender'=>'',
            'pp'=>'',
            'bank_account_name'=>'',
            'bank_account_no'=>'',
            'bank'=>'',
            'branch'=>'',
            'password'=>'',
            'confirm_password'=>'',
            'propic'=>'',
        
        
            'first_name_err'=>'',
            'last_name_err'=>'',
            'address_line_one_err'=>'',
            'address_line_two_err'=>'',
            'address_line_three_err'=>'',
            'address_line_four_err'=>'',
            'email_err'=>'',
            'contact_number_err'=>'',
            'nic_err'=>'',
            'birthday_err'=>'',
            'gender_err'=>'',
            //'profile_pic_err'=>'',
            'bank_account_name_err'=>'',
            'bank_err'=>'',
            'branch_err'=>'',
            'bank_account_no_err'=>'',
            'password_err'=>'',
            'confirm_password_err'=>'',
            'propic_err'=>'',
   
  
         
        ];
   
        $this->view('Admin/AdminUserManagement/v_add_admin',$data);
  
    }

  }else{
    redirect('Login/login');  
  }
}
          
     
   public function view_more(){
    $data=[
        'title' => 'Sobawitha'
    ];
    $this->view('Admin/AdminUserManagement/v_view_more_info', $data);
   }

}
?>