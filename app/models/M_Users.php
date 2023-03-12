<?php

class M_users
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }
    
    public function findUserPWMatch($id,$password){
        $this->db->query('SELECT password FROM user WHERE user_id=:id');
        $this->db->bind(':id',$id);
        
        $row= $this->db->single();
        $hashed_password =$row->password;
        if(password_verify($password,$hashed_password)){
           return true;
        }else{
          return false;
        }    
    }
    
    public function changePW($data){

       
        $this->db->query('UPDATE user set password = :password WHERE user_id = :id');
        $this->db->bind(':password', $data['password']);
        $this->db->bind(':id', $data['user_id']);
            

        if($this->db->execute()){
           return true;
        }else{
            return false;
        } 
      }

      public function activateUser($user_id)
      {
          $this->db->query('UPDATE user set active_status=1 WHERE user_id = :id');
          $this->db->bind(':id',$user_id);
  
          if($this->db->execute()){
             return true;
          }else{
              return false;
          }    
      } 
      
}


?>