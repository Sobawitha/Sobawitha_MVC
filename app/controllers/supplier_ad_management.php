<?php
    class supplier_ad_management extends Controller{
        public function __construct(){
            $this->supplier_ad = $this->model('M_supplier_advertisment');
    }

    public function add_advertisment(){
        $data=[];
        $this->view('Raw_material_supplier/supplier_ad_management/supplier_add_advertisment',$data);
    }

    public function view_advertisment(){
        $data=[];
        $this->view('Raw_material_supplier/supplier_ad_management/supplier_add_management',$data);
    }
}
?>