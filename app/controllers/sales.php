<?php

class sales extends Controller {
    public function __construct(){
        $this-> sales_model =$this->model('M_sales');
    }

    public function sales_list(){
        $data = [
        ];

        $this->view('Raw_material_supplier/Supplier_sales/v_view_sales',$data);
    }

}

?>