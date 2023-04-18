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

    public function getSearchComplaints($search)
    {
    $this->db->query("SELECT * FROM complaint WHERE type LIKE '%$search%' ");
    $result=$this->db->resultSet();
    return $result;    
    } 
    
    public function getComplaintDetails($comp_id)
    {
      $this->db->query("SELECT c.*, CONCAT(c.user_first_name, ' ', c.user_last_name) as full_name FROM complaint c WHERE c.complaint_id = :id");
      $this->db->bind(':id',$comp_id);  


      $row= $this->db->single();

      if($this->db->rowCount() >0){
            return $row;
      }else{
            return false;
      }
    } 

}