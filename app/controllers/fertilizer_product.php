<?php

class fertilizer_product extends Controller
{
    private $fertilizer_product_model;
    private $resources_model;
    public function __construct()
    {
        $this->fertilizer_product_model = $this->model('M_fertilizer_product');
    }

    public function individual_item(){
        // $product_id = trim($_GET['product_id']);
        $id=$_SESSION['user_id'];
        $data =['product_id' => 1];
        $comment = $this->fertilizer_product_model->display_all_comment($data);
        $reply_for_comment = $this->fertilizer_product_model->display_all_replies($data);
        $question = $this->fertilizer_product_model->display_all_questions($data);
        $answers = $this->fertilizer_product_model->display_all_answers($data);
        $current_user_gender = $this->fertilizer_product_model->find_gender($id)->gender;
        $product_owner_id = $this->fertilizer_product_model->find_owner_id($data['product_id'])->owner_id;
        $data = [
            'comments' => $comment,
            'reply_for_comment' => $reply_for_comment,
            'question' => $question,
            'answers' => $answers,
            'current_user_gender' => $current_user_gender,
            'product_owner_id' => $product_owner_id
        ];
        $this->view('Users/component/individual_item', $data);
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
                redirect('fertilizer_product/individual_item?product_id='.$product_id);
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
                redirect('fertilizer_product/individual_item?product_id='.$product_id );
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
                redirect('fertilizer_product/individual_item?product_id='.$product_id);
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
                redirect('fertilizer_product/individual_item?product_id='.$product_id );
            }
        }
    }

    public function view_individual_product($id){
        $content = $this->fertilizer_product_model->view_individual_product($id);
        // $title = $content->product_name;
        if (is_object($content)) {
            $title = $content->product_name;
        } else {
            $title = "Unknown Product";
        }
        $crop_type = $content->crop_type;
        $type = $content->type;
        $similar = $this->fertilizer_product_model->show_similar($title,$crop_type,$type,$id);
        
        $data=[
            'adcontent' => $content,
            'similar' => $similar
        ];
        $this->view('Users/component/individual_item',$data);


    }

   
}


?>
