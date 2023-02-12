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

    }




?>