<?php
    class Supplier extends Controller{

        private $supplierModel;
        public function __construct(){
            $this->supplierModel = $this->model('M_Supplier');
    }

    public function supplier_register(){
       
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
                'gender'=>trim($_POST['ssu_gender']),
                'propic'=>$_FILES['pro_pic'],
                'bank_account_name'=>trim($_POST['bank_account_name']),
                'bank_account_no'=>trim($_POST['bank_account_no']),
                'bank'=>trim($_POST['bank']),
                'branch'=>trim($_POST['branch']),
                'password'=>trim($_POST['password']),
                'confirm_password'=>trim($_POST['confirm_password']),
                // 'profile_pic_name'=>trim($_POST['first_name']).' '.trim($_POST['last_name']).'_'.$_FILES['pp']['name'],
                'propic_name'=>trim($_POST['first_name']).' '.trim($_POST['last_name']).'_'.$_FILES['pro_pic']['name'],
   
        
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
        
            if($this->supplierModel->findUserByEmail($data['email'])){
                $data['email_err']='Email is already exists';
            } 

            if(empty($data['propic'])){
                $data['propic_err']='profile picture cannot be empty';
            
            }
            else{
                $fileExt=explode('.',$_FILES['pro_pic']['name']);
                $fileActualExt=strtolower(end($fileExt));
                $allowed=array('jpg','jpeg','png');
  
              
                if(!in_array($fileActualExt,$allowed)){
                  $data['propic_err']='You cannot upload files of this type';
  
                }
          
  
                if($data['propic']['size']>0){
                  if(uploadFile($data['propic']['tmp_name'],$data['propic_name'],'/upload/user_profile_pics')){
                            
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
      
            if(empty($data['gender'])){
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

            if($data['password']!=$data['confirm_password']){
                $data['password_err']='passwords do not match';
               }

  
          if(empty($data['first_name_err']) && empty($data['last_name_err']) && empty($data['address_line_one_err']) && empty($data['address_line_two_err']) && empty($data['address_line_three_err'])  && empty($data['nic_err'])&& empty($data['contact_number_err'])&& empty($data['email_err']) && empty($data['password_err']) && empty($data['confirm_password_err'])&& empty($data['gender_err']) && empty($data['birthday_err']) && empty($data['bank_account_no_err']) && empty($data['bank_account_name_err']) && empty($data['bank_err']) && empty($data['branch_err']) && empty($data['propic_err']) && empty($data['address_line_four_err'])){
            $data['password']=password_hash($data['password'],PASSWORD_DEFAULT);  
            if($this->supplierModel->addSupplier($data)){
                //   flash('post_msg', 'add new seller successfully');
                       redirect('Login/login'); 
              }else{
                die('Error creating');
                
              }  
         
            }else{
              $this->view('Raw_material_supplier/Raw_material_supplier/v_supplier_register',$data);
  
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
            'ssu_gender'=>'',
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
   
        $this->view('Raw_material_supplier/Raw_material_supplier/v_supplier_register',$data);
  
    }

  
}       

public function profile()
{
 if(isset($_SESSION['user_id']) && $_SESSION['user_flag']==4) {
         
    $user= $this->supplierModel->findUserByID($_SESSION['user_id']);
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
      'bank_name'=>$user->bank,
      'account_holder_name'=>$user->bank_account_name,
      'branch'=>$user->branch,
      'account_number'=>$user->bank_account_no,
      'gender'=>$user->gender,
      

      'first_name_err'=>'',
      'last_name_err'=>'',
      'nic_err'=>'',
      'contact_number_err'=>'',
      'bank_name_err'=>'',
      'account_holder_name_err'=>'',
      'branch_err'=>'',
      'account_number_err'=>'',
      'gender_err'=>''

    ];
    $this->view('Raw_material_supplier/Raw_material_supplier/v_supplier_view_profile',$data);

  }else{
    redirect('Login/login');  
  }

} 
           
    }
   
   

?>