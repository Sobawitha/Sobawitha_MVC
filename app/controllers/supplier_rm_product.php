<?php

class supplier_rm_product extends Controller
{
    private $rm_product_model, $notification_model , $wishList_model;
    private $resources_model, $fertilizer_product_model;
    public function __construct()
    {
        $this->rm_product_model= $this->model('M_supplier_rm_product');
        $this->wishList_model = $this->model('M_wishList');
        $this->notification_model = $this->model('M_notifications');
    }

    //save comment
    

    public function view_individual_product(){
        $id = $_GET['product_id'];
        $no_of_notifications = $this->notification_model->find_notification_count()->total_count;
        $notifications = $this->notification_model->notifications();
        $content = $this->fertilizer_product_model->view_individual_product($id);
        if (is_object($content)) {
            $title = $content->product_name;
        } else {
            $title = "Unknown Product";
        }
        $crop_type = $content->crop_type;
        $type = $content->type;
        $similar = $this->fertilizer_product_model->show_similar($title,$crop_type,$type,$id);
         
        if(isset($_SESSION['user_id'])){
            $id=$_SESSION['user_id'];
        }
        
        $data =['product_id' =>  $_GET['product_id']]; 
        $comment = $this->fertilizer_product_model->display_all_comment($data);
        $reply_for_comment = $this->fertilizer_product_model->display_all_replies($data);
        $question = $this->fertilizer_product_model->display_all_questions($data);
        $answers = $this->fertilizer_product_model->display_all_answers($data);
        $wishlist_items = $this->wishList_model->getAllItems();
        $current_user_gender = $this->fertilizer_product_model->find_gender($id)->gender;
        
        $product_owner_id = $this->fertilizer_product_model->find_owner_id($data['product_id'])->owner_id;
        $no_of_cart_item = $this->fertilizer_product_model->check_cart($id)->count_item;
        $data = [
            'comments' => $comment,
            'reply_for_comment' => $reply_for_comment,
            'question' => $question,
            'answers' => $answers,
            'current_user_gender' => $current_user_gender,
            'product_owner_id' => $product_owner_id,
            'adcontent' => $content,
            'similar' => $similar,
            'owner_id'=> $product_owner_id,
            'no_of_cart_item' => $no_of_cart_item,
            'wishlist_items' => $wishlist_items,
            'no_of_notifications' =>$no_of_notifications,
            'notifications' => $notifications
        ];
        
        $this->view('Users/component/individual_item',$data);

    }

     function add_to_cart(){
        $quantity =$_POST['quantity']; /*change */
        $product_id = $_GET['product_id'];
        $no_of_notifications = $this->notification_model->find_notification_count()->total_count;
        $notifications = $this->notification_model->notifications();
        
        $data = [
          'product_id' => $_GET['product_id'],
          'quantity' => $quantity,
          'user_id' => $_SESSION['user_id'],
          'no_of_notifications' =>$no_of_notifications,
           'notifications' => $notifications
        ];
        if($this->fertilizer_product_model->add_to_cart($data)){
            redirect('fertilizer_product/view_individual_product?product_id='.$product_id);
        }

     }

     function add_to_cart_from_individual_page(){
        $quantity =$_POST['quantity']; /*change */
        $product_id = $_GET['product_id'];
        $user_id = $_SESSION['user_id'];
        $current_status = $this->fertilizer_product_model->check_similer_item($product_id,$user_id)->count_row;
        $no_of_notifications = $this->notification_model->find_notification_count()->total_count;
        $notifications = $this->notification_model->notifications();
        $data = [
          'product_id' => $_GET['product_id'],
          'quantity' => $quantity,
          'user_id' => $_SESSION['user_id'],
          'no_of_notifications' =>$no_of_notifications,
           'notifications' => $notifications
        ];

        if($current_status>0){
            $this->fertilizer_product_model->update_cart($data);
            redirect('order/view_cart?product_id='.$product_id);
        }
        else{
            $this->fertilizer_product_model->add_to_cart($data);
            redirect('order/view_cart?product_id='.$product_id);
        }
     }



      /*fertilizer_order_list */
      function view_orders(){
        $order_list = $this->rm_product_model-> list_order_details($_SESSION['user_id']);
        $no_of_notifications = $this->notification_model->find_notification_count()->total_count;
        $notifications = $this->notification_model->notifications();
        $data =[
            'order_list' => $order_list,
            'no_of_notifications' =>$no_of_notifications,
             'notifications' => $notifications
        ];

        $this->view('Raw_material_supplier/Supplier_order_list/v_order_list',$data);

      }

      

    
   
}


?>
