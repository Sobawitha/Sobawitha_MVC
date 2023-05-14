<?php

class M_users
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function get_profile_detail($id){
        $this->db->query('SELECT * FROM user WHERE user_id = :id');
        $this->db->bind (":id", $id);
        return $this->db->resultset();
    }

    public function reg_as_new_sletter($data){
        $this->db->query('INSERT INTO new_sletter (email) VALUES (:email)');
        $this->db->bind(':email', $data['email']);
        if($this->db->execute()){
            return true;
        }
        else{
            return false;
        }
    }

    public function email_exists($data){
        $this->db->query("SELECT count(new_sletter_id) as count_users from new_sletter WHERE email=:email");
        $this->db->bind(':email', $data['email']);
        return $this->db->single();
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
      

      /*for notification */
    public function get_all_notification(){
        $this->db->query("SELECT * FROM notifications ORDER BY time DESC LIMIT 5");
        return $this->db->resultset();
    }
    
    public function get_unseen_notifications(){
        $this->db->query("SELECT * FROM notifications WHERE status=1 ORDER BY time DESC LIMIT 5");
        return $this->db->resultset();
    }

    /*for notifications */
    public function notifications(){
        $this->db->query("SELECT time, message, type, current_status
        FROM (
        SELECT time, message, type, current_status
        FROM notification_based_on_user_role
        WHERE user_role = 6 OR user_role = :user_role AND current_status = 0
        UNION
        SELECT time, message, type, current_status
        FROM notification_based_on_users
        WHERE user = :user_id AND current_status = 0
        ) AS combined_notifications  
        ORDER BY time DESC  LIMIT 3");
        $this->db->bind(":user_id", $_SESSION['user_id']);
        $this->db->bind(":user_role", $_SESSION['user_flag']);
        return $this->db->resultSet();
    }
}


?>