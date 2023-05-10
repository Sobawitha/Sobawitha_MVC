
<?php

    class Seller extends Controller{
        private $sellerModel;

        public function __construct(){
            $this->sellerModel = $this->model('M_Seller');
    }
    
    //
    public function seller_register(){
            if($_SERVER['REQUEST_METHOD']=='POST'){
                $_POST=filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
                     
                   $verificationCode = generateVerificationCode();     

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
                    'propic'=>$_FILES['propic'],
                    'bank_account_name'=>trim($_POST['bank_account_name']),
                    'bank_account_no'=>trim($_POST['bank_account_no']),
                    'bank'=>trim($_POST['bank']),
                    'branch'=>trim($_POST['branch']),
                    'password'=>trim($_POST['password']),
                    'confirm_password'=>trim($_POST['confirm_password']),
                    // 'profile_pic_name'=>trim($_POST['first_name']).' '.trim($_POST['last_name']).'_'.$_FILES['pp']['name'],
                    'propic_name'=>trim($_POST['first_name']).' '.trim($_POST['last_name']).'_'.$_FILES['propic']['name'],
                    'verify_token' => $verificationCode,
            
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
            
                if($this->sellerModel->findUserByEmail($data['email'])){
                    $data['email_err']='Email is already exists';
                } 

                if($this->sellerModel->findSameNic($data['nic'])){
                    $data['nic_err']='Nic no is already exists';
                } 
    
                if(empty($data['propic'])){
                    $data['propic_err']='profile picture cannot be empty';
                
                }
                else{
                    $fileExt=explode('.',$_FILES['propic']['name']);
                    $fileActualExt=strtolower(end($fileExt)); //Convert the file extension to lowercase
                    $allowed=array('jpg','jpeg','png');
      
                  
                    if(!in_array($fileActualExt,$allowed)){
                      $data['propic_err']='You cannot upload files of this type';
                    }
              
                    if($data['propic']['size']>0){
                      if(uploadFile($data['propic']['tmp_name'],$data['propic_name'],'/upload/user_profile_pics/')){
                                
                      }else{  
                      $data['propic_err']='Unsuccessful propic uploading';
                      
                      }
                    }else{
                      $data[ 'propic_err'] ="Profile picture size is empty";
                    
                    }
          
                }
    
                 // if(empty($data['first_name'])){
                //     $data['first_name_err']='first name cannot be empty';
                // }
                $firstNameValidationResult = validateFirstName($data['first_name']);

                if (empty($data['first_name']) || $firstNameValidationResult !== true) {
                    $data['first_name_err'] = empty($data['first_name']) ? 'first name cannot be empty' : $firstNameValidationResult;
                }
                        
                $lastNameValidationResult = validateLastName($data['last_name']);

                if ($lastNameValidationResult !== true || empty($data['first_name'])) {
                    $data['last_name_err'] = empty($data['last_name_err']) ? 'last name cannot be empty' : $lastNameValidationResult;
                }
                     
                
                $emailValidationResult = validateEmail($data['email']);

                if ($emailValidationResult !== true || empty($data['email'])) {
                    $data['email_err'] = empty($data['email_err']) ? 'email cannot be empty' : $emailValidationResult;
                }
                 
                $contactValidationResult = validateContactNumber($data['contact_number']);

                if ($contactValidationResult !== true || empty($data['contact_number'])) {
                    $data['contact_number_err'] = empty($data['contact_number_err']) ? 'contact number cannot be empty' : $contactValidationResult ;
                }
                
                $nicValidationResult = validateNIC($data['nic']);

                if ($nicValidationResult !== true || empty($data['nic'])) {
                    $data['nic_err'] = empty($data['nic_err']) ? 'nic number cannot be empty' : $nicValidationResult;
                }

                $addressValidationResult = validateAddress($data['address_line_one']);

                if ($addressValidationResult !== true || empty($data['address_line_one'])) {
                    $data['address_line_one_err'] = empty($data['address_line_one_err']) ? 'address line 01 cannot be empty' : $addressValidationResult ;
                }

                $addressValidationResult = validateAddress($data['address_line_two']);

                if ($addressValidationResult !== true || empty($data['address_line_two'])) {
                    $data['address_line_two_err'] = empty($data['address_line_two_err']) ? 'address line 02 cannot be empty' : $addressValidationResult ;
                }

                $addressValidationResult = validateAddress($data['address_line_three']);

                if ($addressValidationResult !== true || empty($data['address_line_three'])) {
                    $data['address_line_three_err'] = empty($data['address_line_three_err']) ? 'address line 03 cannot be empty' : $addressValidationResult ;
                }

                $birthdayValidationResult = validateBirthDate($data['birthday']);

                if ($birthdayValidationResult !== true || empty($data['birthday'])) {
                    $data['birthday_err'] = empty($data['birthday_err'])  ? 'birthday cannot be empty' : $birthdayValidationResult ;
                }
                
                $bankaccnoValidationResult = validateAccountNumber($data['bank_account_no']);

                if ($bankaccnoValidationResult !== true || empty($data['bank_account_no'])) {
                    $data['bank_account_no_err'] = empty($data['bank_account_no_err'])  ? 'bank account number cannot be empty' : $bankaccnoValidationResult ;
                }

                $bankValidationResult = validateBankName($data['bank']);

                if ($bankValidationResult !== true || empty($data['bank'])) {
                    $data['bank_err'] = empty($data['bank_err'])  ? 'bank cannot be empty' : $bankValidationResult ;
                }

                $branchValidationResult = validateBankBranch($data['branch']);

                if ($branchValidationResult !== true || empty($data['branch'])) {
                    $data['branch_err'] = empty($data['branch_err'])  ? 'branch cannot be empty' : $branchValidationResult ;
                }

                $accholderValidationResult = validateAccountHolderName($data['bank_account_name']);

                if ($accholderValidationResult !== true || empty($data['bank_account_name'])) {
                    $data['bank_account_name_err'] = empty($data['bank_account_name_err'])  ? 'bank account holder name cannot be empty' : $accholderValidationResult ;
                }

                $pwdValidationResult = validatePassword($data['password']);

                if ($pwdValidationResult !== true || empty($data['password'])) {
                    $data['password_err'] = empty($data['password_err'])  ? 'password cannot be empty' : $pwdValidationResult ;
                }

                $cpwdValidateResult = validatePassword($data['confirm_password']);

                if($cpwdValidateResult !== true || empty($data['confirm_password'])){
                  $data['confirm_password_err'] = empty($data['confirm_password']) ? 'password cannot be empty' : $cpwdValidateResult ;
                }

                if($data['password']!=$data['confirm_password']){
                    $data['password_err']='passwords do not match';
                }
                
             
      
              if(empty($data['first_name_err']) && empty($data['last_name_err']) && empty($data['address_line_one_err']) && empty($data['address_line_two_err']) && empty($data['address_line_three_err'])  && empty($data['nic_err'])&& empty($data['contact_number_err'])&& empty($data['email_err']) && empty($data['password_err']) && empty($data['confirm_password_err'])&& empty($data['gender_err']) && empty($data['birthday_err']) && empty($data['bank_account_no_err']) && empty($data['bank_account_name_err']) && empty($data['bank_err']) && empty($data['branch_err']) && empty($data['propic_err'])){
                
                $data['password']=password_hash($data['password'],PASSWORD_DEFAULT);  
                
                if($this->sellerModel->addSeller($data)){
                    //   flash('post_msg', 'add new seller successfully');
                       $flag=3;
                       sendMail($data['email'],$data['first_name'], $verificationCode, $flag, '','','');
                       redirect('Users/verify_email/'.$data['email']); 
                  }else{
                    die('Error creating');
                  }  
             
                }else{
                  $this->view('Seller/seller/v_seller_register',$data);
      
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
       
            $this->view('Seller/seller/v_seller_register',$data);
      
        }
    
}    
        

    public function isLoggedIn(){
        if(isset($_SESSION['user_id'])){
            return true;
        }else{
            return false;
        }
    }

    public function profile()
    {
     if(isset($_SESSION['user_id']) && $_SESSION['user_flag']==3) {
             
        $user= $this->sellerModel->findUserByID($_SESSION['user_id']);
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
          'gender_err'=>'',
          'propic_err'=>''
  
        ];
        $this->view('Seller/Seller/v_seller_view_profile',$data);
    
      }else{
        redirect('Login/login');  
      }
    
 } 

 public function change_profile_pic(){
    if(isset($_SESSION['user_id']) && $_SESSION['user_flag']==3) {
      if(($_SERVER['REQUEST_METHOD'] ==='POST' && $_POST['submitForm'] === 'true')){
        $_POST=filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING); 
      
      $user= $this->sellerModel->findUserByID($_SESSION['user_id']);
      $data=[
        'propic'	=>$_FILES['propic'],
        'propic_name'=>$_SESSION['username'].' '.$_SESSION['lastname'].'_'.$_FILES['propic']['name'],
         
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
        'gender_err'=>'',
        'propic_err'=>''

      ];
      if(empty($data['propic'])){
        $data['propic_err']="Please select a profile picture";

      }else{
          $fileExt=explode('.',$_FILES['propic']['name']);
          $fileActualExt=strtolower(end($fileExt));
          $allowed=array('jpg','jpeg','png');

      
          if(!in_array($fileActualExt,$allowed)){
          $data['propic_err']='You cannot upload files of this type';

          }

          
          if ($data['propic']['size'] > 0) {
            
                  if(uploadFile($data['propic']['tmp_name'],$data['propic_name'],'/upload/user_profile_pics/')){
                              
                  }else{  
                  $data['propic_err']='Unsuccessful propic uploading';
                  
                  }
          }else{
                $data[ 'propic_err'] ="Profile picture file size is empty";
          
          }

      }
      
      $changeStatus= $this->sellerModel->updateProPic($data);
      
      
      
        $this->view('Seller/Seller/v_seller_view_profile',$data);
    }
   

    }else{
      redirect('Login/login');  
    }


  }

  public function deactivateAccount($user_id)
  {

  if(isset($_SESSION['user_id']) && $_SESSION['user_flag']==3) {

    $deleteStatus= $this->sellerModel->deactivateUser($user_id);
    
    redirect('Login/logout');
 

}else{
  redirect('Login/login');  
}


} 

public function updateProfile(){
    if(isset($_SESSION['user_id']) && $_SESSION['user_flag']==3) {
        if(($_SERVER['REQUEST_METHOD']=='POST' && $_POST['submitForm'] === 'true')){
          $_POST=filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
          
          $data=[
            'user_id'=>$_SESSION['user_id'],
            'email'=>$_SESSION['user_email'],
            'first_name'=>trim($_POST['first_name']),
            'last_name'=>trim($_POST['last_name']),
            'address_line_one'=>trim($_POST['address_line_one']),
            'address_line_two'=>trim($_POST['address_line_two']),
            'address_line_three'=>trim($_POST['address_line_three']),
            'address_line_four'=>trim($_POST['address_line_four']),
            'contact_number'=>trim($_POST['contact_number']),
            'nic'=>trim($_POST['nic']),
            'birthday'=>trim($_POST['birthday']),
            'bank_account_name'=>trim($_POST['bank_account_name']),
            'bank_account_no'=>trim($_POST['bank_account_no']),
            'bank'=>trim($_POST['bank']),
            'branch'=>trim($_POST['branch']),
            
        
            
            'first_name_err'=>'',
            'last_name_err'=>'',
            'address_line_one_err'=>'',
            'address_line_two_err'=>'',
            'address_line_three_err'=>'',
            'address_line_four_err'=>'',
            'contact_number_err'=>'',
            'nic_err'=>'',
            'birthday_err'=>'',
            'bank_account_name_err'=>'',
            'bank_err'=>'',
            'branch_err'=>'',
            'bank_account_no_err'=>'',
            
        ];

        if(empty($data['first_name'])){
            $data['first_name_err']='first name cannot be empty';
        }else{
          $firstNameValidationResult = validateFirstName($data['first_name']);

          if ($firstNameValidationResult !== true || empty($data['first_name'])) {
              $data['first_name_err'] = !empty($firstNameValidationResult) ? $firstNameValidationResult : 'first name cannot be empty';
          }
        }


        if(empty($data['last_name'])){
            $data['last_name_err']='last name cannot be empty';
        }else{
          $lastNameValidationResult = validateLastName($data['last_name']);

          if ($lastNameValidationResult !== true || empty($data['first_name'])) {
              $data['last_name_err'] = !empty($lastNameValidationResult) ? $lastNameValidationResult : 'last name cannot be empty';
          }
        }

        if(empty($data['address_line_one'])){
            $data['address_line_one_err']='address line 01 cannot be empty';
        }else{
          $addressValidationResult = validateAddress($data['address_line_one']);

          if ($addressValidationResult !== true || empty($data['address_line_one'])) {
              $data['address_line_one_err'] = !empty($addressValidationResult) ? $addressValidationResult : 'address line 01 cannot be empty';
          }
        }

        if(empty($data['address_line_two'])){
            $data['address_line_two_err']='address line 02 cannot be empty';
        }else{
          $addressValidationResult = validateAddress($data['address_line_two']);

          if ($addressValidationResult !== true || empty($data['address_line_two'])) {
              $data['address_line_two_err'] = !empty($addressValidationResult) ? $addressValidationResult : 'address line 02 cannot be empty';
          }
        }

        if(empty($data['address_line_three'])){
            $data['address_line_three_err']='address line 03 cannot be empty';
        }else{
          $addressValidationResult = validateAddress($data['address_line_three']);

          if ($addressValidationResult !== true || empty($data['address_line_three'])) {
              $data['address_line_three_err'] = !empty($addressValidationResult) ? $addressValidationResult : 'address line 03 cannot be empty';
          }

        }

        if(empty($data['nic'])){
        $data['nic_err']='nic cannot be empty';
        }else{
          $nicValidationResult = validateNIC($data['nic']);

          if ($nicValidationResult !== true || empty($data['nic'])) {
              $data['nic_err'] = !empty($nicValidationResult) ? $nicValidationResult : 'nic number cannot be empty';
          }

        }

        if(empty($data['contact_number'])){
            $data['contact_number_err']='contact number cannot be empty';
        }else{
          $contactValidationResult = validateContactNumber($data['contact_number']);

          if ($contactValidationResult !== true || empty($data['contact_number'])) {
              $data['contact_number_err'] = !empty($contactValidationResult) ? $contactValidationResult : 'contact number cannot be empty';
          }
        }

        if(empty($data['birthday'])){
            $data['birthday_err']='birthday cannot be empty';
        }else{
          $birthdayValidationResult = validateBirthDate($data['birthday']);

          if ($birthdayValidationResult !== true || empty($data['birthday'])) {
              $data['birthday_err'] = !empty($birthdayValidationResult)  ? $birthdayValidationResult : 'birthday cannot be empty';
          }
        }
        
        if(empty($data['bank_account_no'])){
            $data['bank_account_no_err']='bank account number cannot be empty';
        }else{
          $bankaccnoValidationResult = validateAccountNumber($data['bank_account_no']);

          if ($bankaccnoValidationResult !== true || empty($data['bank_account_no'])) {
              $data['bank_account_no_err'] = !empty($bankaccnoValidationResult)  ? $bankaccnoValidationResult : 'bank account number cannot be empty';
          }
        }

        if(empty($data['bank_account_name'])){
            $data['bank_account_name_err']='bank account name cannot be empty';
        }else{
          $accholderValidationResult = validateAccountHolderName($data['bank_account_name']);

          if ($accholderValidationResult !== true || empty($data['bank_account_name'])) {
              $data['bank_account_name_err'] = !empty($accholderValidationResult)  ? $accholderValidationResult : 'bank account holder name cannot be empty';
          }
        }
    
        if(empty($data['bank'])){
            $data['bank_err']='bank name cannot be empty';
        }else{
          $bankValidationResult = validateBankName($data['bank']);

          if ($bankValidationResult !== true || empty($data['bank'])) {
              $data['bank_err'] = !empty($bankValidationResult)  ? $bankValidationResult : 'bank cannot be empty';
          }

        }

        if(empty($data['branch'])){
            $data['branch_err']='bank branch cannot be empty';
        }else{
          $branchValidationResult = validateBankBranch($data['branch']);

          if ($branchValidationResult !== true || empty($data['branch'])) {
              $data['branch_err'] = !empty($branchValidationResult)  ? $branchValidationResult : 'branch cannot be empty';
          }
        }

    if(empty($data['first_name_err']) && empty($data['last_name_err']) && empty($data['address_line_one_err']) && empty($data['address_line_two_err']) && empty($data['address_line_three_err'])  && empty($data['nic_err'])&& empty($data['contact_number_err']) && empty($data['birthday_err']) && empty($data['bank_account_no_err']) && empty($data['bank_account_name_err']) && empty($data['bank_err']) && empty($data['branch_err'])  && empty($data['address_line_four_err'])){
        
        if($this->sellerModel->updateSeller($data)){
            //   flash('post_msg', 'add new admin successfully');
            $_SESSION['profile_updateAdmin']="true";
            
            $_SESSION['success_msg'] = 'Profile updated successfully';
            redirect('Seller/profile'); 
        }else{
            die('Error creating');
        }  
    
        }else{
        $this->view('Seller/Seller/v_seller_update_profile',$data);

        }

      }else{
        
        $user= $this->sellerModel->findUserByID($_SESSION['user_id']);
        $data=[                      
          'user_id'=>$user->user_id,
          'first_name'=>$user->first_name,
          'last_name'=>$user->last_name,
          'nic'=>$user->nic_no,
          'email'=>$user->email,
          'birthday'=>$user->dob,
          'profile_picture'=>$user->profile_picture,
          'address_line_one'=>$user->address_line_one,
          'address_line_two'=>$user->address_line_two,
          'address_line_three'=>$user->address_line_three,
          'address_line_four'=>$user->address_line_four,    
          'contact_number'=>$user->contact_no,
          'bank'=>$user->bank,
          'bank_account_name'=>$user->bank_account_name,
          'branch'=>$user->branch,
          'bank_account_no'=>$user->bank_account_no,
          
  
          'first_name_err'=>'',
          'last_name_err'=>'',
          'address_line_one_err'=>'',
          'address_line_two_err'=>'',
          'address_line_three_err'=>'',
          'address_line_four_err'=>'',
          'contact_number_err'=>'',
          'nic_err'=>'',
          'birthday_err'=>'',
          'bank_account_name_err'=>'',
          'bank_err'=>'',
          'branch_err'=>'',
          'bank_account_no_err'=>'',
          'propic_err'=>'',
         
  
        ];
        $this->view('Seller/Seller/v_seller_update_profile',$data);
      }

      }else{
        redirect('Login/login');  
      }
  
    }

    public function delete_profile_pic(){
        if(isset($_SESSION['user_id']) && $_SESSION['user_flag']==3) {
           
          $user_id=$_SESSION['user_id'];
          $user_gender=$_SESSION['user_gender'];
          $deleteStatus= $this->sellerModel->deleteProPic($user_id,$user_gender);
          
          $data=[
            'delete'=>$deleteStatus
          ];
          
          redirect('Seller/profile');
       
    
        }else{
          redirect('Login/login');  
        }
    
      }

}
?>