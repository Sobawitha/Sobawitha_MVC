<?php
    class M_AgriOfficer{
    private $db;

        public function __construct(){
            $this->db = new Database();
        }

    public function findUserByID($id)
        {
        $this->db->query('SELECT * FROM user WHERE user_id= :id');
        $this->db->bind(':id',$id);  

        $row= $this->db->single();

        if($this->db->rowCount() >0){
                return $row;
        }else{
                return false;
        }
        }
        

    } 
?>