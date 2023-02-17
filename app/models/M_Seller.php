<?php
    class M_Seller{
    private $db;

        public function __construct(){
            $this->db = new Database();
        }

        //Find user by email
    public function findUserByEmail($email)
    {
      $this->db->query('SELECT * FROM user WHERE email= :email');
      $this->db->bind(':email',$email);  

      $row= $this->db->single();

      if($this->db->rowCount() >0){
            return true;
      }else{
            return false;
      }
    }

    // Add Seller

    public function  addSeller($data)
    {
        $this->db->query('INSERT INTO user(first_name,last_name,email,user_flag,contact_no,nic_no,dob,profile_picture,address_line_one,address_line_two,address_line_three,address_line_four,qualifications,gender,bank_account_no,bank,branch,bank_account_name,password) VALUES (:first_name,:last_name,:email,:user_flag,:contact_no,:nic,:dob,:propic,:address_line_one,:address_line_two,:address_line_three,:address_line_four,:qualifications,:gender,:bank_account_no,:bank,:branch,:bank_account_name,:password)');
        $this->db->bind(':first_name',$data['first_name']);
        $this->db->bind(':last_name', $data['last_name']);
        $this->db->bind(':email', $data['email']);
        $this->db->bind(':user_flag', 3);
        $this->db->bind(':contact_no',$data['contact_number']);
        $this->db->bind(':nic', $data['nic']);
        $this->db->bind(':dob',$data['birthday']);
   //     $this->db->bind(':profile_picture',$data['profile_pic_name']);
        $this->db->bind(':propic',$data['propic_name']);
     
        $this->db->bind(':address_line_one', $data['address_line_one']);
        $this->db->bind(':address_line_two', $data['address_line_two']);
        $this->db->bind(':address_line_three', $data['address_line_three']);
        $this->db->bind(':address_line_four', $data['address_line_four']);
        $this->db->bind(':qualifications','');
        $this->db->bind(':gender', $data['gender']);
        $this->db->bind(':bank_account_no', $data['bank_account_no']);
        $this->db->bind(':bank', $data['bank']);
        $this->db->bind(':password',$data['password']);
        $this->db->bind(':branch', $data['branch']);
        $this->db->bind(':bank_account_name',$data['bank_account_name']);
       
        if($this->db->execute()){
            return true;
        }else{
            return false;
        }    
    } 
    

 } 
?>