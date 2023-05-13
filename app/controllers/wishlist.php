<?php

class wishlist extends Controller{

private $cartModel;
private $wishlistModel;


public function __construct(){



    $this->cartModel = $this->model('M_shopping_cart');
    $this->wishlistModel = $this->model('M_wishlist');
    $this->notification_model = $this->model('M_notifications');



}


public function addToCart($pro_id){


 
    $this->cartModel->insertItem($pro_id);
 
    $this->delete($pro_id);
     
   return;

  

}

public  function  display_all_items(){
  if(isset($_SESSION['user_id'])){
    $wish_list = $this->wishlistModel->getAllItems();
    $no_of_notifications = $this->notification_model->find_notification_count()->total_count;
    $notifications = $this->notification_model->notifications();
    $data = [
    'wishlist' => $wish_list,
    'no_of_notifications' =>$no_of_notifications,
    'notifications' => $notifications] ;
   $this->view('Buyer/Buyer_wishlist/v_wishlist',$data);
  }
}




public function addToWishlist($pro_id){
 


if($this->wishlistModel->findByWishlistId($pro_id))
{   
    $_SESSION['wishlist_error'] = "Item already in wishlist";
    redirect('Pages/home');
    return;
}

  
    $this->wishlistModel->insertItem($pro_id);
    $_SESSION['showDialog'] = true;
    redirect('Pages/home');
    return;


  
}


public function delete($pro_id){


  if($this->wishlistModel->findByWishlistId($pro_id))
  {

    $this->wishlistModel->deleteItem($pro_id);
    echo "User deleted";
    return;
    
  }

  else{
    http_response_code(404);
    echo "User not found";
    return;

  }
 
}
















}



?>