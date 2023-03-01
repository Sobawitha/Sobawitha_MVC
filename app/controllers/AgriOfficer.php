<?php
    class AgriOfficer extends Controller{
        private $agriModel;

        public function __construct(){
            $this->agriModel = $this->model('M_AgriOfficer');
    }

public function profile()
    {
    //  if(isset($_SESSION['user_id']) && $_SESSION['user_id']==5) {
             
        $user= $this->agriModel->findUserByID($_SESSION['user_id']);
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
        $this->view('Agri_officer/Agri_officer/v_officer_view_profile',$data);
    
    //   }else{
    //     redirect('Login/login');  
    //   }
    }
}
    ?>