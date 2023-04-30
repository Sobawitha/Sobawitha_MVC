<?php

class fertilizer_product extends Controller
{
    private $fertilizer_product_model;
    private $resources_model;
    public function __construct()
    {
        $this->fertilizer_product_model = $this->model('M_fertilizer_product');
    }

    //save comment
    public function post_comment(){

        if($_SERVER['REQUEST_METHOD']=='POST'){
            //save the comment
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $product_id = trim($_GET['product_id']);

            $data = [
                'commented_by' => ($_SESSION['user_id']),
                'product_id'=> $product_id,
                'comment' => trim($_POST['comment'])
            ];

            if($this->fertilizer_product_model->post_comment($data)){
                redirect('fertilizer_product/view_individual_product?product_id='.$product_id);
            }
        }
    }

    public function post_reply(){

        if($_SERVER['REQUEST_METHOD']=='POST'){
            //save the comment
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $product_id = trim($_GET['product_id']);
            $comment_id = trim($_GET['comment_id']);

            $data = [
                'replied_by' => ($_SESSION['user_id']),
                'product_id'=> $product_id,
                'reply' => trim($_POST['reply']),
                'comment_id' => $comment_id,
            ];

            if($this->fertilizer_product_model->post_reply($data)){
                redirect('fertilizer_product/view_individual_product?product_id='.$product_id );
            }
        }
    }


    public function post_question(){

        if($_SERVER['REQUEST_METHOD']=='POST'){
            //save the comment
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $product_id = trim($_GET['product_id']);

            $data = [
                'asked_by' => ($_SESSION['user_id']),
                'product_id'=> $product_id,
                'question' => trim($_POST['question'])
            ];

            if($this->fertilizer_product_model->post_question($data)){
                redirect('fertilizer_product/view_individual_product?product_id='.$product_id);
            }
        }
    }

    public function post_answer(){

        if($_SERVER['REQUEST_METHOD']=='POST'){
            //save the comment
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $product_id = trim($_GET['product_id']);
            $question_id = trim($_GET['question_id']);

            $data = [
                'answered_by' => ($_SESSION['user_id']),
                'product_id'=> $product_id,
                'answer' => trim($_POST['answer']),
                'question_id' => $question_id,
            ];

            if($this->fertilizer_product_model->post_answer($data)){
                redirect('fertilizer_product/view_individual_product?product_id='.$product_id );
            }
        }
    }

    public function view_individual_product(){
        $id = $_GET['product_id'];
        $content = $this->fertilizer_product_model->view_individual_product($id);
        if (is_object($content)) {
            $title = $content->product_name;
        } else {
            $title = "Unknown Product";
        }
        $crop_type = $content->crop_type;
        $type = $content->type;
        $similar = $this->fertilizer_product_model->show_similar($title,$crop_type,$type,$id);

        $id=$_SESSION['user_id'];
        $data =['product_id' =>  $_GET['product_id']]; 
        // echo $data['product_id'];
        // die();
        $comment = $this->fertilizer_product_model->display_all_comment($data);
        $reply_for_comment = $this->fertilizer_product_model->display_all_replies($data);
        $question = $this->fertilizer_product_model->display_all_questions($data);
        $answers = $this->fertilizer_product_model->display_all_answers($data);
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
            'no_of_cart_item' => $no_of_cart_item
        ];
        
        $this->view('Users/component/individual_item',$data);


    }


    function complete_order(){
        // $quantity = $_POST['quantity'];
        $quantity =1; 
        $product_id = $_GET['product_id'];
        //$price = $this->fertilizer_product_model->find_price_from_id($product_id)->product_price;
        // $price =780;
        $data = [
          'product_id' => $_GET['product_id'],
          //'price' => $price,
          'quantity' => $quantity,
          'user_id' => $_SESSION['user_id'],
        ];
      
        // Insert data into the database
        $this->fertilizer_product_model->insert_order_table($data);
        $this->fertilizer_product_model->update_fertilizer_count($product_id, $quantity);

        $_SESSION['complete_order_msg'] = "complete";

        redirect('fertilizer_product/view_individual_product?product_id='.$product_id);
      
        // // Return a success response
        // echo json_encode(['status' => 'success']);
      }

      /*fertilizer_order_list */
      function list_order_deatils($id){
        $order_list = $this-> fertilizer_product_model -> list_order_deatils($id);

        $data =[
            'order_list' => $order_list
        ];

        $this->view('Seller/Seller_order/v_seller_order_list',$data);

      }

    //   function check_cart($id){
        
    //     $data=[
    //         'no_of_cart_item' => $no_of_cart_item
    //     ];
    //   }
      

    
   
}


?>
