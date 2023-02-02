<?php

class blog_post extends Controller {
    public function __construct(){
        $this-> blog_post_model =$this->model('M_blog_post');
    }

    public function create_posts(){

        redirect('blog_post/resource_page_create');
        if($_SERVER['REQUEST_METHOD']=='POST'){
            //form is submitted

            //save the post
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            if (!empty($_FILES['image']['name'])) {
                $fileName = basename($_FILES['image']['name']);
                $fileType = pathinfo($fileName, PATHINFO_EXTENSION);
                $allowTypes = array('jpg', 'png', 'jpeg', 'gif');
                if (in_array($fileType, $allowTypes)) {
                    $image = $_FILES['image']['tmp_name'];

                    $imgContent = addslashes(file_get_contents($image));
                } else {
                    $data1 = ['form_submit_message' => 'sorry, only JPG,JPEG,PNG, &GIF files are allowed to uploard.'];
                }
            }
            else{
                $data1 = ['form_submit_message' => 'File uploard fail.'];
            }

            if (empty($data1['form_submit_message'])) {

                

                $data1 = [
                    'title' => trim($_POST['title']),
                    'tag' => trim($_POST['tag']),
                    'discription' => trim($_POST['discription']),
                    'image' => $imgContent,
                    'officer_id' => ($_SESSION['user_id']),
                    'no_of_likes' => 0,
                    'form_submit_message' => '',
                ];

                if($this->blog_post_model->create_posts($data1)){
                    $data1 = ['form_submit_message' => 'Your post has been successfully added!'];
                    $this->view('inc/blog_post/v_create_blog',$data1);
                }
                else{
                    $data1 = ['form_submit_message' => 'Post submitted fail.'];
                    $this->view('inc/blog_post/v_create_blog',$data1);
                }
            }
            else{
                $this->view('inc/blog_post/v_create_blog',$data1);
            }

            
        }
        else{
            $data1 = [
                'title' => '',
                'tag' => '',
                'discription' => '',
                'image' => '',
                'officer_id'=>'',
                'no_of_likes' => '',
                'form_submit_message' => ''

            ];
            
        }
    
        $this->view('inc/blog_post/v_create_blog',$data1);
        
    }

    public function resource_page_create(){
        redirect('blog_post/display_all_blogposts');
    }

    public function display_all_blogposts(){

        unset($_SESSION['search_cont']);
        $_SESSION['search_cont'] = "Search by key-word";


        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $search_cont = trim($_POST['search_text']);
            $search_post = $this->blog_post_model->search_bar($search_cont);
            $blogpost = $this->blog_post_model->display_all_posts(); //data object array

            if($search_cont == ''){
                $data = [
                    'blogpost' => $blogpost,
                ];    
            }
            else{

                $_SESSION['search_cont'] = $search_cont;
                $data = [
                    'blogpost' => $search_post
                ];
            }

            $this->view('inc/blog_post/v_create_blog',$data);
        }
        else{
            $blogpost = $this->blog_post_model->display_all_posts(); //data object array
            $data = [
                'blogpost' => $blogpost
            ];

            $this->view('inc/blog_post/v_create_blog',$data);
        }
        
    }

}

?>