<?php

class M_complaint
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function add_complaint($data)
    {


                echo $data['email'];
                echo $data['type'];
                echo $data['subject'];
                echo $data['discription'];
                echo date('Y-m-d');
                echo $data['created_by'];

                $this->db->query('INSERT into complaint (email, type, subject,discription, date, created_by) VALUES ( :email, :type, :subject, :discription, :created, :created_by)');
                
                $this->db->bind(":email", $data['email']);
                $this->db->bind(":type", $data['type']);
                $this->db->bind(":subject", $data['subject']);
                $this->db->bind(":discription", $data['discription']);
                $this->db->bind(":created", date('Y-m-d') );
                $this->db->bind(":created_by", $data['created_by']);
            
                //execute the query
                if($this->db->execute()){
                    return true;
                }
                else{
                    return false;
                }
            
    }

    public function display_all_complaint(){
        $this->db->query('SELECT * FROM complaint WHERE created_by=:userid');
        $this->db->bind(':userid', $_SESSION['user_id']);
        return $this->db->resultSet();
    }

    public function search_bar($search_cont){
        $this->db->query('SELECT * from complaint where (upper(subject) like upper(concat("%", :search_content , "%"))) or (upper(type) like upper(concat("%", :search_content , "%")))');
        $this->db->bind(":search_content", $search_cont);
        return $this->db->resultset();
    }

}


?>