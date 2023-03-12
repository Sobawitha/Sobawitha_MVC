<?php
    class M_Admin_user_management{
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

    // Add Admin

    public function  addAdmin($data)
    {
        $this->db->query('INSERT INTO user(first_name,last_name,email,user_flag,contact_no,nic_no,dob,profile_picture,address_line_one,address_line_two,address_line_three,address_line_four,qualifications,gender,bank_account_no,bank,branch,bank_account_name,password,active_status) VALUES (:first_name,:last_name,:email,:user_flag,:contact_no,:nic,:dob,:propic,:address_line_one,:address_line_two,:address_line_three,:address_line_four,:qualifications,:gender,:bank_account_no,:bank,:branch,:bank_account_name,:password,:active_status)');
        $this->db->bind(':first_name',$data['first_name']);
        $this->db->bind(':last_name', $data['last_name']);
        $this->db->bind(':email', $data['email']);
        $this->db->bind(':user_flag', 1);
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
        $this->db->bind(':bank_account_name', $data['bank_account_name']);
        $this->db->bind(':active_status', 1);
        // $this->db->bind(':account_number',$data['account_number']);
       
        if($this->db->execute()){
            return true;
        }else{
            return false;
        }    
    } 

    // Add Agri

    public function  addAgri($data)
    {
        $this->db->query('INSERT INTO user(first_name,last_name,email,user_flag,contact_no,nic_no,dob,profile_picture,qualifications,address_line_one,address_line_two,address_line_three,address_line_four,gender,bank_account_no,bank,branch,bank_account_name,password ,active_status) VALUES (:first_name,:last_name,:email,:user_flag,:contact_no,:nic,:dob,:propic,:qualifications,:address_line_one,:address_line_two,:address_line_three,:address_line_four,:gender,:bank_account_no,:bank,:branch,:bank_account_name,:password, :active_status)');
        $this->db->bind(':first_name',$data['first_name']);
        $this->db->bind(':last_name', $data['last_name']);
        $this->db->bind(':email', $data['email']);
        $this->db->bind(':user_flag', 5);
        $this->db->bind(':contact_no',$data['contact_number']);
        $this->db->bind(':nic', $data['nic']);
        $this->db->bind(':dob',$data['birthday']);
   //     $this->db->bind(':profile_picture',$data['profile_pic_name']);
        $this->db->bind(':propic',$data['propic_name']);
        $this->db->bind(':qualifications',$data['qualification_file_name']);
        $this->db->bind(':address_line_one', $data['address_line_one']);
        $this->db->bind(':address_line_two', $data['address_line_two']);
        $this->db->bind(':address_line_three', $data['address_line_three']);
        $this->db->bind(':address_line_four', $data['address_line_four']);
        $this->db->bind(':gender', $data['gender']);
        $this->db->bind(':bank_account_no','');
        $this->db->bind(':bank','');
        $this->db->bind(':password',$data['password']);
        $this->db->bind(':branch','');
        $this->db->bind(':bank_account_name','');
        $this->db->bind(':active_status', 1);

       
        if($this->db->execute()){
            return true;
        }else{
            return false;
        }
        
        
    } 

    //Users

    public function getUsers()
    {
      $this->db->query('SELECT *  FROM user ');
     
      $result=$this->db->resultSet();
       return $result;
    } 

    public function getAdmins()
    {
      $this->db->query('SELECT *  FROM user WHERE user_flag=1');
     
      $result=$this->db->resultSet();
       return $result;
    } 

    public function getCustomers()
    {
      $this->db->query('SELECT *  FROM user WHERE user_flag=2');
     
      $result=$this->db->resultSet();
       return $result;
    } 

    public function getSellers()
    {
      $this->db->query('SELECT *  FROM user WHERE user_flag=3');
     
      $result=$this->db->resultSet();
       return $result;
    } 

    public function getSuppliers()
    {
      $this->db->query('SELECT *  FROM user WHERE user_flag=4');
     
      $result=$this->db->resultSet();
       return $result;
    } 

    public function getAgri()
    {
      $this->db->query('SELECT *  FROM user WHERE user_flag=5');
     
      $result=$this->db->resultSet();
       return $result;
    } 

    public function getSearchUsers($search)
    {
      $this->db->query("SELECT * FROM user WHERE CONCAT(first_name,last_name,email,nic_no,address_line_one,address_line_two,address_line_three,address_line_four) LIKE '%$search%' ");
      $result=$this->db->resultSet();
      return $result;    
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

    public function getUserDetails($user_id)
    {
      $this->db->query('SELECT * FROM user WHERE user_id =:id');
      $this->db->bind(':id',$user_id);  


      $row= $this->db->single();

      if($this->db->rowCount() >0){
            return $row;
      }else{
            return false;
      }
    } 

    public function findSameNic($nic)
    {
      $this->db->query('SELECT * FROM user WHERE nic_no= :nic');
      $this->db->bind(':nic',$nic);  

      $row= $this->db->single();

      if($this->db->rowCount() >0){
            return true;
      }else{
            return false;
      }
    }

    public function display_all_users(){
      if(isset($_POST['user_type']) && !empty($_POST['user_type'])){
          if ($_POST['user_type'] == 'all'){            
              $this->db->query('SELECT * FROM user');
              return $this->db->resultSet(); 
          }
          if ($_POST['user_type'] == 'admins'){
              $this->db->query('SELECT * FROM user WHERE user_flag=1');
              return $this->db->resultSet(); 
          }
          if ($_POST['user_type'] == 'customers'){
              $this->db->query('SELECT * FROM user WHERE user_flag=2');
              return $this->db->resultSet(); 
          }

          if ($_POST['user_type'] == 'sellers'){
            $this->db->query('SELECT * FROM user WHERE user_flag=3');
            return $this->db->resultSet(); 
        }
        if ($_POST['user_type'] == 'suppliers'){
          $this->db->query('SELECT * FROM user WHERE user_flag=4');
          return $this->db->resultSet(); 
        }
        if ($_POST['user_type'] == 'agris'){
        $this->db->query('SELECT * FROM user WHERE user_flag=5');
        return $this->db->resultSet(); 
        }
      }

      else{
          $this->db->query('SELECT * FROM user');
          return $this->db->resultSet(); 
      }
                
  }
    

}