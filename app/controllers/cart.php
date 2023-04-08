<?php

class cart extends Controller
{

    private $cartModel;
    public function __construct()
    {
        $this->cartModel = $this->model('M_shopping_cart');
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
                $total += $item->productPrice * $item->quantity;
                $lineItems[] = [

                    'images' => [],

                    'quantity' => $item->quantity,
                    'price_data' => [
                        'currency' => 'usd',
                        'unit_amount' => $item->productPrice,
                        'product_data' => [
                            'name' => $item->productName,

                        ],

                    ],

                ];

            }
        
        $stripe = new \Stripe\StripeClient('sk_test_51MskWIIz6Y8hxLUJq8DTBxJ0xInEFNHtBn9H1i30ReXNtkRg6eAIrpz74kd2HYPYXN0v2TnqoT9jBMnJxWdqYXXu00gAVFTXaI');
        $session = $stripe->checkout->sessions->create([
            'payment_method_types' => ['card'],
            'success_url' => 'http://localhost/ecommerce/public/cart?status=success',
            'cancel_url' => 'http://localhost/ecommerce/public/cart?status=cancel',
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

}
