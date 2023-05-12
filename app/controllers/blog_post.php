<?php

class blog_post extends Controller {

    private $notification_model;
    public function __construct(){
        $this-> blog_post_model =$this->model('M_blog_post');
        $this->notification_model = $this->model('M_notifications');
        
    }

    public function create_posts(){

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
                    'post_submit_message' => '',
                    'image_err' => '',
                ];

                if(empty($data['image_name'])){
                    $_SESSION['image_err']='Post image cannot be empty';
                    redirect('blog_post/display_all_blogposts');
                }
                else{
                    $fileExt=explode('.',$_FILES['image']['name']);
                    $fileActualExt=strtolower(end($fileExt));
                    $allowed=array('jpg','jpeg','png');        
                
                    if(!in_array($fileActualExt,$allowed)){
                        $_SESSION['image_err']='You cannot upload files of this type';
                    }

                    if($data['image']['size']>0){
                    if(uploadFile($data['image']['tmp_name'],$data['image_name'],'/upload/blog_post_images/')){
                                
                    }else{  
                        $_SESSION['image_err']='Unsuccessful post image uploading';
                    
                    }
                    }else{
                        $_SESSION[ 'image_err'] ="Blog post image file size is empty";
                    
                    }

                    if(!isset($_SESSION['image_err'])){
                        if($this->blog_post_model->create_posts($data)){
                            $_SESSION['alert_message'] = 'Your post has been successfully added!';
                            redirect('blog_post/display_all_blogposts');
                        }
                        else{
                            $_SESSION['alert_message'] = 'Post submitted fail.';
                            redirect('blog_post/display_all_blogposts');
                        }
                    }
                    else{
                        redirect('blog_post/display_all_blogposts');
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
                'post_submit_message' => '',
                'image_err' => ''

            ];
            redirect('blog_post/display_all_blogposts');
            
        }
    }


    public function display_all_blogposts(){

    if(isset($_SESSION['user_id'])){
        $no_of_notifications = $this->notification_model->find_notification_count()->total_count;
        $notifications = $this->notification_model->notifications();
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING); 
            if(isset($_POST['search_text'])){
                $search_cont = trim($_POST['search_text']);
                $blogpost = $this->blog_post_model->search_bar($search_cont);
                if(empty($search_cont)){
                    $search_cont = 'search by key-word';
                }
                if(!empty($blogpost)){
                    $data = [
                        'blogpost' => $blogpost,
                        'search_text' => $search_cont,
                        'search_result_message'=>'',
                        'no_of_notifications' =>$no_of_notifications,
                        'notifications' => $notifications
                    ];
                    $this->view('Agri_officer/Blog_post/v_create_blog',$data);
                }
                else{
                    $data = [
                        'search_result_message'=>'match not found...',
                        'search_text' =>$search_cont ,
                        'no_of_notifications' =>$no_of_notifications,
                        'notifications' => $notifications
                    ];
                    $this->view('Agri_officer/Blog_post/v_create_blog',$data);
                }    
            }
            else{   
                $blogpost = $this->blog_post_model->display_all_posts(); //data object array
                $data=[
                    'blogpost' => $blogpost,
                    'search_text' => 'Search by key-word',
                    'search_result_message'=>'',
                    'no_of_notifications' =>$no_of_notifications,
                    'notifications' => $notifications
                ];
                $this->view('Agri_officer/Blog_post/v_create_blog',$data);
            }
        }
        else{
            $blogpost = $this->blog_post_model->display_all_posts(); //data object array
            $data=[
                'blogpost' => $blogpost,
                'search_text' => 'Search by key-word',
                'search_result_message'=>'',
                'no_of_notifications' =>$no_of_notifications,
                'notifications' => $notifications
            ];
            $this->view('Agri_officer/Blog_post/v_create_blog',$data);
        }
    }
    else{
        redirect('Login/login');
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
            if(empty($data['image']['name'])){
                $data['image_err']='Post image cannot be empty';
                $image_name=$this->blog_post_model->select_image_name($data['post_id'])->update_post_image;
                $data['image_name']=$image_name;
                $this->blog_post_model->update_post($data);        
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
                if($this->blog_post_model->update_post($data)){
                    $_SESSION['alert_message'] = 'Your post has been successfully updated!';
                }
                else{
                    $_SESSION['alert_message'] = 'Post update error!';
                }
            }
            redirect('blog_post/display_all_blogposts');

        }
    }


}

?>