<?php

class resources extends Controller
{
    public function __construct()
    {
        $this->resources_model = $this->model('M_resources');
    }

    public function resource_page(){
        if(isset($_GET['page'])){
            $page = $_GET['page'];
        }
        else{
            $page = 1;
        }
        $num_per_page = 3;
        $start_from = ($page - 1) * $num_per_page;
        $_SESSION['num_per_page'] = $num_per_page;

        $resources = $this->resources_model->display_all_resources($start_from,$num_per_page); //data object array
        $best_resources = $this->resources_model->find_populerfeed();

        // print_r($resources);
        // die();

        if(empty($resources)){
            // echo"EMPTY";
            // die();
            if(isset($_POST['search_text']) && !empty($_POST['search_text']))
            {
                $data=[
                    'search_text'=>($_POST['search_text']),
                    'resource_page_display_message'=> 'match not found...',
                    'best_resources' => $best_resources,
                ];
            }
            else{
                $data=[
                    'search_text'=>'search by key-word',
                    'resource_page_display_message'=> 'match not found...',
                    'best_resources' => $best_resources,
                ];
            }
            
            $this->view('Agri_officer/Resources/v_resources', $data);
        }
        else{
            $data=[
                'search_text'=>'search by key-word',
                'resource_page_display_message'=> '',
                'best_resources' => $best_resources,
                'resources' => $resources,
            ];
            $this->view('Agri_officer/Resources/v_resources', $data);
        }
            
        }
    /**code here */

    

    public function view_individual_resource()
    {
            
            if(isset($_SESSION['user_id'])){
                //press read_more
                $id = trim($_GET['blog_post_id']);
                $tag = trim($_GET['category']);
                $data = [
                    'resource_id' => $id,
                    'tag' => $tag

                ];

                $individual_resource=$this-> resources_model ->view_individual_resource($data);
                $related_post = $this->resources_model->related_post($data);
                $comments=$this-> resources_model ->display_all_comment($data);
                $count_comment= $this-> resources_model ->count_all_comment($data);
                $reply_for_comment = $this->resources_model->display_all_comment_for_reply($data);
                $no_of_likes = $this->resources_model->count_previous_like_with_user_id($id, $_SESSION['user_id'])->previous_like;
                $data1 = [
                    'ind_resource' => $individual_resource,
                    'related_post' => $related_post,
                    'comments' => $comments,
                    'count_comment' => $count_comment,
                    'reply_for_comment' => $reply_for_comment,
                    'previous_like_status' => $no_of_likes
                ];
                $this->view('Agri_officer/Resources/individual_resource', $data1);
            }
            else{
                redirect('Login/login');
            }
            
    }

    //save comment
    public function post_comment(){

        if($_SERVER['REQUEST_METHOD']=='POST'){
            //save the comment
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $post_id = trim($_GET['blog_post_id']);
            $tag = trim($_GET['category']);

            $data = [
                'user_id' => ($_SESSION['user_id']),
                'post_id'=> $post_id,
                'comment' => trim($_POST['comment'])
            ];

            if($this->resources_model->post_comment($data)){
                redirect('resources/view_individual_resource?blog_post_id='.$post_id.'&category='.$tag);
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

    public function like_post(){
        if(isset($_POST['like'])){

        
            $tag = trim($_GET['category']);
            $id = trim($_GET['blog_post_id']);
            $user_id= trim($_SESSION['user_id']);
            $no_of_likes = $this->resources_model->count_previous_like_with_user_id($id, $user_id)->previous_like;
            
            if($no_of_likes==0){
                $this->resources_model->like($id);
                $this->resources_model->update_like_table($id, $user_id);
            }
            else{
                $this->resources_model->dislike($id);
                $this->resources_model->remove_unlike_user_from_like_table($id, $user_id);
            }
            redirect('resources/view_individual_resource?blog_post_id='.$id.'&category='.$tag);
        }
    }



    public function delete_comment(){
        if($_SERVER['REQUEST_METHOD']=='POST'){
            $commentid = trim($_POST['deletecomment']);
            $id=$this->resources_model->find_blogpost_id($commentid)->post_id;
            $tag=$this->resources_model->find_category($id)->category;
            $this->resources_model->delete_comment($commentid);
        }
        redirect('resources/view_individual_resource?blog_post_id='.$id.'&category='.$tag);
    }

    public function delete_reply(){
        if($_SERVER['REQUEST_METHOD']=='POST'){
            $replyid = trim($_POST['deletereply']);
            $id=$this->resources_model->find_blogpost_id_from_replyid($replyid)->post_id;
            $tag=$this->resources_model->find_category($id)->category;
            $this->resources_model->delete_reply($replyid);
        }
        redirect('resources/view_individual_resource?blog_post_id='.$id.'&category='.$tag);
    }

    public function edit_comment(){
        if($_SERVER['REQUEST_METHOD']=='POST'){
            $commentid = $_GET['comment_id'];
            $comment = $_POST['comment_body'];
            $data=[
                'comment_id' => $commentid,
                'comment' => $comment
            ];
            $id=$this->resources_model->find_blogpost_id($commentid)->post_id;
            $tag=$this->resources_model->find_category($id)->category;
            $this->resources_model->edit_comment($data);
        }
        redirect('resources/view_individual_resource?blog_post_id='.$id.'&category='.$tag);
    }

    public function edit_reply(){
        if($_SERVER['REQUEST_METHOD']=='POST'){
            $replyid = $_GET['reply_id'];
            $reply = $_POST['reply_body'];
            $data=[
                'reply_id' => $replyid,
                'reply' => $reply
            ];
            $id=$this->resources_model->find_blogpost_id_from_replyid($replyid)->post_id;
            $tag=$this->resources_model->find_category($id)->category;
            $this->resources_model->edit_reply($data);
        }
        redirect('resources/view_individual_resource?blog_post_id='.$id.'&category='.$tag);
    }
}


?>
