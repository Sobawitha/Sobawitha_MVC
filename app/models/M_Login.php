<?php

    class M_Login{
    private $db;

    public function __construct(){
        $this->db = new Database();
    }


    public function findUserByEmail($email){
        $this->db->query('SELECT * FROM user WHERE email= :email');
        $this->db->bind(':email',$email);

        $row = $this->db->single();

        if($this->db->rowCount() >0) {
            return true;
        }else{
            return false;
        }
    }

    public function checkUserStatus($email){
        $this->db->query('SELECT * FROM user WHERE email= :email');
        $this->db->bind(':email',$email);

        $row = $this->db->single();

        if($row->active_status == 1){
            return true;
        }else{
            return false;
        }
    }

    public function login($email,$password){
        $this->db->query('SELECT * FROM user WHERE email=:email');
        $this->db->bind(':email',$email);
        
        $row= $this->db->single(); 

        $hashed_pw = $row->password;
        if(password_verify($password, $hashed_pw)) {
                return $row;
        }
        else {
                return false;
        }
    }  


    // For the forgot password

    public function checkEmail($email) {
        
        $this->db->query("SELECT * FROM user WHERE email = :email");
        $this->db->bind(':email',$email);
        
        $result=$this->db->single();

        return $result ? $result : false; 
    }

    public function setToken($token,$email)
    {
        $this->db->query('UPDATE user set verify_token=:token WHERE email = :email');
        $this->db->bind(':token',$token);
        $this->db->bind(':email',$email);

        if($this->db->execute()){
           return true;
        }else{
            return false;
        }    
    } 

    public function findUserId($email){
        $this->db->query('SELECT * FROM user WHERE email= :email');
        $this->db->bind(':email',$email);

        $row = $this->db->single();

        if($this->db->rowCount() >0) {
            return $row;
        }else{
            return false;
        }
    }

    public function checkToken($email) {
        
        $this->db->query("SELECT verify_token FROM user WHERE email = :email");
        $this->db->bind(':email',$email);
        
        $result=$this->db->single();

        return $result ? $result : false; 
    }
     
    // ----------------------------------------------------------------
    public function checkOldPwd($email,$pwd) {
        
        $this->db->query("SELECT * FROM user WHERE email = :email");
        $this->db->bind(':email',$email);
        
        $result=$this->db->single();

        $hashed_pw = $result->password;
        if(password_verify($pwd, $hashed_pw)) {
                return true;
        }
        else {
                return false;
        }
    }


}