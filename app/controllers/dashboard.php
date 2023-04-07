<?php

class dashboard extends Controller{

    public function __construct(){
        $this->dashboard_model = $this->model('M_dashboard');
    }

    // officer-dashboard
    public function officer_dashboard(){
        $no_of_blogpost = $this->dashboard_model->get_no_of_blogposts($_SESSION['user_id']);
        $no_of_forumpost = $this->dashboard_model->get_no_of_forumtopics($_SESSION['user_id']);
        $no_of_complaints = $this->dashboard_model->get_no_of_complaints($_SESSION['user_id']);
        // $months_for_blogposts = $this->dashboard_model -> get_no_of_blogposts_per_month($_SESSION['user_id']);

        // $months = array();
        // $no_of_posts = array();
        // foreach($months_for_blogposts as $result){
        //     $months[]= $result['months']; 
        //     $no_of_posts[] = $result['no_of_posts']  ;   
        // }
        
        $data = [
            'no_of_blogposts' => $no_of_blogpost->num_posts,
            'no_of_forumposts' => $no_of_forumpost->num_forum_topics,
            'no_of_complaints' => $no_of_complaints->num_complaint,
            // 'months_for_blogposts' => $months_for_blogposts,
            // // 'chart_data' => $data1,
            // 'chart_data' =>  array(
            //     'labels' => array('Jan', 'Feb', 'Mar', 'April', 'May', 'June', 'July', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'),
            //     //'values' => $no_of_posts,
                
            //     // 'values' => array(21, 42, 26, 4,11, 22, 50, 40,21, 30, 18, 40)
                
            // ),
        ];
        $this->view('Agri_officer/Dashboard/v_officer_dashboard', $data);
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