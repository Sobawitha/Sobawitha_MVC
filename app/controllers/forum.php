<?php

class forum extends Controller {
    public function __construct(){
        $this-> forum_model =$this->model('M_forum');
    }

  

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
            'image_err' => '',

        ];

        if(empty($data['image'])){
            $data = [
                'subject' => trim($_POST['subject']),
                'type' => trim($_POST['diss_type']),
                'message' => trim($_POST['message']),
                'first_name'=>$_SESSION['username'],
                'last_name'=>$_SESSION['lastname'],
                'created_by' => $userid,
                'image_name'=>'NULL',
    
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
                $data['image_err']='You cannot upload files of this type';
            }
    

            if($data['image']['size']>0){
            if(uploadFile($data['image']['tmp_name'],$data['image_name'],'/upload/forum_images/')){
                        
            }else{  
            $data['image_err']='Unsuccessful forum image uploading';
            
            }
            }else{
            $data[ 'image_err'] ="forum image file size is empty";
            
            }
      

        if($this->forum_model->add_new_discussion($data)){
            redirect('forum/forum');
           
        }
        else{
            redirect('forum/forum');
        }
    }

    
    }


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

        if(empty($data['image'])){
            $data = [
                'reply' => trim($_POST['reply']),
                'discussion_id' => trim($_GET['discussion_id']),
                'first_name'=>$_SESSION['username'],
                'last_name'=>$_SESSION['lastname'],
                'created_by' => $userid,
                'image_name'=>"NULL",
    
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
                $data['image_err']='You cannot upload files of this type';
            }
    

            if($data['image']['size']>0){
            if(uploadFile($data['image']['tmp_name'],$data['image_name'],'/upload/forum_reply_images/')){
                        
            }else{  
            $data['image_err']='Unsuccessful forum image uploading';
            
            }
            }else{
            $data[ 'image_err'] ="forum image file size is empty";
            
            }
      

        if($this->forum_model->add_reply_for_discussion($data)){
            redirect('forum/forum'); 
        }
        else{
            redirect('forum/forum');
        }
    }
    }



    public function forum(){
        unset($_SESSION['search_cont']);
        $_SESSION['search_cont'] = "Search by key-word";

        if($_SERVER['REQUEST_METHOD']=='POST'){
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $search_cont="";
            $search_discussions = $this->forum_model->search_bar($search_cont);
            $forum_discussions = $this->forum_model->display_all_discussion();
            $discussion_reply =  $this->forum_model->display_all_discussion_reply();
            // if(isset( $_GET['reply_discussion_id'])){
            //     $reply_discussion_id = $_GET['reply_discussion_id'];
            //     $discussion_reply = $this->forum_model->display_all_discussion_reply($reply_discussion_id);
            // }
            
            if($search_cont == '' ){
                $data = [
                    'forum_discussions' => $forum_discussions,
                    'discussion_reply' => $discussion_reply
                ];    
            }
            else{
    
                $_SESSION['search_cont'] = $search_cont;
                $data = [
                    'forum_discussions' => $search_discussions,
                    'discussion_reply' => $discussion_reply
                ];
            }
            $this->view('Users/forum/v_forum',$data);
        }

        else{
            $forum_discussions = $this->forum_model->display_all_discussion();
            $discussion_reply =  $this->forum_model->display_all_discussion_reply();
            $data = [
                'forum_discussions' => $forum_discussions,
                'discussion_reply' => $discussion_reply
            ]; 
        }
        $this->view('Users/forum/v_forum',$data);
        

    }

    public function delete_forum_post(){
        if($_SERVER['REQUEST_METHOD']=='POST'){
            $forumpostid = trim($_POST['deletepost']);
            $this->forum_model->delete_forum_post($forumpostid);
        }
        redirect('forum/forum');
    }

    public function delete_forum_post_reply(){
        if($_SERVER['REQUEST_METHOD']=='POST'){
            $forumpostreplyid = trim($_POST['deletereply']);
            $this->forum_model->delete_forum_post_reply($forumpostreplyid);
        }
        redirect('forum/forum');
    }



}

?>