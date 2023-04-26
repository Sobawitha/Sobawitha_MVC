<?php
    class seller_ad_management extends Controller{
        private $seller_ad_management_model;
        public function __construct(){
            $this->seller_ad_management_model = $this->model('M_seller_ad_management');
    }

    public function View_listing(){
        $userid = $_SESSION['user_id'];
        if(isset($_SESSION['user_id']) && $_SESSION['user_flag'] ==3){
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
           
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $filter_type = isset($_POST['ad_type']) ? trim($_POST['ad_type']) : '';

           $ads = $this->seller_ad_management_model->display_advertisement($filter_type,$userid);
       
           if(empty($ads)){
              
            $data=[
              'ads' =>  $ads,
              'search' => "Search by product title",
              'emptydata' => "No listings to Show...",
              
              ];
       
          
            }else{
                $data=[
                    'ads' =>  $ads,
                    'search' => "Search by product title",
                    'emptydata' => '',
                    
                    ]; 
            }
            $this->view('Seller/Seller_add_management/v_seller_add_manage', $data);
        }else{
            $ads = $this->seller_ad_management_model->display_advertisement('',$userid);
            if(empty($ads)){
              
                $data=[
                  'ads' =>  $ads,
                  'search' => "Search by product title",
                  'emptydata' => "No listings to Show...",
                  
                  ];
           
              
                }else{
                    $data=[
                        'ads' =>  $ads,
                        'search' => "Search by product title",
                        'emptydata' => '',
                        
                        ]; 
                }
                $this->view('Seller/Seller_add_management/v_seller_add_manage', $data);
        
        }
    }else{
        redirect('Login/login');  
      }
    
}

    public function add_listing(){
        $userid = $_SESSION['user_id'];
        if(isset($_SESSION['user_id']) && $_SESSION['user_flag'] ==3){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){

            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $userid = $_SESSION['user_id'];
            $avg_rating = $this->seller_ad_management_model ->getAverageRating($userid);

            

            $data = [

                'product_name' => trim($_POST['product_name']),
                'category' => trim($_POST['category']),
                'certificate_no' => trim($_POST['certificate_no']),
                'manufacturer' => trim($_POST['manufacturer']),
                'description' => trim($_POST['description']),
                'price' => trim($_POST['price']),
                'quantity' => trim($_POST['quantity']),
                'current_status' => 1,
                'created_by' => $userid,
                'avg_rating' => $avg_rating,
                'fertilizer_image' =>$_FILES['fertilizer_img'],
                'fertilizer_image_name' => trim($_POST['product_name']).'_'.$_FILES['fertilizer_img']['name'],
                'fertilizer_image_err' => '',

            ];

            if(empty($data['fertilizer_image'])){
                $data['fertilizer_image_err']='fertilizer image cannot be empty';
            
            }
            else{
                $fileExt=explode('.',$_FILES['fertilizer_img']['name']);
                $fileActualExt=strtolower(end($fileExt));
                $allowed=array('jpg','jpeg','png');
    
            
                if(!in_array($fileActualExt,$allowed)){
                $data['fertilizer_image_err']='You cannot upload files of this type';
    
                }
        
    
                if($data['fertilizer_image']['size']>0){
                if(uploadFile($data['fertilizer_image']['tmp_name'],$data['fertilizer_image_name'],'/upload/fertilizer_images/')){
                            
                }else{  
                $data['fertilizer_image_err']='Unsuccessful image uploading';
                
                }
                }else{
                $data[ 'fertilizer_image_err'] ="Image file size is empty";
                
                }
    
            }

            if ($this->seller_ad_management_model->add_fertilizer_advertisment($data)) {
                redirect('seller_ad_management/View_listing');
            }
        }

        else{
            $this->view('Seller/Seller_add_management/v_seller_add_advertisment');
        }

    }else{
        redirect('Login/login');  
      }

}

    public function delete_advertisment(){
        if($_SERVER["REQUEST_METHOD"]== 'POST'){
            $advertisementid = trim($_POST['deleteadvertisment']);
            $this->seller_ad_management_model->delete_advertisment($advertisementid);
        }

        redirect('seller_ad_management/View_listing');
    }

    public function Update_advertisment(){
        $fertilizer_id = $_GET['fertilizer_id'];
        $fertilizer_details = $this->seller_ad_management_model->get_fertilizer_details($fertilizer_id);
        $data = [
            'fertilizer_details'=>$fertilizer_details,
        ];
        
        $this->view('Seller/Seller_add_management/v_seller_update_add',$data);
    }

    public function sellerSearchAd(){
        
        if (isset($_SESSION['user_id']) && $_SESSION['user_flag'] == 3 ){
            $userid = $_SESSION['user_id'];    

        $ads = $this->seller_ad_management_model-> display_advertisement('',$userid);
        if(empty($ads)){
              
            $data=[
              'ads' =>  $ads,
              'search' => "Search by product title",
              'message' =>'',
              'emptydata' => "No listings to Show...",
              
              ];
       
          
            }else{
                $data=[
                    'ads' =>  $ads,
                    'search' => "Search by product title",
                    'message' =>'',
                    'emptydata' => '',
                    
                    ]; 
            }
            if ($_SERVER['REQUEST_METHOD'] == 'GET') {
                $_GET = filter_input_array(INPUT_GET, FILTER_SANITIZE_STRING);
        
                $search = trim($_GET['search']);
        
                if (!empty($search)) {
                  
                    $ads = $this->seller_ad_management_model-> getSearchAds($userid,$search);
                    
                    $message = '';
                   
                  if (empty($ads)) {
                    $message = "No listings found on title: $search";

                  }
        
        
                  $data = [
                    'ads' =>  $ads,
                    'search' =>  $search,
                    'message' => $message,
                    'emptydata' =>'',
                    
                  ];
                  
                
                  $this->view('Seller/Seller_add_management/v_seller_add_manage', $data);
                }
              }
        
              $this->view('Seller/Seller_add_management/v_seller_add_manage', $data); 
            }else {
                redirect('Login/login');
              }
        
    }

}
?>