<?php
    class Admin_ad_management extends Controller{
        private $adminAdMgmtModel;
        public function __construct(){
            $this->adminAdMgmtModel = $this->model('M_Admin_ad_management');
    }
   
   public function reviewed_ads(){
    $data=[
        'title' => 'Sobawitha'
    ];
    $this->view('Admin/AdminAdManage/v_ad_manage_reviewed', $data);
  
   }

//    public function ad_management_view(){
//     if(isset($_SESSION['user_id']) && $_SESSION['user_flag'] ==1){ 
//         $products = $this->adminAdMgmtModel->getProducts();
       
//         $data=[
//         'products' =>  $products
//         ];
    
//         $this->view('Admin/AdminAdManage/v_ad_manage_pending', $data);
  
//     }else{
//         redirect('Login/login');  
//     }
//   }

public function ad_management_view()
{
if(isset($_SESSION['user_id']) && $_SESSION['user_flag'] == 1) {
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        $filter_type = trim($_POST['ad_type']);
        $products = $this->adminAdMgmtModel->display_all_ads($filter_type); //data object array
     
        
        $data=[
            'products' =>  $products,
            'search' => "Search by title of the advertisement"
        ];
        $this->view('Admin/AdminAdManage/v_ad_manage_pending', $data);

    }else{
        $products = $this->adminAdMgmtModel->display_all_ads(); //data object array
        $data = [
            'products' =>  $products,
            'search' => "Search by title of the advertisement"
        ]; 
         
        $this->view('Admin/AdminAdManage/v_ad_manage_pending',$data);

    }   
    
    
    
    
    }else{
        redirect('Login/login');  

    }  

}



// public function  adminSearchAd()
// {
//   if(isset($_SESSION['user_id']) && $_SESSION['user_flag'] ==1){  

//   if($_SERVER['REQUEST_METHOD']=='GET'){
//     $_GET=filter_input_array(INPUT_GET, FILTER_SANITIZE_STRING);

//         $search=trim($_GET['search']);
         
//         $products= $this->adminAdMgmtModel->getSearchAds($search);
//         $message = '';
//         if (empty($products)) {
//             $message = "No ads found on title: $search";
//         }
//         $data=[                      
//           'products'=>$products,
//           'search'=>$search,
//           'message' => $message
//         ];
//         $this->view('Admin/AdminAdManage/v_ad_manage_pending',$data);
//    }else{
        
//         $data=[                      
//           'products'=>'',
//           'search'=>'',
//           'message' => ''
//         ];
//         $this->view('Admin/AdminAdManage/v_ad_manage_pending',$data);
//    }

//   }else{
//     redirect('Login/login');  
//   }
// }
public function  adminSearchAd()
{
  if(isset($_SESSION['user_id']) && $_SESSION['user_flag'] ==1){  
    $products = $this->adminAdMgmtModel->display_all_ads();
    $data=[                      
      'products'=>$products,
      'search'=>"Search by title of the advertisement",
      'message' => ''
    ];

    if($_SERVER['REQUEST_METHOD']=='GET'){
      $_GET=filter_input_array(INPUT_GET, FILTER_SANITIZE_STRING);

      $search=trim($_GET['search']);

      if (!empty($search)) {
        $products= $this->adminAdMgmtModel->getSearchAds($search);
        $message = '';
        if (empty($products)) {
            $message = "No ads found on title: $search";
        }
        $data['products'] = $products;
        $data['search'] = $search;
        $data['message'] = $message;
      }
    }
    $this->view('Admin/AdminAdManage/v_ad_manage_pending',$data);

  }else{
    redirect('Login/login');  
  }
}


}
?>