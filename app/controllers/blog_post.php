<?php

class blog_post extends Controller {
    public function __construct(){
        $this-> blog_post_model =$this->model('M_blog_post');
    }

    public function create_posts(){

        redirect('blog_post/display_all_blogposts');

        if($_SERVER['REQUEST_METHOD']=='POST'){
            //form is submitted

            //save the post
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
                $data = [
                    'title' => trim($_POST['title']),
                    'tag' => trim($_POST['tag']),
                    'discription' => trim($_POST['discription']),
                    'image'  => $_FILES['image'],
                    'officer_id' => ($_SESSION['user_id']),
                    'no_of_likes' => 0,
                    'image_name'=>$_FILES['image']['name'],
                    'form_submit_message' => '',
                    'image_err' => '',
                ];

                if(empty($data['image'])){
                    $data['image_err']='Post image cannot be empty';
                
                }
                else{
                    $fileExt=explode('.',$_FILES['image']['name']);
                    $fileActualExt=strtolower(end($fileExt));
                    $allowed=array('jpg','jpeg','png');        
                
                    if(!in_array($fileActualExt,$allowed)){
                    $data['image_err']='You cannot upload files of this type';
        
                    }
            
        
                    if($data['image']['size']>0){
                    if(uploadFile($data['image']['tmp_name'],$data['image_name'],'/upload/blog_post_images/')){
                                
                    }else{  
                    $data['image_err']='Unsuccessful post image uploading';
                    
                    }
                    }else{
                    $data[ 'image_err'] ="Blog post image file size is empty";
                    
                    }
              

                if($this->blog_post_model->create_posts($data)){
                    $data = ['form_submit_message' => 'Your post has been successfully added!'];
                    
                    redirect('blog_post/create_posts');
                    $this->view('inc/blog_post/v_create_blog',$data);
                }
                else{
                    $data = ['form_submit_message' => 'Post submitted fail.'];
                    $this->view('inc/blog_post/v_create_blog',$data);
                }
            }

            
        }
        else{
            $data = [
                'title' => '',
                'tag' => '',
                'discription' => '',
                'officer_id'=>'',
                'no_of_likes' => '',
                'form_submit_message' => ''

            ];
            
        }
    
        $this->view('Agri_officer/Blog_post/v_create_blog',$data);
    }


    public function display_all_blogposts(){

        unset($_SESSION['search_cont']);
        $_SESSION['search_cont'] = "Search by key-word";
    
    
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            
            if(isset($_POST['search_text'])){
                $search_cont = trim($_POST['search_text']);
            }
            else{
                $search_cont='';
            }
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
    
            $this->view('Agri_officer/Blog_post/v_create_blog',$data);
        }
        else{
            $blogpost = $this->blog_post_model->display_all_posts(); //data object array
            $data = [
                'blogpost' => $blogpost
            ];
    
            $this->view('Agri_officer/Blog_post/v_create_blog',$data);
        }
    
    }
    

    public function delete_post(){
        if($_SERVER['REQUEST_METHOD']=='POST'){
            $postid = trim($_POST['deletepost']);
            $this->blog_post_model->delete_post($postid);
        }
        redirect('blog_post/display_all_blogposts');
    }

    public function update_post(){

        if($_SERVER['REQUEST_METHOD']=='POST'){
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $data = [
                'title' => trim($_POST['title']),
                'tag' => trim($_POST['tag']),
                'discription' => trim($_POST['discription']),
                'image'  => $_FILES['image'],
                'image_name'=>$_FILES['image']['name'],
                'form_submit_message' => '',
                'image_err' => '',
                'post_id' => trim($_POST['updatepost'])
            ];

            /*error handling */
            if(empty($data['image'])){
                $data['image_err']='Post image cannot be empty';           
            }
            else{
                $fileExt=explode('.',$_FILES['image']['name']);
                $fileActualExt=strtolower(end($fileExt));
                $allowed=array('jpg','jpeg','png');        
            
                if(!in_array($fileActualExt,$allowed)){
                $data['image_err']='You cannot upload files of this type';
    
                }
    
                if($data['image']['size']>0){
                if(uploadFile($data['image']['tmp_name'],$data['image_name'],'/upload/blog_post_images/')){
                            
                }else{  
                $data['image_err']='Unsuccessful post image uploading';
                
                }
                }else{
                $data[ 'image_err'] ="Blog post image file size is empty";
                }
            }
             /*error handling */

            $this->blog_post_model->update_post($data);
            redirect('blog_post/display_all_blogposts');

        }
    }

    public function dashboard_chart_for_blogpost(){

    }

}

?>