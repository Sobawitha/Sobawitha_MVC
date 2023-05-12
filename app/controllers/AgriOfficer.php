<?php
    class AgriOfficer extends Controller{
        private $agriModel;
        private $notification_model;

        public function __construct(){
            $this->agriModel = $this->model('M_AgriOfficer');
            $this->notification_model = $this->model('M_notifications');
    }

public function profile()
    {
     if(isset($_SESSION['user_id']) && $_SESSION['user_flag']==5) {
             
        $user= $this->agriModel->findUserByID($_SESSION['user_id']);
        $no_of_notifications = $this->notification_model->find_notification_count()->total_count;
        $notifications = $this->notification_model->notifications();
        $notifications_all = $this->agriModel->notifications();
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
          'qualifications'=>$user->qualifications,
          'notifications_all' => $notifications_all,
          'no_of_notifications' =>$no_of_notifications,
          'notifications' => $notifications,
          
  
          'first_name_err'=>'',
          'last_name_err'=>'',
          'nic_err'=>'',
          'contact_number_err'=>'',
          'bank_name_err'=>'',
          'account_holder_name_err'=>'',
          'branch_err'=>'',
          'account_number_err'=>'',
          'gender_err'=>'',
          'propic_err'=>'',
          


          
  
        ];
        $this->view('Agri_officer/Agri_officer/v_officer_view_profile',$data);
    
      }else{
        redirect('Login/login');  
      }
    }

    public function deactivateAccount($user_id)
    {

    if(isset($_SESSION['user_id']) && $_SESSION['user_flag']==1) {

      $deleteStatus= $this->agriModel->deactivateUser($user_id);
      
      redirect('Login/logout');
   

  }else{
    redirect('Login/login');  
  }


} 
  
public function change_profile_pic(){
    if(isset($_SESSION['user_id']) && $_SESSION['user_flag']==5) {
      if(($_SERVER['REQUEST_METHOD'] ==='POST' && $_POST['submitForm'] === 'true')){
        $_POST=filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING); 
      
      $user= $this->agriModel->findUserByID($_SESSION['user_id']);
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
        'gender'=>$user->gender,
        'qualifications'=>$user->qualifications,
        

        'first_name_err'=>'',
        'last_name_err'=>'',
        'nic_err'=>'',
        'contact_number_err'=>'',
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
      
      $changeStatus= $this->agriModel->updateProPic($data);
      
      
      
        $this->view('Admin/Admin/v_admin_view_profile',$data);
    
   
    }
    }else{
      redirect('Login/login');  
    }
    

}
    
public function delete_profile_pic(){
    if(isset($_SESSION['user_id']) && $_SESSION['user_flag']==5) {
       
      $user_id=$_SESSION['user_id'];
      $user_gender=$_SESSION['user_gender'];
      $deleteStatus= $this->agriModel->deleteProPic($user_id,$user_gender);
      
      $data=[
        'delete'=>$deleteStatus
      ];
      
      redirect('AgriOfficer/Profile');
   

    }else{
      redirect('Login/login');  
    }

  }
  
  public function updateProfile(){
    if(isset($_SESSION['user_id']) && $_SESSION['user_flag']==5) {
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
            
            
        
            
            'first_name_err'=>'',
            'last_name_err'=>'',
            'address_line_one_err'=>'',
            'address_line_two_err'=>'',
            'address_line_three_err'=>'',
            'address_line_four_err'=>'',
            'contact_number_err'=>'',
            'nic_err'=>'',
            'birthday_err'=>'',
          
            
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
        
      

    if(empty($data['first_name_err']) && empty($data['last_name_err']) && empty($data['address_line_one_err']) && empty($data['address_line_two_err']) && empty($data['address_line_three_err'])  && empty($data['nic_err'])&& empty($data['contact_number_err']) && empty($data['birthday_err']) && empty($data['address_line_four_err'])){
        
        if($this->agriModel->updateAgri($data)){
            //   flash('post_msg', 'add new admin successfully');
            $_SESSION['profile_updateAdmin']="true";
            
            $_SESSION['success_msg'] = 'Profile updated successfully';
            redirect('AgriOfficer/profile'); 
        }else{
            die('Error creating');
        }  
    
        }else{
        $this->view('Agri_officer/Agri_officer/v_officer_update_profile',$data);

        }

      }else{
        
        $user= $this->agriModel->findUserByID($_SESSION['user_id']);
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
         
          
  
          'first_name_err'=>'',
          'last_name_err'=>'',
          'address_line_one_err'=>'',
          'address_line_two_err'=>'',
          'address_line_three_err'=>'',
          'address_line_four_err'=>'',
          'contact_number_err'=>'',
          'nic_err'=>'',
          'birthday_err'=>'',
          'propic_err'=>'',
         
  
        ];
        $this->view('Agri_officer/Agri_officer/v_officer_update_profile',$data);
      }

      }else{
        redirect('Login/login');  
      }
  
    }
}
?>