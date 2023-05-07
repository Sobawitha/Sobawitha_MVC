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

    //Add Agri
   public function add_new_agri(){
    if(isset($_SESSION['user_id']) && $_SESSION['user_flag'] ==1){ 
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
            'gender'=>trim($_POST['a_gender']),
            'propic'=>$_FILES['propic'],
            'qualification'=>$_FILES['qualification'],
            'password'=>trim($_POST['password']),
            'email_pwd'=>trim($_POST['password']),
            'confirm_password'=>trim($_POST['confirm_password']),
            // 'profile_pic_name'=>trim($_POST['first_name']).' '.trim($_POST['last_name']).'_'.$_FILES['pp']['name'],
            'propic_name'=>trim($_POST['first_name']).' '.trim($_POST['last_name']).'_'.$_FILES['propic']['name'],
            'qualification_file_name'=>trim($_POST['first_name']).' '.trim($_POST['last_name']).'_'.$_FILES['qualification']['name'],


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
            'qualification_err'=>'',
        ];

        if($this->adminUserMngtModel->findUserByEmail($data['email'])){
            $data['email_err']='Email is already exists';
        } 
        
        if($this->adminUserMngtModel->findSameNic($data['nic'])){
            $data['nic_err']='NIC no is already exists';
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
            if(uploadFile($data['propic']['tmp_name'],$data['propic_name'],'/upload/user_profile_pics/')){
                        
            }else{  
            $data['propic_err']='Unsuccessful propic uploading';
            
            }
            }else{
            $data[ 'propic_err'] ="profile picture size is empty";
            
            }

        }

        if(empty($data['qualification'])){
            $data['qualification_err']='qualification file cannot be empty';
        
        }
        else{
            $fileExt=explode('.',$_FILES['qualification']['name']);
            $fileActualExt=strtolower(end($fileExt));
            $allowed=array('pdf','txt','doc','docx');

        
            if(!in_array($fileActualExt,$allowed)){
            $data['qualification_err']='You cannot upload files of this type';

            }
    

            if($data['qualification']['size']>0){
            if(uploadFile($data['qualification']['tmp_name'],$data['qualification_file_name'],'/upload/qualification_files/')){
                        
            }else{  
            $data['qualification_err']='Unsuccessful qualification file uploading';
            
            }
            }else{
            $data[ 'qualification_err'] ="qualification file size is empty";
            
            }

        }


        $firstNameValidationResult = validateFirstName($data['first_name']);

        if (empty($data['first_name']) || $firstNameValidationResult !== true  ) {
            $data['first_name_err'] = !empty($firstNameValidationResult) ? $firstNameValidationResult : 'first name cannot be empty';
        }


        $lastNameValidationResult = validateLastName($data['last_name']);

        if ($lastNameValidationResult !== true || empty($data['first_name'])) {
            $data['last_name_err'] = !empty($lastNameValidationResult) ? $lastNameValidationResult : 'last name cannot be empty';
        }

        $addressValidationResult = validateAddress($data['address_line_one']);

        if ($addressValidationResult !== true || empty($data['address_line_one'])) {
            $data['address_line_one_err'] = !empty($addressValidationResult) ? $addressValidationResult : 'address line 01 cannot be empty';
        }

        $addressValidationResult = validateAddress($data['address_line_two']);

        if ($addressValidationResult !== true || empty($data['address_line_two'])) {
            $data['address_line_two_err'] = !empty($addressValidationResult) ? $addressValidationResult : 'address line 02 cannot be empty';
        }

        $addressValidationResult = validateAddress($data['address_line_three']);

        if ($addressValidationResult !== true || empty($data['address_line_three'])) {
            $data['address_line_three_err'] = !empty($addressValidationResult) ? $addressValidationResult : 'address line 03 cannot be empty';
        }

        $nicValidationResult = validateNIC($data['nic']);

        if ($nicValidationResult !== true || empty($data['nic'])) {
            $data['nic_err'] = !empty($nicValidationResult) ? $nicValidationResult : 'nic number cannot be empty';
        }

        $contactValidationResult = validateContactNumber($data['contact_number']);

        if ($contactValidationResult !== true || empty($data['contact_number'])) {
            $data['contact_number_err'] = !empty($contactValidationResult) ? $contactValidationResult : 'contact number cannot be empty';
        }
        

        $emailValidationResult = validateEmail($data['email']);

        if ($emailValidationResult !== true || empty($data['email'])) {
            $data['email_err'] = !empty($emailValidationResult) ? $emailValidationResult : 'email cannot be empty';
        }
         

        $birthdayValidationResult = validateBirthDate($data['birthday']);

        if ($birthdayValidationResult !== true || empty($data['birthday'])) {
            $data['birthday_err'] = !empty($birthdayValidationResult)  ? $birthdayValidationResult : 'birthday cannot be empty';
        }
        
        $pwdValidationResult = validatePassword($data['password']);

        if ($pwdValidationResult !== true || empty($data['password'])) {
            $data['password_err'] = !empty($pwdValidationResult)  ? $pwdValidationResult : 'password cannot be empty';
        }

        if(empty($data['confirm_password'])){
        $data['confirm_password_err']='confirm password cannot be empty';
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


    if(empty($data['first_name_err']) && empty($data['last_name_err']) && empty($data['address_line_one_err']) && empty($data['address_line_two_err']) && empty($data['address_line_three_err'])  && empty($data['nic_err'])&& empty($data['contact_number_err'])&& empty($data['email_err']) && empty($data['password_err']) && empty($data['confirm_password_err'])&& empty($data['gender_err']) && empty($data['birthday_err'])    && empty($data['qualification_err'])){
        $data['password']=password_hash($data['password'],PASSWORD_DEFAULT);  
        if($this->adminUserMngtModel->addAgri($data)){
            //   flash('post_msg', 'add new admin successfully');
                $flag =2;
                sendMail($data['email'],$data['first_name'],'', $flag, $data['email_pwd'],'','');
                redirect('Admin_user_management/view_all_users'); 
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
        'gender'=>'',
        'pp'=>'',
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
        'bank_account_name_err'=>'',
        'bank_err'=>'',
        'branch_err'=>'',
        'bank_account_no_err'=>'',
        'password_err'=>'',
        'confirm_password_err'=>'',
        'propic_err'=>'',
        'qualification_err'=>'',


    
    ];

    $this->view('Admin/AdminUserManagement/v_add_agri_o',$data);

    }
    }else{
        redirect('Login/login');  
    }
}
   
   //Add Admin
   public function add_new_admin(){
    if(isset($_SESSION['user_id']) && $_SESSION['user_flag'] ==1){ 
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
            'gender'=>trim($_POST['admin_gender']),
            'propic'=>$_FILES['propic'],
            'bank_account_name'=>trim($_POST['bank_account_name']),
            'bank_account_no'=>trim($_POST['bank_account_no']),
            'bank'=>trim($_POST['bank']),
            'branch'=>trim($_POST['branch']),
            'password'=>trim($_POST['password']),
            'email_pwd'=>trim($_POST['password']),
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

        if($this->adminUserMngtModel->findSameNic($data['nic'])){
            $data['nic_err']='NIC no is already exists';
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
            if(uploadFile($data['propic']['tmp_name'],$data['propic_name'],'/upload/user_profile_pics/')){
                        
            }else{  
            $data['propic_err']='Unsuccessful propic uploading';
            
            }
            }else{
            $data[ 'propic_err'] ="Profile picture file size is empty";
            
            }

        }


        $firstNameValidationResult = validateFirstName($data['first_name']);

        if ($firstNameValidationResult !== true || empty($data['first_name'])) {
            $data['first_name_err'] = !empty($firstNameValidationResult) ? $firstNameValidationResult : 'first name cannot be empty';
        }


        $lastNameValidationResult = validateLastName($data['last_name']);

        if ($lastNameValidationResult !== true || empty($data['first_name'])) {
            $data['last_name_err'] = !empty($lastNameValidationResult) ? $lastNameValidationResult : 'last name cannot be empty';
        }

        $addressValidationResult = validateAddress($data['address_line_one']);

                if ($addressValidationResult !== true || empty($data['address_line_one'])) {
                    $data['address_line_one_err'] = !empty($addressValidationResult) ? $addressValidationResult : 'address line 01 cannot be empty';
                }

                $addressValidationResult = validateAddress($data['address_line_two']);

                if ($addressValidationResult !== true || empty($data['address_line_two'])) {
                    $data['address_line_two_err'] = !empty($addressValidationResult) ? $addressValidationResult : 'address line 02 cannot be empty';
                }

                $addressValidationResult = validateAddress($data['address_line_three']);

                if ($addressValidationResult !== true || empty($data['address_line_three'])) {
                    $data['address_line_three_err'] = !empty($addressValidationResult) ? $addressValidationResult : 'address line 03 cannot be empty';
                }

                $nicValidationResult = validateNIC($data['nic']);

                if ($nicValidationResult !== true || empty($data['nic'])) {
                    $data['nic_err'] = !empty($nicValidationResult) ? $nicValidationResult : 'nic number cannot be empty';
                }

        $contactValidationResult = validateContactNumber($data['contact_number']);

        if ($contactValidationResult !== true || empty($data['contact_number'])) {
            $data['contact_number_err'] = !empty($contactValidationResult) ? $contactValidationResult : 'contact number cannot be empty';
        }

        $emailValidationResult = validateEmail($data['email']);

        if ($emailValidationResult !== true || empty($data['email'])) {
            $data['email_err'] = !empty($emailValidationResult) ? $emailValidationResult : 'email cannot be empty';
        }

        $birthdayValidationResult = validateBirthDate($data['birthday']);

        if ($birthdayValidationResult !== true || empty($data['birthday'])) {
            $data['birthday_err'] = !empty($birthdayValidationResult)  ? $birthdayValidationResult : 'birthday cannot be empty';
        }
        
        
       
        $pwdValidationResult = validatePassword($data['password']);

        if ($pwdValidationResult !== true || empty($data['password'])) {
            $data['password_err'] = !empty($pwdValidationResult)  ? $pwdValidationResult : 'password cannot be empty';
        }

        if(empty($data['confirm_password'])){
        $data['confirm_password_err']='confirm password cannot be empty';
        }


             $bankaccnoValidationResult = validateAccountNumber($data['bank_account_no']);

                if ($bankaccnoValidationResult !== true || empty($data['bank_account_no'])) {
                    $data['bank_account_no_err'] = !empty($bankaccnoValidationResult)  ? $bankaccnoValidationResult : 'bank account number cannot be empty';
                }

                $bankValidationResult = validateBankName($data['bank']);

                if ($bankValidationResult !== true || empty($data['bank'])) {
                    $data['bank_err'] = !empty($bankValidationResult)  ? $bankValidationResult : 'bank cannot be empty';
                }

                $branchValidationResult = validateBankBranch($data['branch']);

                if ($branchValidationResult !== true || empty($data['branch'])) {
                    $data['branch_err'] = !empty($branchValidationResult)  ? $branchValidationResult : 'branch cannot be empty';
                }

                $accholderValidationResult = validateAccountHolderName($data['bank_account_name']);

                if ($accholderValidationResult !== true || empty($data['bank_account_name'])) {
                    $data['bank_account_name_err'] = !empty($accholderValidationResult)  ? $accholderValidationResult : 'bank account holder name cannot be empty';
                }


        if($data['password']!=$data['confirm_password']){
            $data['password_err']='passwords do not match';
        }


    if(empty($data['first_name_err']) && empty($data['last_name_err']) && empty($data['address_line_one_err']) && empty($data['address_line_two_err']) && empty($data['address_line_three_err'])  && empty($data['nic_err'])&& empty($data['contact_number_err'])&& empty($data['email_err']) && empty($data['password_err']) && empty($data['confirm_password_err'])&& empty($data['gender_err']) && empty($data['birthday_err']) && empty($data['bank_account_no_err']) && empty($data['bank_account_name_err']) && empty($data['bank_err']) && empty($data['branch_err']) && empty($data['propic_err']) && empty($data['address_line_four_err'])){
        $data['password']=password_hash($data['password'],PASSWORD_DEFAULT);  
        if($this->adminUserMngtModel->addAdmin($data)){
            //   flash('post_msg', 'add new admin successfully');
                $flag =2;
                sendMail($data['email'],$data['first_name'],'', $flag, $data['email_pwd'],'','');
                redirect('Admin_user_management/view_all_users'); 
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
        'gender'=>'',
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

   public function view_more_user($user_id){
    if(isset($_SESSION['user_id']) && $_SESSION['user_flag'] == 1) {
        $user= $this->adminUserMngtModel->getUserDetails($user_id);
        $data=[                      
          'user'=>$user
          
        ];
        $this->view('Admin/AdminUserManagement/v_view_more_info', $data);
        
       }else{
         redirect('Login/login');  
       }    
    
   }
   
  public function  adminSearchUser()
  {
    if(isset($_SESSION['user_id']) && $_SESSION['user_flag'] ==1){  
  
    if($_SERVER['REQUEST_METHOD']=='GET'){
      $_GET=filter_input_array(INPUT_GET, FILTER_SANITIZE_STRING);

          $search=trim($_GET['search']);
           
          $users= $this->adminUserMngtModel->getSearchUsers($search);
          $message = '';
          if (empty($users)) {
            $message = 'No users found...';
          }
          $data=[                      
            'user'=>$users,
            'search'=>$search,
            'message' => $message
          ];
          $this->view('Admin/AdminUserManagement/v_user_management',$data);
     }else{
          $data=[                      
            'user'=>'',
            'search'=>'',
            'message' => ''
          ];
          $this->view('Admin/AdminUserManagement/v_user_management',$data);
     }

    }else{
      redirect('Login/login');  
    }
  }

  //Deactivate Users
  public function  adminDeactivateUser($user_id)
  {
    if(isset($_SESSION['user_id']) && $_SESSION['user_flag'] ==1){  
        $deleteStatus= $this->adminUserMngtModel->deactivateUser($user_id);
        $user= $this->adminUserMngtModel->getUsers();
   
        $data=[                      
          'user'=>$user,
          'deleteStatus'=>$deleteStatus,
          'search'=>''
       
         ];
        redirect('Admin_user_management/view_all_users');
     

    }else{
      redirect('Login/login');  
    }
  }

    
    
    public function view_all_users()
    {
    $records_per_page = 3;    
    if(isset($_SESSION['user_id']) && $_SESSION['user_flag'] == 1) {
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $filter_type = trim($_POST['user_type']);
            $_SESSION['radio_admin_user'] = $filter_type; // set session variable for filter type
             
            $current_page = isset($_GET['page']) ? $_GET['page'] : 1;
            $offset = ($current_page - 1) * $records_per_page;

            $users = $this->adminUserMngtModel->display_all_users($_SESSION['radio_admin_user'],$records_per_page, $offset); //data object array
             
            $total_records = $users['row_count'];
            $total_pages = ceil($total_records / $records_per_page);
            
            if(empty($users['row_count'])){
            $count = 0;
            $data = [
                'user' => $users['rows'],
                'search' => 'Search by firstname | lastname | Address | NIC No | Email',
                'emptydata' => "No Users to Show...",
                'id' => $count,

                'pagination' => [
                    'total_records' => $total_records,
                    'records_per_page' => $records_per_page,
                    'total_pages' => $total_pages,
                    'current_page' => $current_page,
                ],
            ]; 

            } else {
                $count = 0;
                $data = [
                    'user' => $users['rows'],
                    'search' => 'Search by firstname | lastname | Address | NIC No | Email',
                    'emptydata' => '',
                    'userType' => $_SESSION['radio_admin_user'],
                    'id' => $count,
    
                    'pagination' => [
                        'total_records' => $total_records,
                        'records_per_page' => $records_per_page,
                        'total_pages' => $total_pages,
                        'current_page' => $current_page,
                    ],
                ]; 
            }

            $this->view('Admin/AdminUserManagement/v_user_management',$data);

        }else{

            $current_page = isset($_GET['page']) ? $_GET['page'] : 1;
            $offset = ($current_page - 1) * $records_per_page; 

            $_SESSION['radio_admin_user']='all';
            $users = $this->adminUserMngtModel->display_all_users($_SESSION['radio_admin_user'],$records_per_page, $offset  ); //data object array
            
            $total_records = $users['row_count'];
            $total_pages = ceil($total_records / $records_per_page);

            if(empty($users['row_count'])) {
                $count = 0;
                $data = [
                    'user' => $users['rows'],
                    'search' => 'Search by firstname | lastname | Address | NIC No | Email',
                    'emptydata' => 'No Users to Show...',
                    'id' => $count,
    
                    'pagination' => [
                        'total_records' => $total_records,
                        'records_per_page' => $records_per_page,
                        'total_pages' => $total_pages,
                        'current_page' => $current_page,
                    ],
                ]; 

            }else{
                $count = 0;
                $data = [
                    'user' => $users['rows'],
                    'search' => 'Search by firstname | lastname | Address | NIC No | Email',
                    'emptydata' => '',
                    'userType' => $_SESSION['radio_admin_user'],
                    'id' => $count,
    
                    'pagination' => [
                        'total_records' => $total_records,
                        'records_per_page' => $records_per_page,
                        'total_pages' => $total_pages,
                        'current_page' => $current_page,
                    ],
                ];
            }
             
            $this->view('Admin/AdminUserManagement/v_user_management',$data);

        }   
            
    }else{
    redirect('Login/login');  
    }
    }
    

    public function  adminactivateUser($user_id)
    {
      if(isset($_SESSION['user_id']) && $_SESSION['user_flag'] ==1){  
          $activeStatus= $this->adminUserMngtModel->activateUser($user_id);
        
     
          $data=[                      
            'user'=>'',
            'deleteStatus'=>$activeStatus,
            'search'=>''
         
           ];
          redirect('Admin_user_management/view_all_users');
       
  
      }else{
        redirect('Login/login');  
      }
    }
    // public function view_all_users()
    // {
    // if(isset($_SESSION['user_id']) && $_SESSION['user_flag'] == 1) {
        
    //         $filter = $_GET['filter'] ?? 'AllUsers';
            
    //         switch($filter) {
    //             case 'Admins':
    //                 $users = $this->adminUserMngtModel->getAdmins();
    //                 break;
    //             case 'Customers':
    //                 $users = $this->adminUserMngtModel->getCustomers();
    //                 break;
    //             case 'Sellers':
    //                 $users = $this->adminUserMngtModel->getSellers();
    //                 break;
    //             case 'Suppliers':
    //                 $users = $this->adminUserMngtModel->getSuppliers();
    //                 break;
    //             case 'AgriOfficers':
    //                 $users = $this->adminUserMngtModel->getAgri();
    //                 break;
    //             default:
    //                 $users = $this->adminUserMngtModel->getUsers();
    //         }
            
    //         $count = 0;
    //         $data = [
    //             'user' => $users,
    //             'search' => '',
    //             'id' => $count
    //         ];
            
    //         $this->view('Admin/AdminUserManagement/v_user_management',$data);



    // }else{
    // redirect('Login/login');  
    // }
    // }
  

}
?>