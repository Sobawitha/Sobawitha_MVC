<?php

class dashboard extends Controller{

    public function __construct(){
        $this->dashboard_model = $this->model('M_dashboard');
    }

    public function dashboard(){
        if($_SESSION['user_flag'] == 1){
            redirect('dashboard/Admin_dashboard');
        }
        else if($_SESSION['user_flag'] == 2){
            redirect('dashboard/seller_dashboard');
        }
        else if($_SESSION['user_flag'] == 3){
            redirect('dashboard/buyer_dashboard');
        }
        else if($_SESSION['user_flag'] == 4){
            redirect('dashboard/supplier_dashboard');
        }
        else if($_SESSION['user_flag'] == 5){
            redirect('dashboard/officer_dashboard');
        }
        
    }

    // officer-dashboard
    public function officer_dashboard(){
        $no_of_blogpost = $this->dashboard_model->get_no_of_blogposts($_SESSION['user_id']);
        $no_of_post_category = $this-> dashboard_model->get_no_of_category();
        $no_of_forumpost = $this->dashboard_model->get_no_of_forumtopics($_SESSION['user_id']);
        $no_of_complaints = $this->dashboard_model->get_no_of_complaints($_SESSION['user_id']);
        $forum_post_detail= $this->dashboard_model->get_all_forum_posts($_SESSION['user_id']);
        
        
        $data = [
            'no_of_blogposts' => $no_of_blogpost->num_posts,
            'no_of_forumposts' => $no_of_forumpost->num_forum_topics,
            'no_of_complaints' => $no_of_complaints->num_complaint,
            'no_of_category' => $no_of_post_category-> num_category,
            'forum_post_detail' => $forum_post_detail
        ];
        $this->view('Agri_officer/Dashboard/v_officer_dashboard', $data);
    }


    public function category_donut_chart(){
        $post_category_detail = $this->dashboard_model->get_category_detail();
        echo json_encode($post_category_detail);
    }

    

    public function supplier_dashboard(){
        $data = [];
        $this->view('Raw_material_supplier/Dashboard/v_supplier_dashboard', $data);
    }

    public function buyer_dashboard(){
        $data = [];
        $this->view('Buyer/Dashboard/v_buyer_dashboard', $data);
    }

    public function seller_dashboard(){
        $data = [];
        $this->view('Seller/Dashboard/v_seller_dashboard', $data);
    }
}

?>