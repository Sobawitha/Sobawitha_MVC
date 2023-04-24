<?php

class complaint extends Controller
{
    public function __construct()
    {
        $this->complaint_model = $this->model('M_complaint');
    }

    public function contact_us(){
        $data = [];
        $this->view('Users/complaint/v_contact_us', $data);
    }

    public function add_complaint(){

        

        // redirect('complaint/complaint');
        if($_SERVER['REQUEST_METHOD']=='POST'){
            //form is submitted

            //save the post
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $userid = $_SESSION['user_id'];

            $data = [
                'email' => trim($_POST['email']),
                'type' => trim($_POST['type']),
                'subject' => trim($_POST['subject']),
                'discription' => trim($_POST['discription']),
                'created_by' => $userid,
                'complaint_submit_message' => ''

            ];

            if ($this->complaint_model->add_complaint($data)) {
                $_SESSION['alert_message'] = 'Your complaint has been successfully added!';
                redirect('complaint/display_all_complaint');
            }
            else{
                $_SESSION['alert_message'] = 'Your complaint fail to add!';
                redirect('complaint/display_all_complaint');
            }    
        }

        else{
            redirect('complaint/contact_us');
        }
    }



    public function display_all_complaint(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING); 
            if(isset($_POST['search_text'])){
                $search_cont = trim($_POST['search_text']);
                $complaint = $this->complaint_model->search_bar($search_cont);
                if(empty($search_cont)){
                    $search_cont = 'search by key-word';
                }
                if(!empty($complaint)){
                    $data = [
                        'complaint' => $complaint,
                        'search_text' => $search_cont,
                        'search_result_message'=>''
                    ];
                    $this->view('Users/complaint/v_complaint', $data);
                }
                else{
                    $data = [
                        'search_result_message'=>'match not found...',
                        'search_text' =>$search_cont 
                    ];
                    $this->view('Users/complaint/v_complaint', $data);
                }    
            }
            else{   
                $complaint = $this->complaint_model->display_all_complaint(); //data object array
                $data=[
                    'complaint' => $complaint,
                    'search_text' => 'Search by key-word',
                    'search_result_message'=>''
                ];
                $this->view('Users/complaint/v_complaint', $data);
            }
        }
        else{
            $complaint = $this->complaint_model->display_all_complaint(); //data object array
            $data=[
                'complaint' => $complaint,
                'search_text' => 'Search by key-word',
                'search_result_message'=>''
            ];
            $this->view('Users/complaint/v_complaint', $data);
        }
            
    }


    public function delete_complaint(){
        if($_SERVER['REQUEST_METHOD']=='POST'){
            $complaint_id = trim($_POST['deletepost']);
            $this->complaint_model->delete_complaint($complaint_id);
        }
        redirect('complaint/display_all_complaint');
    }

    public function update_complaint(){
        if($_SERVER['REQUEST_METHOD']=='POST'){
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $data = [
                'email' => trim($_POST['email']),
                'type' => trim($_POST['type']),
                'subject' => trim($_POST['subject']),
                'discription'  => $_POST['discription'],
                'complaint_id' =>$_POST['updatecomplaint']
            ];
            if($this->complaint_model->update_complaint($data)){
                $_SESSION['alert_message'] = 'Your complaint has been successfully updated!';
            }
            else{
                $_SESSION['alert_message'] = 'Your complaint updated has been failed!';
            }
        }
        redirect('complaint/display_all_complaint');
    }
    
    
}


?>
