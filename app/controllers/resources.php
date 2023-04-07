<?php

class resources extends Controller
{
    public function __construct()
    {
        $this->resources_model = $this->model('M_resources');
    }

    public function resource_page()
    {
        if(isset($_GET['page'])){
            $page = $_GET['page'];
        }
        else{
            $page = 1;
        }

        $num_per_page = 3;
        $start_from = ($page - 1) * $num_per_page;

        unset($_SESSION['search_cont']);
        $_SESSION['search_cont'] = "Search by key-word";
        $_SESSION['category'] = "All categories";
        $_SESSION['row_count'] = $this->resources_model->count_num_of_rows();
        $_SESSION['num_per_page'] = $num_per_page;


        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $resources = $this->resources_model->display_all_resources($start_from,$num_per_page); //data object array
            $best_resources = $this->resources_model->find_populerfeed();
            $search_cont = trim($_POST['search_text']);
            $search_resources = $this->resources_model->search_bar( $search_cont,$num_per_page,$start_from);

            if(isset($_GET['category'])){
                
                $category = trim($_GET['category']);
                $_SESSION['category'] = $category;

                if($category == "All categories"){
                    $category_related_posts=$this-> resources_model ->display_all_resources($start_from,$num_per_page);
                }
                else{
                    $category_related_posts=$this-> resources_model ->filter_post($category,$num_per_page,$start_from);
                }
                

                $data = [
                    'resources' => $category_related_posts,
                    'best_resources' => $best_resources
                ]; 
            }

            if($search_cont == ''){
                $data = [
                    'resources' => $resources,
                    'best_resources' => $best_resources
                ];    
            }
            else{

                $_SESSION['search_cont'] = $search_cont;
                $data = [
                    'resources' => $search_resources,
                    'best_resources' => $best_resources
                ]; 
            }

            $this->view('Agri_officer/Resources/v_resources', $data);
        }
        else{

            $resources = $this->resources_model->display_all_resources($start_from,$num_per_page); //data object array
            $best_resources = $this->resources_model->find_populerfeed();

            if(isset($_GET['category'])){
                $category = trim($_GET['category']);
                $_SESSION['category'] = $category;

                if($category == "All categories"){
                    $category_related_posts=$this-> resources_model ->display_all_resources($start_from,$num_per_page);
                }
                else{
                    $category_related_posts=$this-> resources_model ->filter_post($category,$num_per_page,$start_from);
                }

                $data = [
                    'resources' => $category_related_posts,
                    'best_resources' => $best_resources
                ]; 
            } else {
                $data = [
                    'resources' => $resources,
                    'best_resources' => $best_resources
                ];
            }

            $this->view('Agri_officer/Resources/v_resources', $data);

        }

    }

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
                $comments_for_reply = $this->resources_model->display_all_comment_for_reply($data);
                $no_of_likes = $this->resources_model->count_previous_like_with_user_id($id, $_SESSION['user_id'])->previous_like;
                $data1 = [
                    'ind_resource' => $individual_resource,
                    'related_post' => $related_post,
                    'comments' => $comments,
                    'count_comment' => $count_comment,
                    'comments_for_reply' => $comments_for_reply,
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
}


?>
