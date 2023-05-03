<?php

class cart extends Controller
{

    private $cartModel,$orderModel,$paymentModel;
    public function __construct()
    {
        $this->cartModel = $this->model('M_shopping_cart');
        $this->orderModel = $this->model('M_order');
        $this->paymentModel = $this->model('M_seller_payment');
    }

    public function display_all_items()
    {

        $data['title'] = 'cart';
        $data['cart'] = $this->cartModel->getAllItems();

        $this->view('Buyer/Shopping_cart/v_shopping_cart', $data);

    }

    public function addToCart($pro_id)
    {

        if ($this->cartModel->findByCartId($pro_id)) {

            //alert message if it is already in the cart

            $this->display_all_items();

        }

        {

            $this->cartModel->insertItem($pro_id);
            $this->display_all_items();

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

    public function checkOut()
    {
        
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
          header('Content-Type: application/json');
        
            require_once '../vendor/autoload.php';
            $items = json_decode(trim(file_get_contents('php://input')));
            $checkboxvalue  =  $items->checkboxvalue;
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
                    $_SESSION['order_status'] = "success";
                    $this->cartModel->clearAll();
                    
                    
                    redirect('Cart/display_all_items');
                }
                
          else {
        
            $_SESSION['order_status'] = "failure"; 
            redirect('Cart/display_all_items');
        }
                }
          
          
          
       
      

      
  
    
   else{

    
    print_r($orderData);
      


   }


}

public function cashOnlyOrder()
{
   
   $orderData =  $this->cartModel->getAllItems();

   print_r($orderData[0]->product_price);
   if($this->orderModel->createCOD($orderData))
     { 
        print_r(count($orderData));

     }

}

}
