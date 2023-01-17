<?php

class resources extends Controller
{
    public function __construct()
    {
        $this->resources_model = $this->model('M_resources');
    }

    public function resource_page(){
        $resources = $this->resources_model->display_all_resources(); //data object array
        $data = [
            'resources' => $resources
        ];

        $this->view('inc/resources/v_resources',$data);
        
    }
}


?>
