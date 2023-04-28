<?php

class fertilizer_product extends Controller
{
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
                redirect('Pages/individual_item?product_id='.$product_id);
            }
        }
    }

    public function post_reply(){

        if($_SERVER['REQUEST_METHOD']=='POST'){
            //save the comment
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $post_id = trim($_GET['blog_post_id']);
            $tag = trim($_GET['category']);
            $comment_id = trim($_GET['comment_id']);

            $data = [
                'user_id' => ($_SESSION['user_id']),
                'post_id'=> $post_id,
                'reply' => trim($_POST['reply']),
                'comment_id' => $comment_id,
                'first_name' => ($_SESSION['username']),
                'last_name' => ($_SESSION['lastname'])
            ];

            if($this->resources_model->post_reply($data)){
                redirect('resources/view_individual_resource?blog_post_id='.$post_id. '&category='.$tag );
            }
        }
    }

   
}


?>
