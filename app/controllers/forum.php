<?php

class forum extends Controller {

    private $notification_model;
    public function __construct(){
        $this-> forum_model =$this->model('M_forum');
        $this->notification_model = $this->model('M_notifications');
    }

    /*start new discussion by posting forum post */
    public function add_new_discussion(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $userid = $_SESSION['user_id'];
        }
        $data = [
            'subject' => trim($_POST['subject']),
            'type' => trim($_POST['diss_type']),
            'message' => trim($_POST['message']),
            'created_by' => $userid,
            'image'  => $_FILES['image'],
            'first_name'=>$_SESSION['username'],
            'last_name'=>$_SESSION['lastname'],
            'image_name'=>$_FILES['image']['name'],
            'form_submit_message' => '',

        ];

        if(empty($data['image_name'])){
            $data = [
                'subject' => trim($_POST['subject']),
                'type' => trim($_POST['diss_type']),
                'message' => trim($_POST['message']),
                'first_name'=>$_SESSION['username'],
                'last_name'=>$_SESSION['lastname'],
                'created_by' => $userid,
                'image_name'=>'',
    
            ];

            if($this->forum_model->add_new_discussion($data)){
                redirect('forum/forum');
                
            }
            else{
                redirect('forum/forum');
            }        
        }
        else{
            $fileExt=explode('.',$_FILES['image']['name']);
            $fileActualExt=strtolower(end($fileExt));
            $allowed=array('jpg','jpeg','png');        
        
            if(!in_array($fileActualExt,$allowed)){
                $_SESSION['image_err']='You cannot upload files of this type';
            }
    

            if($data['image']['size']>0){
            if(uploadFile($data['image']['tmp_name'],$data['image_name'],'/upload/forum_images/')){
                        
            }else{  
            $_SESSION['image_err']='Unsuccessful forum image uploading';
            
            }
            }else{
            // $_SESSION[ 'image_err'] ="forum image file size is empty";
            
            }
        if(!isset($_SESSION['image_err'])){
            if($this->forum_model->add_new_discussion($data)){
                redirect('forum/forum');  
            }
            else{
                redirect('forum/forum');
            }
        }
        else{
            redirect('forum/forum');
        }
        
    }

    
    }

/*reply for discussions */
    public function add_reply_for_discussion(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $userid = $_SESSION['user_id'];
        }
        $data = [
            'reply' => trim($_POST['reply']),
            'discussion_id' => trim($_GET['discussion_id']),
            'created_by' => $userid,
            'image'  => $_FILES['image'],
            'first_name'=>$_SESSION['username'],
            'last_name'=>$_SESSION['lastname'],
            'image_name'=>$_FILES['image']['name'],
            'form_submit_message' => '',
            'image_err' => '',
        ];

        if(empty($data['image_name'])){
            $data = [
                'reply' => trim($_POST['reply']),
                'discussion_id' => trim($_GET['discussion_id']),
                'first_name'=>$_SESSION['username'],
                'last_name'=>$_SESSION['lastname'],
                'created_by' => $userid,
                'image_name'=>"",
            ];

            if($this->forum_model->add_reply_for_discussion($data)){
                redirect('forum/forum');
                
            }
            else{
                redirect('forum/forum');
            }
        
        }
        else{
            $fileExt=explode('.',$_FILES['image']['name']);
            $fileActualExt=strtolower(end($fileExt));
            $allowed=array('jpg','jpeg','png');        
        
            if(!in_array($fileActualExt,$allowed)){
                $_SESSION['image_err']='You cannot upload files of this type';
            }
    

            if($data['image']['size']>0){
            if(uploadFile($data['image']['tmp_name'],$data['image_name'],'/upload/forum_reply_images/')){
                        
            }else{  
            $_SESSION['image_err']='Unsuccessful forum image uploading';
            
            }
            }else{
           // $_SESSION[ 'image_err'] ="forum image file size is empty";
            
            }
            if(!isset($_SESSION['image_err'])){
                if($this->forum_model->add_new_discussion($data)){
                    redirect('forum/forum');  
                }
                else{
                    redirect('forum/forum');
                }
            }
            else{
                // echo "come here";
                // die();
                redirect('forum/forum');
            }
    }
    }

    /**display all forum posts */
    public function forum(){
        if(isset($_SESSION['user_id'])){
            $no_of_notifications = $this->notification_model->find_notification_count()->total_count;
            $notifications = $this->notification_model->notifications();
        if($_SERVER['REQUEST_METHOD']=='POST'){
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $search_cont=$_POST['search_text'];
            $forum_discussions = $this->forum_model->display_all_discussion();
            $discussion_reply =  $this->forum_model->display_all_discussion_reply();
            
            
            if($search_cont == '' ){
                $data = [
                    'forum_discussions' => $forum_discussions,
                    'discussion_reply' => $discussion_reply,
                    'display_message'=>'',
                    'search_text'=>"Search by key-word",
                    'no_of_notifications' =>$no_of_notifications,
                    'notifications' => $notifications
                ];    
            }
            else{
                $search_discussions = $this->forum_model->search_from_forum($search_cont);
                if(!empty($search_discussions)){
                    $data = [
                        'forum_discussions' => $search_discussions,
                        'discussion_reply' => $discussion_reply,
                        'display_message'=> '',
                        'search_text'=>$search_cont,
                        'no_of_notifications' =>$no_of_notifications,
                        'notifications' => $notifications
                    ];
                }
                else{
                    $data = [
                        'display_message'=> 'No match found..',
                        'discussion_reply' => $discussion_reply,
                        'search_text'=>$search_cont,
                        'no_of_notifications' =>$no_of_notifications,
                        'notifications' => $notifications
                    ];
                }
                
            }
            $this->view('Users/forum/v_forum',$data);
            
        }

        else{
            $forum_discussions = $this->forum_model->display_all_discussion();
            $discussion_reply =  $this->forum_model->display_all_discussion_reply();
            $data = [
                'forum_discussions' => $forum_discussions,
                'discussion_reply' => $discussion_reply,
                'search_text'=>"Search by key-word",
                'display_message'=> '',
                'no_of_notifications' =>$no_of_notifications,
                'notifications' => $notifications
            ]; 
            $this->view('Users/forum/v_forum',$data);
        }
    }
    else{
        redirect('Login/login');
    }
        
    }

    /*after post discussion ----> forum_post */
    public function delete_forum_post(){
        if($_SERVER['REQUEST_METHOD']=='POST'){
            $forumpostid = trim($_POST['deletepost']);
            $this->forum_model->delete_forum_post($forumpostid);
        }
        redirect('forum/forum');
    }

    /**delete forum posts */
    public function delete_forum_post_reply(){
        if($_SERVER['REQUEST_METHOD']=='POST'){
            $forumpostreplyid = trim($_POST['deletereply']);
            $this->forum_model->delete_forum_post_reply($forumpostreplyid);
        }
        redirect('forum/forum');
    }

    /**edit forum posts */
    public function edit_forum_content(){
        if($_SERVER['REQUEST_METHOD']=='POST'){
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $post_image = trim($_GET['post_image']);
            if(empty($post_image)){
                $data=[
                    'post_id' => trim($_GET['postid']),
                    'edit_content'=> trim($_POST['forum_discription']),
                    'image_name'=>NULL,           
                ];
                $this->forum_model->edit_forum_post($data);
                redirect('forum/forum');
            }
            else{
                $data = [
                    'post_id' => trim($_GET['postid']),
                    'edit_content'=> trim($_POST['forum_discription']),
                    'image'=>$_FILES['image'],
                    'image_name'=>$_FILES['image']['name']
                ];

                if(empty($data['image_name'])){
                    $data = [
                        'post_id' => trim($_GET['postid']),
                        'edit_content'=> trim($_POST['forum_discription']),
                        'image_name'=>$post_image,
                    ];
        
                    if($this->forum_model->edit_forum_post($data)){
                        redirect('forum/forum');  
                    }
                    else{
                        redirect('forum/forum');
                    }
                }
                else{
                    $fileExt=explode('.',$_FILES['image']['name']);
                    $fileActualExt=strtolower(end($fileExt));
                    $allowed=array('jpg','jpeg','png');        
                
                    if(!in_array($fileActualExt,$allowed)){
                        $_SESSION['image_err']='You cannot upload files of this type';
                    }
            
        
                    if($data['image']['size']>0){
                    if(uploadFile($data['image']['tmp_name'],$data['image_name'],'/upload/forum_images/')){
                                
                    }else{  
                        $_SESSION['image_err']='Unsuccessful forum image uploading';
                    }
                    }else{
                    //$_SESSION[ 'image_err'] ="forum image file size is empty";
                    }
              
        
                    if(!isset($_SESSION['image_err'])){
                        if($this->forum_model->edit_forum_post($data)){
                            redirect('forum/forum');  
                        }
                        else{
                            redirect('forum/forum');
                        }
                    }
                    else{
                        redirect('forum/forum');
                    }
                }
                }

            }
    }

    /**edit forum post reply */
    public function edit_reply_content(){
        if($_SERVER['REQUEST_METHOD']=='POST'){
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $post_image = trim($_GET['reply_post_image']);

            if(empty($post_image)){
                $data=[
                    'reply_id' => trim($_GET['reply_id']),
                    'edit_content'=> trim($_POST['reply_discription']),
                    'image_name'=>NULL,           
                ];
                $this->forum_model->edit_forum_post_reply($data);
                redirect('forum/forum');
            }
            else{
                $data = [
                    'reply_id' => trim($_GET['reply_id']),
                    'edit_content'=> trim($_POST['reply_discription']),
                    'image'=>$_FILES['image'],
                    'image_name'=>$_FILES['image']['name']
                ];

                if(empty($data['image_name'])){
                    $data = [
                        'reply_id' => trim($_GET['reply_id']),
                        'edit_content'=> trim($_POST['reply_discription']),
                        'image_name'=>$post_image,
                    ];
        
                    if($this->forum_model->edit_forum_post_reply($data)){
                        redirect('forum/forum');  
                    }
                    else{
                        redirect('forum/forum');
                    }
                }
                else{
                    $fileExt=explode('.',$_FILES['image']['name']);
                    $fileActualExt=strtolower(end($fileExt));
                    $allowed=array('jpg','jpeg','png');        
                
                    if(!in_array($fileActualExt,$allowed)){
                        $_SESSION['image_err']='You cannot upload files of this type';
                    }
            
        
                    if($data['image']['size']>0){
                    if(uploadFile($data['image']['tmp_name'],$data['image_name'],'/upload/forum_reply_images/')){
                                
                    }else{  
                    $_SESSION['image_err']='Unsuccessful forum image uploading';
                    
                    }
                    }else{
                    //$_SESSION[ 'image_err'] ="forum image file size is empty";
                    
                    }
              
                    if(!isset($_SESSION['image_err'])){
                        if($this->forum_model->edit_forum_post_reply($data)){
                            redirect('forum/forum');  
                        }
                        else{
                            redirect('forum/forum');
                        }
                    }
                    else{
                        redirect('forum/forum');
                    }
                }
                }
    }}
    
    
    }

?>