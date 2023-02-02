<?php

class comment extends Controller
{
    public function __construct()
    {
        $this->comment_model = $this->model('M_comment');
    }


    public function display_all_comment(){
        $id = trim($_GET['blog_post_id']);
        $data = [
            'resource_id' => $id,
        ];

        $comments=$this-> comment_model ->display_all_comment($data);
        $count_comment= $this-> comment_model ->count_all_comment($data);
        $author = $this->comment_model->find_user($data);
        $reply=$this-> comment_model ->display_all_reply($data);
        $count_reply = $this->comment_model->count_all_reply($data);

        $data1 = [
            'comments' => $comments,
            'count_comment' =>$count_comment, //change
            'author' => $author,
        ];

        $this->view('inc/component/v_comment', $data1);
    }

    public function display_all_reply(){

    }

    
}


?>
