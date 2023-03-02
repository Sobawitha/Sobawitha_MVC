<?php
    class M_Admin_complaints_management{
    private $db;

    public function __construct(){
        $this->db = new Database();
    }

    public function getCompDetails(){
        $this->db->query('SELECT *  FROM complaint ');
     
        $result=$this->db->resultSet();
         return $result;
    }
}