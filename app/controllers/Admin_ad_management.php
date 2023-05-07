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
  $records_per_page = 4;

if(isset($_SESSION['user_id']) && $_SESSION['user_flag'] == 1) {
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        // $filter_type = trim($_POST['ad_type']);
        if (isset($_POST['ad_type'])) {
          $filter_type = trim($_POST['ad_type']);
          $_SESSION['radio_admin_ad'] = $filter_type;
          // use the $filter_type variable in your code
       }
        
        // var_dump($filter_type); die();

        $current_page = isset($_GET['page']) ? $_GET['page'] : 1;
        $offset = ($current_page - 1) * $records_per_page;

        $products = $this->adminAdMgmtModel->display_all_ads($_SESSION['radio_admin_ad'], $records_per_page, $offset); //data object array
     
        $total_records = $products['total_rows'];
        // echo "<script>";
        // echo "alert('" . $total_records . "')";
        // echo "</script>";
       $total_pages = ceil($total_records / $records_per_page);
     
       if(empty($products['total_rows'])){
              
        $data=[
          'products' =>  $products['products'],
          'search' => "Search by title of the advertisement",
          'emptydata' => "No Advertisements to Show...",
          
          'pagination' => [
             'total_records' => $total_records,
             'records_per_page' => $records_per_page,
             'total_pages' => $total_pages,
             'current_page' => $current_page,
            ],
          ];

        }else{
          $data=[
            'products' =>  $products['products'],
            'search' => "Search by title of the advertisement",
            'emptydata' => '',
            'adType' => $_SESSION['radio_admin_ad'],
            
            'pagination' => [
               'total_records' => $total_records,
               'records_per_page' => $records_per_page,
               'total_pages' => $total_pages,
               'current_page' => $current_page,
              ],
            ];
          }
        $this->view('Admin/AdminAdManage/v_ad_manage_pending', $data);

    }else{
      $current_page = isset($_GET['page']) ? $_GET['page'] : 1;
      $offset = ($current_page - 1) * $records_per_page; 
      
      $_SESSION['radio_admin_ad']='pending_ads';
      $products = $this->adminAdMgmtModel->display_all_ads($_SESSION['radio_admin_ad'], $records_per_page, $offset); 
      
      $total_records = $products['total_rows'];
      $total_pages = ceil($total_records / $records_per_page); 
       
      // $products = $this->adminAdMgmtModel->display_all_ads(); //data object array
  
        if(empty($products['total_rows'])){
          $data=[
            'products' =>  $products['products'],
            'search' => "Search by title of the advertisement",
            'emptydata' => "No Advertisements to Show...",
            
            'pagination' => [
               'total_records' => $total_records,
               'records_per_page' => $records_per_page,
               'total_pages' => $total_pages,
               'current_page' => $current_page,
              ],
            ];
          
          }else{
            $data=[
              'products' =>  $products['products'],
              'search' => "Search by title of the advertisement",
              'emptydata' => '',
              'adTypes' => $_SESSION['radio_admin_ad'],
              
              'pagination' => [
                 'total_records' => $total_records,
                 'records_per_page' => $records_per_page,
                 'total_pages' => $total_pages,
                 'current_page' => $current_page,
                ],
              ]; 

          }
       
        $this->view('Admin/AdminAdManage/v_ad_manage_pending',$data);

    }   
    
    
    
    
    }else{
        redirect('Login/login');  

    }  

}

public function  adminSearchAd()
{
  $records_per_page = 4;
  if(isset($_SESSION['user_id']) && $_SESSION['user_flag'] ==1){  

    $current_page = isset($_GET['page']) ? $_GET['page'] : 1;
    $offset = ($current_page - 1) * $records_per_page;

    $products = $this->adminAdMgmtModel->display_all_ads('', $records_per_page, $offset);
    
    $total_records = $products['total_rows'];
    $total_pages = ceil($total_records / $records_per_page);

    if(empty($products['total_rows'])) {
      $data=[
        'products' =>  $products['products'],
        'search' => "Search by title of the advertisement",
        'message' => '',
        'emptydata' => "No Advertisements to Show...",
        
        'pagination' => [
           'total_records' => $total_records,
           'records_per_page' => $records_per_page,
           'total_pages' => $total_pages,
           'current_page' => $current_page,
          ],
        ];
      }else{
        $data=[
          'products' =>  $products['products'],
          'search' => "Search by title of the advertisement",
          'message' => '',
          'emptydata' => '',
          
          'pagination' => [
             'total_records' => $total_records,
             'records_per_page' => $records_per_page,
             'total_pages' => $total_pages,
             'current_page' => $current_page,
            ],
          ];
        }
        
    if($_SERVER['REQUEST_METHOD']=='GET'){
      $_GET=filter_input_array(INPUT_GET, FILTER_SANITIZE_STRING);

      $search=trim($_GET['search']);

      if (!empty($search)) {
        $current_page = isset($_GET['page']) ? $_GET['page'] : 1;
        $offset = ($current_page - 1) * $records_per_page;

        $products= $this->adminAdMgmtModel->getSearchAds($search);

        $total_records = $products['total_rows'];
        $total_pages = ceil($total_records / $records_per_page);
        $message = '';

        if (empty($products['total_rows'])) {
            $message = "No ads found on title: $search";
        }
        $data=[
          'products' =>  $products['ads'],
          'search' => $search,
          'message' => $message,
          'emptydata' => '',
          
          'pagination' => [
             'total_records' => $total_records,
             'records_per_page' => $records_per_page,
             'total_pages' => $total_pages,
             'current_page' => $current_page,
            ],
          ];
          $this->view('Admin/AdminAdManage/v_ad_manage_pending',$data);
        }
    }
    $this->view('Admin/AdminAdManage/v_ad_manage_pending',$data);

  }else{
    redirect('Login/login');  
  }
}
 
public function  adminReviewAd($product_id,$category = null)
{
  if(isset($_SESSION['user_id']) && $_SESSION['user_flag'] ==1){  
  if (isset($_GET['category'])) {
    $category = $_GET['category'];
  }
  
      $solveStatus= $this->adminAdMgmtModel->reviewAd($product_id,$category);

 
      redirect('Admin_ad_management/ad_management_view');
   
  }else{
    redirect('Login/login');  
  }
}

// public function adminRejectAd($product_id,$category = null)
// {
//   if(isset($_SESSION['user_id']) && $_SESSION['user_flag'] ==1){ 
//      if (isset($_GET['category'])) {
//       $category = $_GET['category'];
//      } 

//     //  if (isset($_GET['reason'])) {
//     //   $reason = $_GET['reason'];
//     //  } 

//       // // Retrieve the rejected reason using JavaScript
//       // $rejected_reason = $_POST['rejected_reason'];

//       // Call the model function with the retrieved reason
//       $solveStatus= $this->adminAdMgmtModel->rejectAd($product_id,$category);

//       redirect('Admin_ad_management/ad_management_view');
   
//   }else{
//     redirect('Login/login');  
//   }
// }

public function adminRejectAd()
{
  if(isset($_SESSION['user_id']) && $_SESSION['user_flag'] ==1){ 
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
      
      $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
      $name = trim($_POST['seller_name']);
      // var_dump($name); die();
      $email = trim($_POST['seller_email']);
      $category = trim($_POST['seller_category']);
      $id =  trim($_POST['seller_productId']);
      $reason = trim($_POST['reason']);
      $more_detail = trim($_POST['more_detail']);

      $solveStatus= $this->adminAdMgmtModel->rejectAd($id,$category);
      if($solveStatus){
        sendMail($email,$name,'',6,'',$reason,$more_detail); 
      }
      
      
      
      
      redirect('Admin_ad_management/ad_management_view');
   
  }else{
    redirect('Login/login');  
  }
}
}


}
?>