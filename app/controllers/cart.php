<?php

class cart extends Controller
{

    private $cartModel,$orderModel,$paymentModel;
    public function __construct()
    {
        $this->cartModel = $this->model('M_shopping_cart');
        $this->orderModel = $this->model('M_order');
        $this->supplyModel = $this->model('M_supplier_view');
        $this->paymentModel = $this->model('M_seller_payment');
        $this->notification_model = $this->model('M_notifications');
    }

    public function display_all_items()
    {

        $no_of_notifications = $this->notification_model->find_notification_count()->total_count;
        $notifications = $this->notification_model->notifications();
        $data= [
            'title' => 'cart',
            'cart' => $this->cartModel->getAllItems(),
            'no_of_notifications' =>$no_of_notifications,
            'notifications' => $notifications
        ];

        $this->view('Buyer/Shopping_cart/v_shopping_cart', $data);

    }

    public function addToCart($pro_id)
    {

        if ($this->cartModel->findByCartId($pro_id)) {

            //alert message if it is already in the cart
             
            
            
            $this->display_all_items();

        }

        {
            $wishlist_status = $this-> cartModel -> is_in_wishlist($pro_id)->row_count;
            if($wishlist_status>0){
                $this->cartModel->delete($pro_id);
                $this->cartModel->insertItem($pro_id);
                $this->display_all_items();
            }
            else{
                $this->cartModel->insertItem($pro_id);
                $this->display_all_items();
            }

            

        }

    }

    public function delete($pro_id)
    {

        if ($this->cartModel->findByCartId($pro_id)) {
            $this->cartModel->deleteItem($pro_id);
            echo "User deleted";
            return;

        } else {
            http_response_code(404);
            echo "User not found";
            return;

        }
    }

    public function updateQuantity($value, $pro_id)
    {
        if ($this->cartModel->findByCartId($pro_id)) {
            $this->cartModel->updateItem($pro_id, $value);
            echo "User Updated";
            return;

        }

        http_response_code(404);
        echo "User not found";
        return;

    }


    public function checkout_from_individual_page(){

        require '../app/vendor/autoload.php';
        // Set your API keys
        \Stripe\Stripe::setApiKey('sk_test_51MskWIIz6Y8hxLUJq8DTBxJ0xInEFNHtBn9H1i30ReXNtkRg6eAIrpz74kd2HYPYXN0v2TnqoT9jBMnJxWdqYXXu00gAVFTXaI');
        $productId = $_GET["product_id"];
        $quantity = $_GET["quantity"];
        $price    = $this->supplyModel->find_price_from_id_fertilizer($productId)->price;
        $name    =  $this->supplyModel->find_name_from_id_fertilizer($productId)->name;
       
        
        $lineItems[] = [


            'quantity' => $quantity,
            'price_data' => [
                'currency' => 'lkr',
                'unit_amount' => $price*100,
                'product_data' => [
                    'name' => $name,
                    'metadata' => [
                        'product_id' => $productId,
                    ]
                 

                ]
                

            ],

        ];
        $serialized_line_items = json_encode($lineItems);
        $success_url = URLROOT . '/cart/createOrder?line_items='.urlencode($serialized_line_items);
             
        $session = \Stripe\Checkout\Session::create([
            'payment_method_types' => ['card'],
            'line_items' => $lineItems,
            'mode' => 'payment',
            'success_url' => $success_url,
            'cancel_url' => 'https://example.com/cancel',
        ]);
    
        // Redirect the user to the Checkout page
        header("Location: " . $session->url);
        



    }

    public function checkOut()
    {
        
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
          header('Content-Type: application/json');
        
            require '../app/vendor/autoload.php';
            $items = json_decode(trim(file_get_contents('php://input')));
           
            $items = $items->items;
           
            $total = 0;
            $lineItems = [];
            foreach ($items as $item) {
                $total += $item->productPrice*$item->quantity;
              
                $lineItems[] = [


                    'quantity' => $item->quantity,
                    'price_data' => [
                        'currency' => 'lkr',
                        'unit_amount' => $item->productPrice*100,
                        'product_data' => [
                            'name' => $item->productName,
                            'metadata' => [
                                'product_id' => $item->productId,
                            ]
                         

                        ]
                        

                    ],

                ];

            }
        
        $stripe = new \Stripe\StripeClient('sk_test_51MskWIIz6Y8hxLUJq8DTBxJ0xInEFNHtBn9H1i30ReXNtkRg6eAIrpz74kd2HYPYXN0v2TnqoT9jBMnJxWdqYXXu00gAVFTXaI');
        $serialized_line_items = json_encode($lineItems);
        $success_url = URLROOT . '/cart/createOrder?line_items='.urlencode($serialized_line_items);
        $session = $stripe->checkout->sessions->create([
            'payment_method_types' => ['card'],
            'success_url' => $success_url,
            'cancel_url' => URLROOT.'/cart'.'/payment_cancelled',
            'mode' => 'payment',
            'line_items' => $lineItems
        ]);
  

         //insert the code to insert order details in the database here

        echo json_encode(['id'=>$session->id]);
        
    }


    else{
 
          
        echo json_encode(['id'=>$session->id]);



    }



  

}



public function createOrder()
{     
      $orderData = $_GET["line_items"];
      $orderData = urldecode($orderData);
      $orderData = json_decode($orderData, true);
      if(isset($_SESSION['user_id']))

      {
         
          
          if($this->orderModel->createOnlineOrder($orderData)){
                    $_SESSION['success_msg'] = "order placed successfully";
                    $this->cartModel->clearAll();
                    //email
                    
                    redirect('pages/home');
                }
                
          else {
        
            $_SESSION['failure_msg'] = "order failed";; 
            redirect('pages/home');
        }
                }
          
          
          
       
      

      
  
    
   else{

    
    print_r($orderData);
      


   }


}

// public function cashOnlyOrder()
// {
   
//    $orderData =  $this->cartModel->getAllItems();

//    if($this->orderModel->createCOD($orderData))
//      { 
                   
//                     $this->cartModel->clearAll();
                    
//                     $_SESSION['success_msg'] = "order placed successfully";
//                     redirect('pages/home');
//      }        
//      $_SESSION['failure_msg'] = "order failed";; 
//      redirect('pages/home');

// }


public function add_to_cart_from_individual_page()
{   


    if($_SERVER['REQUEST_METHOD'] == 'POST'){
    
    $pro_id = $_POST['product_id'];
    $quantity = $_POST['quantity'];
   
    $url = "http://localhost/Sobawitha/fertilizer_product/view_individual_product?product_id=$pro_id";
    if ($this->cartModel->findByCartId($pro_id)) {

         $this->cartModel->updateItem($pro_id,$quantity);
         
        $_SESSION['cart_status'] = "added";

        header("Location: $url");

    }

    
else{
        $this->cartModel->insertItemiWithQuantity($pro_id,$quantity);
        $_SESSION['cart_status'] = "added";
         header("Location: $url");

}
}


else{

    echo "error";
}

}

}
