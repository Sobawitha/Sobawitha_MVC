<?php
    class M_Admin{
    private $db;

    public function __construct(){
        $this->db = new Database();
    }

    //find user
    public function findUserByusername($username){
        $this->db->query("SELECT * FROM admin WHERE Admin_email = :username");
        $this->db->bind(':username', $username);

        $row = $this->db->single();

        if($this->db->rowCount()>0){
            return true;
        }
        else{
            return false;
        }
    }

    //login the user
    public function login($username, $password)
    {
        $this->db->query('SELECT * FROM admin WHERE Admin_email = :username');
        $this->db->bind(':username', $username);

        $row = $this->db->single();

        $hashed_password = $row->password;

        // if(password_verify($password,$hashed_password)){
        //     return $row;
        // }
        if ($password == $hashed_password) {
            return $row;
        } 
        else {
            return false;
        }
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

  

    public function deactivateUser($user_id)
    {
        $this->db->query('UPDATE user set active_status=0 WHERE user_id = :id');
        $this->db->bind(':id',$user_id);

        if($this->db->execute()){
           return true;
        }else{
            return false;
        }    
    } 

    public function deleteProPic($user_id,$user_gender)
    {
        if($user_gender=='m'||'M'){
            $this->db->query('UPDATE user set profile_picture="Men_Default_Avatar.png" WHERE user_id = :id');
            $this->db->bind(':id',$user_id);
            $_SESSION['profile_image']="Men_Default_Avatar.png";
            $_SESSION['profile_image_path'] = "upload/user_profile_pics/" .  $_SESSION['profile_image'];
        }else{
            $this->db->query('UPDATE user set profile_picture="Women_Default_Avatar.png" WHERE user_id = :id');
            $this->db->bind(':id',$user_id);
            $_SESSION['profile_image']="Women_Default_Avatar.png";
            $_SESSION['profile_image_path'] = "upload/user_profile_pics/" .  $_SESSION['profile_image'];
        }
       

        if($this->db->execute()){
           return true;
          
        }else{
            return false;
        }    
    } 

    public function updateProPic($data)
    {

         $this->db->query('UPDATE user set profile_picture = :propic WHERE user_id = :id');
         $this->db->bind(':id',$data['user_id']);
         $this->db->bind(':propic',$data['propic_name']);

        if($this->db->execute()){
            $_SESSION['profile_image']=$data['propic_name'];
            $_SESSION['profile_image_path'] = "upload/user_profile_pics/" .  $_SESSION['profile_image'];
           return true;
        }else{
            return false;
        }    
    } 

    public function updateAdmin($data){
        $this->db->query('UPDATE user set first_name=:first_name, last_name = :last_name, address_line_one =:address_line_one, address_line_two =:address_line_two, address_line_three =:address_line_three, address_line_four =:address_line_four,  nic_no = :nic, contact_no=:contact_number, bank = :bank_name, bank_account_name = :account_holder_name, branch=:branch, bank_account_no = :account_number, dob =:dob  WHERE user_id = :id');
        $this->db->bind(':id', $data['user_id']);
        $this->db->bind(':first_name', $data['first_name']);
        $this->db->bind(':last_name',$data['last_name']);
        $this->db->bind(':address_line_one',$data['address_line_one']);
        $this->db->bind(':address_line_two',$data['address_line_two']);
        $this->db->bind(':address_line_three',$data['address_line_three']);
        $this->db->bind(':address_line_four',$data['address_line_four']);
        $this->db->bind(':nic', $data['nic']);
        $this->db->bind(':contact_number', $data['contact_number']);
        $this->db->bind(':bank_name', $data['bank']);
        $this->db->bind(':account_holder_name', $data['bank_account_name']);
        $this->db->bind(':branch', $data['branch']);
        $this->db->bind(':account_number', $data['bank_account_no']);
        $this->db->bind(':dob', $data['birthday']);

       

        if($this->db->execute()){
          $_SESSION['username']=$data['first_name'];
          $_SESSION['lastname']=$data['last_name'];
            return true;
        }else{
            return false;
        } 
      }
      


}

?>