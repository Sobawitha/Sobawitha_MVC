<?php

class sales extends Controller {
    public function __construct(){
        $this-> sales_model =$this->model('M_sales');
    }

    public function sales_list(){
        $data = [
        ];

        $this->view('raw_material_supplier/v_view_sales',$data);
    }

}

?>