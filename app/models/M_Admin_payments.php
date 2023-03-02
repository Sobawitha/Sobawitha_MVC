<?php
    class M_Admin_payments{
    private $db;

    public function __construct(){
        $this->db = new Database();
    }

    public function getPaymentDetails(){
        $this->db->query('SELECT payments.*, user.first_name AS payer_first, user.last_name AS payer_last FROM payments JOIN user ON payments.payer_id = user.user_id');
     
        $result=$this->db->resultSet();
         return $result;
    }
}