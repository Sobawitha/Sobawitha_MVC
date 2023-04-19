<?php
    class M_Admin_complaints_management{
    private $db;

    public function __construct(){
        $this->db = new Database();
    }

//     public function getCompDetails(){
//         if(isset($_POST['comp_type']) && !empty($_POST['comp_type'])){
//             if ($_POST['comp_type'] == 'pending_comp'){            
//                 $this->db->query('SELECT *  FROM complaint  WHERE current_status = 0 ');
            
//                 $result=$this->db->resultSet();
//                 return $result;
//             }
//             if ($_POST['comp_type'] == 'solved'){
//                 $this->db->query('SELECT *  FROM complaint  WHERE current_status = 1');
             
//                 $result=$this->db->resultSet();
//                 return $result;
//             }
//         }else{
//                 $this->db->query('SELECT *  FROM complaint  WHERE current_status = 0 ');

//                 $result=$this->db->resultSet();
//                  return $result;
//             }
      
    
// }

    // Pagination Applied
    // public function getCompDetails($comp_type, $limit=3, $offset=0){
    //     if(isset($comp_type) && !empty($comp_type)){
    //         if ($comp_type == 'pending_comp'){            
    //             $this->db->query("SELECT *  FROM complaint  WHERE current_status = 0 LIMIT $limit OFFSET $offset");
    //             $result=$this->db->resultSet();
    //             return $result;
    //         }
    //         if ($comp_type == 'solved'){
    //             $this->db->query("SELECT *  FROM complaint  WHERE current_status = 1 LIMIT $limit OFFSET $offset");
    //             $result=$this->db->resultSet();
    //             return $result;
    //         }
    //     } else {
    //         $this->db->query("SELECT *  FROM complaint  WHERE current_status = 0 LIMIT $limit OFFSET $offset");
    //         $result=$this->db->resultSet();
    //         return $result;
    //     }
    // }
    

      // Pagination Applied Well
      public function getCompDetails($comp_type, $limit, $offset){
        if(isset($comp_type) && !empty($comp_type)){
            if ($comp_type == 'pending_comp'){
                // Get total row count for pending complaints
                $this->db->query("SELECT COUNT(*) as total_rows FROM complaint  WHERE current_status = 0");
                $row_count = $this->db->single()->total_rows;
                
                // Get limited rows for pending complaints
                $this->db->query("SELECT *  FROM complaint  WHERE current_status = 0 LIMIT $limit OFFSET $offset");
                $result=$this->db->resultSet();
                return array('rows' => $result, 'row_count' => $row_count);
            }
            if ($comp_type == 'solved'){
                // Get total row count for solved complaints
                $this->db->query("SELECT COUNT(*) as total_rows FROM complaint  WHERE current_status = 1");
                $row_count = $this->db->single()->total_rows;
                
                // Get limited rows for solved complaints
                $this->db->query("SELECT *  FROM complaint  WHERE current_status = 1 LIMIT $limit OFFSET $offset");
                $result=$this->db->resultSet();
                return array('rows' => $result, 'row_count' => $row_count);
            }
        } else {
            // Get total row count for all complaints
            $this->db->query("SELECT COUNT(*) as total_rows FROM complaint  WHERE current_status = 0");
            $row_count = $this->db->single()->total_rows;
            
            // Get limited rows for all complaints
            $this->db->query("SELECT *  FROM complaint  WHERE current_status = 0 LIMIT $limit OFFSET $offset");
            $result=$this->db->resultSet();
            return array('rows' => $result, 'row_count' => $row_count);
        }
    }
     

    public function getSearchComplaints($search)
    {

    $this->db->query("SELECT COUNT(*) as total_rows FROM complaint  WHERE type LIKE '%$search%' ");
    $row_count = $this->db->single()->total_rows;    
    
    $this->db->query("SELECT * FROM complaint WHERE type LIKE '%$search%' ");
    $result=$this->db->resultSet();
    return array('rows' => $result, 'row_count' => $row_count);   
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

    public function solveComplaint($comp_id)
    {
        $this->db->query('UPDATE complaint set current_status=1, solved_by= :admin WHERE complaint_id = :id');
        $this->db->bind(':id',$comp_id);
        $this->db->bind(':admin',$_SESSION['user_id']);
  
        if($this->db->execute()){
           return true;
        }else{
            return false;
        }    
    } 

    public function getTotalCompDetails(){
        $this->db->query('SELECT count(*) as total_records FROM complaint');
        $result=$this->db->single();
        return $result->total_records;
    }

}