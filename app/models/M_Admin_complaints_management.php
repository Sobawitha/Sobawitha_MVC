<?php
    class M_Admin_complaints_management{
    private $db;

    public function __construct(){
        $this->db = new Database();
    }

    public function getCompDetails(){
        if(isset($_POST['comp_type']) && !empty($_POST['comp_type'])){
            if ($_POST['comp_type'] == 'pending_comp'){            
                $this->db->query('SELECT *  FROM complaint WHERE current_status = 0');
     
                $result=$this->db->resultSet();
                return $result;
            }
            if ($_POST['comp_type'] == 'solved_comp'){
                $this->db->query('SELECT *  FROM complaint WHERE current_status = 1');
     
                $result=$this->db->resultSet();
                return $result;
            }
        }else{
                $this->db->query('SELECT *  FROM complaint WHERE current_status = 0 ');
     
                $result=$this->db->resultSet();
                 return $result;
            }
      
    
}

}