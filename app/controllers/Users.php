<?php
    class users extends Controller {
        private $userModel;
        private $loginModel;
        private $sellerAdModel;
        private $buyerAdModel;

        public function __construct(){
            $this-> userModel =$this->model('M_Users');
            $this-> loginModel =$this->model('M_Login');
            $this->sellerAdModel = $this->model('M_seller_ad_management');
            $this->buyerAdModel = $this->model('M_ad_management');
           
            $this->wishlistModel = $this->model('M_wishlist');
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
                'new_password_err'=>'',
                'pwd_unmatch_err'=>''  
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
                 'new_password_err'=>'' ,
                 'pwd_unmatch_err'=>''
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
                $data['pwd_unmatch_err']='New password and retype new password is incorrect';
               } 
        
               if(empty($data['new_password'])){
                  $data['new_password_err']='Please enter a new password';
               } 
               
               if(empty($data['retype_new_password'])){
                $data['retype_new_password_err']='Please retype your new password';
             } 

             
             $pwdValidationResult = validatePassword($data['retype_new_password']);
             if($pwdValidationResult !== true){
                $data['pwd_unmatch_err']=$pwdValidationResult;
             }
        
               if(empty($data['current_password_err']) && empty($data['retype_new_password_err']) && empty($data['new_password_err']) && empty($data['pwd_unmatch_err']) ){
             
                $data['password']=password_hash($data['new_password'],PASSWORD_DEFAULT);
                $changeUserPW=$this->userModel->changePW($data);
                  $_SESSION['success_msg'] = 'Password updated successfully';
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
              'new_password_err'=>'' ,
              'pwd_unmatch_err'=>''    
             ];
              $this->view('Users/user/v_changePW',$data);     
           }
          }else{
            redirect('Login/login');  
          }
        
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
            if(isset($_SESSION['user_id'])){
                $user_id = $_SESSION['user_id'];
                $profile_detail = $this-> userModel-> get_profile_detail($user_id);
                $notifications = $this->userModel->notifications();
                $data=[
                    'profile_detail' => $profile_detail,
                    'notifications' => $notifications
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
                $notifications = $this->userModel->notifications();
                $data=[
                    'profile_detail' => $profile_detail,
                    'notifications' => $notifications
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
                $notifications = $this->userModel->notifications();
                $data=[
                    'profile_detail' => $profile_detail,
                    'notifications' => $notifications
                ];
                print_r($data['profile_detail']);
                die();
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
                $notifications = $this->userModel->notifications();
                $data=[
                    'profile_detail' => $profile_detail,
                    'notifications' => $notifications
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
                $notifications = $this->userModel->notifications();
                $data=[
                    'profile_detail' => $profile_detail,
                    'notifications' => $notifications
                ];
                $this->view('Raw_material_supplier/Raw_material_supplier/v_supplier_view_profile', $data);
            }
            else{
                redirect('Login/login');
            }
            
        }
        
        public function filter_data()
        {
         $output = '';
        
           if($_SERVER['REQUEST_METHOD'] == 'POST')
            {
                 $data = json_decode(file_get_contents("php://input"), true);
                
                 $query =  "SELECT * FROM  fertilizer where 1 = 1";
                  
                 if(isset($data['minPrice']) && isset($data['maxPrice']) &&  !empty($data['minPrice']) && !empty($data['maxPrice']))
                 {
                     $min = intval($data['minPrice']);
                     $max  = intval($data['maxPrice']);
                     $query .= " AND price BETWEEN '".$min."' AND '".$max."'";
                 }   
                 if (isset($data['brands']) && !empty($data['brands'])) {
                     $brands = array_map('trim', $data['brands']); // removes leading and trailing whitespace from each brand
                      
                     $brand_filter = implode("','", $brands); // joins the brands with single quotes
                     $query .= " AND manufacturer IN ('".$brand_filter."')";
                   }
                   
        
                 if(isset($data['type']) && !empty($data['type']))
        
                 {
                    $type_filter = implode("','",$data['type']);      
                    $query .= " AND type in  ('".$type_filter."')";
        
        
        
                 }
                 
               
                 if(isset($data['quantity']) && !empty($data['quantity']) )
        
                 {
                 //    $quantity_filter = implode("','", $data['quantity']);
                 //    $query .= "AND quantity in  ('".$quantity_filter."')";
                   $quantity = intval($data['quantity']);
                   if($quantity == 1){
 
 
                   }
                   else if($quantity == 2) {
 
 
                   }
 
                   else if($quantity == 3) {
        
        
                 }
 
 
                else{
 
 
                }
     
 
             }
                 if(isset($data['location'])  && !empty($data['location']))
        
                 {
                    $location_filter = implode("','", $data['location']);      
                    $query .= "AND created_by IN (SELECT user_id FROM user WHERE address_line_four IN ($location_filter))";


        
        
        
                 }
        
                    
                        $result =  $this->sellerAdModel->customized_query($query);
                     
                 
        
                        $output = $result;
                    
                  
        
        
                        echo json_encode($result); 
             }
 
 
 }



 public function filter_results(){

   
     if($_SERVER['REQUEST_METHOD'] == 'POST')

     {
       $brands =  isset($_POST['brands']) ? $_POST['brands']:array();
       $location  = isset($_POST['location']) ? $_POST['location'] : array();
       $min_price = isset($_POST['min_price']) ? $_POST['min_price'] :'';
       $max_price = isset($_POST['max_price']) ? $_POST['max_price'] :'';
       $quantity = isset($_POST['quantity']) ? $_POST['quantity']:'';   
       $types = isset($_POST['types']) ? $_POST['types'] : array();
       $query = "SELECT * FROM fertilizer WHERE 1 = 1";

         if(!empty($min_price) && !empty($max_price))
         {
              $query .= " AND price BETWEEN '".$min_price."' AND '".$max_price."'";
         }

            if(!empty($brands))
            {
                $brand_filter = implode("','", $brands);
                $query .= " AND manufacturer IN ('".$brand_filter."')";
            }

            if(!empty($types))
            {
                $type_filter = implode("','", $types);
                $query .= " AND type IN ('".$type_filter."')";
            }

            if(!empty($quantity))
            {
                $query .= " AND quantity = '".$quantity."'";
            }

            if(!empty($location))
            {
                $location_filter = implode("','", $location);
                $query .= " AND created_by IN (SELECT user_id FROM user WHERE address_line_four IN ('".$location_filter."'))";
            }


            
            $result = $this->sellerAdModel->customized_query($query);
           
            $manufacturers = $this->sellerAdModel->get_manufacturer_names();
            $provinces = SriLanka::getProvinces();
          
            $wishlist_items =  $this->wishlistModel->getAllItems();
            $data = [
             
                'brands' => $brands,
                'location' => $location,
                'min_price' => $min_price,
                'max_price' => $max_price,
                'quantity' => $quantity,
                'types' => $types,
                'wishlist_items' => $wishlist_items ,
                'provinces' => $provinces,
                'manufacturers' => $manufacturers,
                'products' => $result





            ];
            $this->view('Users/component/v_search_results', $data);



     }


 }

        public function verify_email($mail){
          
            if($_SERVER['REQUEST_METHOD']=='POST'){
                  
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
                if(isset($_POST['verify_btn'])) {
                  
                       $token = trim($_POST['verify_code']);
                       if($token != null) { 
                         $email = $mail;
                         $userRow=$this->loginModel->findUserId($email);   
                         $tokenExpire = $this->loginModel->checkToken($email);
                       }
                     
                       //    echo "<script>";
                       // echo "alert('" . $tokenExpire->verify_token . "')";
                       // echo "</script>";
   
                       $data = [
                           'email' => trim($_POST['verify_email']),
                           'verify_code' => trim($_POST['verify_code']),
                           'user_id'=> $userRow -> user_id,


 
      
        
        
                          
                           'token_err' => '',
                           'token_unmatch_err' =>'',
                           'email_err' =>'',
                           'code_err' => ''
                       ];
                       
                       if(empty($data['email'])){
                        $data['email_err']='Please register with Sobawitha first, to get a verification code';
                       }  

                        if(empty($data['verify_code'])){
                             $data['token_err']='Please enter verification code';
                          } 
                          
                       if(!empty($data['verify_code'])){
                           if($token != $tokenExpire->verify_token){
                               $data['token_unmatch_err'] = 'We are sorry, but the verification code you entered doesnot match the one we sent you. Please double-check the code and try again. If you continue to have issues, please contact our support team for assistance.';
                           }
                       }
                       
                       if(empty($data['token_err']) && empty($data['token_unmatch_err']) && empty($data['email_err']) ){
                           $activate_user=$this->userModel->activateUser($data['user_id']);
                           $token = md5(rand());
                           $this->loginModel->setToken($token,$email);
                   
                             if($activate_user){
                                   redirect('Login/login');      
                              
                             }else{
                              $data['code_err']='something went wrong';
                              $this->view('Users/user/v_verify_email', $data);
                             }   
                          }else{
                            $this->view('Users/user/v_verify_email', $data);
                          }
               
               }
               }else{
                   //initial form
                   $data = [
                    'email' => $mail,
                    'verify_code' => '',
                    'user_id'=> '',
 
                   
                    'token_err' => '',
                    'token_unmatch_err' =>'',
                    'email_err' =>'',
                    'code_err' => ''
                   ];
   
                   //load view
                   $this->view('Users/user/v_verify_email', $data);
               }
     
       }

       public function register_as_new_sletter(){
        echo "comee";
        die();
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

    public function search()
    {
        
        $keyword = $_GET['keyword'];
      
       $param = "%".$keyword."%";
       
       echo  json_encode($this->sellerAdModel->searchResults($param));
     }


    

    
    

    public function help_center(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $email = "sobawitha@gmail.com";
            $name = trim($_POST['victim_mail']);
            $bodyFlag = 8;
            $more_detail = trim($_POST['content']);
            $_SESSION['success_msg']='You will get notified by an email shortly';

        sendMail($email, $name,'',$bodyFlag, '','',$more_detail );

            redirect('Pages/home');
        }else{
            redirect('Pages/home');
        }

        
    }



}

?>

