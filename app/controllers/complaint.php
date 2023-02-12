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
                redirect('complaint/display_all_complaint');
            }

            
        }

        else{
            redirect('complaint/contact_us');
        }
    }

    public function display_all_complaint(){

        unset($_SESSION['search_cont']);
        $_SESSION['search_cont'] = "Search by key-word";


        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $search_cont = trim($_POST['search_text']);
            $search_complaint = $this->complaint_model->search_bar($search_cont);
            $complaint = $this->complaint_model->display_all_complaint(); //data object array

            if($search_cont == ''){
                $data = [
                    'complaint' => $complaint,
                ];    
            }
            else{

                $_SESSION['search_cont'] = $search_cont;
                $data = [
                    'complaint' => $search_complaint
                ];
            }

            $this->view('Users/complaint/v_complaint', $data);
        }
        else{
            $complaint = $this->complaint_model->display_all_complaint(); //data object array
            $data = [
                'complaint' => $complaint,
            ];
            $this->view('Users/complaint/v_complaint', $data);
        }
    
    }
    
    
}


?>
