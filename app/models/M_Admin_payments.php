<?php
    class M_Admin_payments{
    private $db;

    public function __construct(){
        $this->db = new Database();
    }

    public function getPaymentDetails($payment_type, $limit, $offset){
        if(isset($payment_type) && !empty($payment_type)){
            if ($payment_type == 'all'){  
                
                $this->db->query("SELECT COUNT(*) as total_rows FROM payments");
                $row_count = $this->db->single()->total_rows;
                
                
                $this->db->query("SELECT payments.*, user.first_name AS payer_first, user.last_name AS payer_last FROM payments JOIN user ON payments.payer_id = user.user_id LIMIT $limit OFFSET $offset");
                $result=$this->db->resultSet();
                return array('rows' => $result, 'row_count' => $row_count);
           
            }

            if ($payment_type == 'credit_card'){  
                $this->db->query("SELECT COUNT(*) as total_rows FROM payments WHERE LOWER(payments.type) = 'credit'");
                $row_count = $this->db->single()->total_rows;
                
                

                $this->db->query("SELECT payments.*, user.first_name AS payer_first, user.last_name AS payer_last FROM payments JOIN user ON payments.payer_id = user.user_id WHERE LOWER(payments.type) = 'credit' LIMIT $limit OFFSET $offset");
                $result=$this->db->resultSet();
                return array('rows' => $result, 'row_count' => $row_count);
           
            }

           
            

            if ($payment_type == 'debit_card'){  
                $this->db->query("SELECT COUNT(*) as total_rows FROM payments WHERE LOWER(payments.type) = 'debit'");
                $row_count = $this->db->single()->total_rows;
                
                

                $this->db->query("SELECT payments.*, user.first_name AS payer_first, user.last_name AS payer_last FROM payments JOIN user ON payments.payer_id = user.user_id WHERE LOWER(payments.type) = 'debit' LIMIT $limit OFFSET $offset");
                $result=$this->db->resultSet();
                return array('rows' => $result, 'row_count' => $row_count);
           
            }

            if ($payment_type == 'cod'){  
                $this->db->query("SELECT COUNT(*) as total_rows FROM payments WHERE LOWER(payments.type) = 'cod'");
                $row_count = $this->db->single()->total_rows;
                
                

                $this->db->query("SELECT payments.*, user.first_name AS payer_first, user.last_name AS payer_last FROM payments JOIN user ON payments.payer_id = user.user_id WHERE LOWER(payments.type) = 'cod' LIMIT $limit OFFSET $offset");
                $result=$this->db->resultSet();
                return array('rows' => $result, 'row_count' => $row_count);
           
            }

           
           
            }else{
                $this->db->query("SELECT COUNT(*) as total_rows FROM payments");
                $row_count = $this->db->single()->total_rows;
                
                
                $this->db->query("SELECT payments.*, user.first_name AS payer_first, user.last_name AS payer_last FROM payments JOIN user ON payments.payer_id = user.user_id LIMIT $limit OFFSET $offset");
                $result=$this->db->resultSet();
                return array('rows' => $result, 'row_count' => $row_count);
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

    public function getPaymentDetailsForDoc(){
      $this->db->query('SELECT payments.*, user.first_name AS payer_first, user.last_name AS payer_last FROM payments JOIN user ON payments.payer_id = user.user_id');
                $result=$this->db->resultSet();
                return $result;
     }
        

    
                
    
}