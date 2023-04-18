<?php
    class M_Admin_payments{
    private $db;

    public function __construct(){
        $this->db = new Database();
    }

    public function getPaymentDetails(){
        if(isset($_POST['payment_type']) && !empty($_POST['payment_type'])){
            if ($_POST['payment_type'] == 'all'){  
                $this->db->query('SELECT payments.*, user.first_name AS payer_first, user.last_name AS payer_last FROM payments JOIN user ON payments.payer_id = user.user_id');
     
                $result=$this->db->resultSet();
                 return $result;
           
            }

            if ($_POST['payment_type'] == 'credit_card'){  
                $this->db->query('SELECT payments.*, user.first_name AS payer_first, user.last_name AS payer_last FROM payments JOIN user ON payments.payer_id = user.user_id WHERE LOWER(payments.type) = "credit"');
     
                $result=$this->db->resultSet();
                 return $result;
           
            }

            if ($_POST['payment_type'] == 'debit_card'){  
                $this->db->query('SELECT payments.*, user.first_name AS payer_first, user.last_name AS payer_last FROM payments JOIN user ON payments.payer_id = user.user_id WHERE LOWER(payments.type) = "debit"');
     
                $result=$this->db->resultSet();
                 return $result;
           
            }

            if ($_POST['payment_type'] == 'cod'){  
                $this->db->query('SELECT payments.*, user.first_name AS payer_first, user.last_name AS payer_last FROM payments JOIN user ON payments.payer_id = user.user_id WHERE LOWER(payments.type) = "cod"');
     
                $result=$this->db->resultSet();
                 return $result;
           
            }

           
           
            }else{
                $this->db->query('SELECT payments.*, user.first_name AS payer_first, user.last_name AS payer_last FROM payments JOIN user ON payments.payer_id = user.user_id');
     
                $result=$this->db->resultSet();
                 return $result;
            }
                
    }

    public function searchPayments($search)
    {
    $this->db->query("SELECT payments.*, user.first_name AS payer_first, user.last_name AS payer_last 
    FROM payments 
    JOIN user ON payments.payer_id = user.user_id 
    WHERE user.first_name LIKE '%$search%' OR user.last_name LIKE '%$search%'");
    $result=$this->db->resultSet();
    return $result;    
    } 
}