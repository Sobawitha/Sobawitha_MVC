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


                $this->db->query('INSERT into complaint (email, type, subject,discription, date, created_by, user_first_name, user_last_name) VALUES ( :email, :type, :subject, :discription, :created, :created_by, :first_name, :last_name)');
                // echo $data['email'];
                // echo $data['type'];
                // echo $data['subject'];
                // echo $data['discription'];
                // echo date('Y-m-d');
                // echo $data['created_by'];

                
                $this->db->bind(":email", $data['email']);
                $this->db->bind(":type", $data['type']);
                $this->db->bind(":subject", $data['subject']);
                $this->db->bind(":discription", $data['discription']);
                $this->db->bind(":created", date('Y-m-d') );
                $this->db->bind(":created_by", $data['created_by']);
                $this->db->bind(":first_name", $_SESSION['username']);
                $this->db->bind(":last_name", $_SESSION['lastname']);
            
                //execute the query
                if($this->db->execute()){
                    return true;
                }
                else{
                    return false;
                }
            
    }

    public function display_all_complaint(){
        if(isset($_POST['search_text']) && !empty($_POST['search_text']) ){
            if(isset($_POST['complaint_type']) && !empty($_POST['complaint_type'])){
                if ($_POST['complaint_type'] == 'all'){            
                    $this->db->query('SELECT * FROM view_complaint_reply WHERE ((upper(subject) like upper(concat("%", :search_content , "%"))) or (upper(type) like upper(concat("%", :search_content , "%")))) AND created_by=:userid ORDER BY date');
                    $this->db->bind(':userid', $_SESSION['user_id']);
                    $this->db->bind(":search_content", ($_POST['search_text']));
                    return $this->db->resultSet(); 
                }
                if ($_POST['complaint_type'] == 'completed'){
                    $this->db->query('SELECT * FROM view_complaint_reply WHERE ((upper(subject) like upper(concat("%", :search_content , "%"))) or (upper(type) like upper(concat("%", :search_content , "%")))) AND created_by=:userid AND current_status = 2 ORDER BY date');
                    $this->db->bind(':userid', $_SESSION['user_id']);
                    $this->db->bind(":search_content", ($_POST['search_text']));
                    return $this->db->resultSet(); 
                }
                if ($_POST['complaint_type'] == 'pending'){
                    $this->db->query('SELECT * FROM view_complaint_reply WHERE ((upper(subject) like upper(concat("%", :search_content , "%"))) or (upper(type) like upper(concat("%", :search_content , "%")))) AND created_by=:userid AND current_status = 1 ORDER BY date');
                    $this->db->bind(':userid', $_SESSION['user_id']);
                    $this->db->bind(":search_content", ($_POST['search_text']));
                    return $this->db->resultSet(); 
                }
            }
            else{
                $this->db->query('SELECT * FROM view_complaint_reply WHERE ((upper(subject) like upper(concat("%", :search_content , "%"))) or (upper(type) like upper(concat("%", :search_content , "%")))) AND created_by=:userid ORDER BY date');
                $this->db->bind(':userid', $_SESSION['user_id']);
                $this->db->bind(":search_content", ($_POST['search_text']));
                return $this->db->resultSet(); 
            }
        }
        else if(!isset($_POST['search_text']) && (isset($_POST['complaint_type']) && !empty($_POST['complaint_type']))){
            if ($_POST['complaint_type'] == 'all'){            
                $this->db->query('SELECT * FROM view_complaint_reply WHERE created_by=:userid ORDER BY date');
                $this->db->bind(':userid', $_SESSION['user_id']);
                return $this->db->resultSet(); 
            }
            if ($_POST['complaint_type'] == 'completed'){
                $this->db->query('SELECT * FROM view_complaint_reply WHERE current_status = 2 ORDER BY date');
                $this->db->bind(':userid', $_SESSION['user_id']);
                return $this->db->resultSet(); 
            }
            if ($_POST['complaint_type'] == 'pending'){
                $this->db->query('SELECT * FROM view_complaint_reply WHERE created_by=:userid AND current_status = 1 ORDER BY date');
                $this->db->bind(':userid', $_SESSION['user_id']);
                return $this->db->resultSet(); 
            }
        }
        else{
            $this->db->query('SELECT * FROM view_complaint_reply WHERE created_by=:userid ORDER BY date');
            $this->db->bind(':userid', $_SESSION['user_id']);
            return $this->db->resultSet(); 
        }
                  
    }
    

    public function search_bar($search_cont){
        $this->db->query('SELECT * from view_complaint_reply where ((upper(subject) like upper(concat("%", :search_content , "%"))) or (upper(type) like upper(concat("%", :search_content , "%")))) AND created_by=:userid ORDER BY date');
        $this->db->bind(":search_content", $search_cont);
        $this->db->bind(':userid', $_SESSION['user_id']);
        return $this->db->resultset();
    }

    public function delete_complaint($complaint_id){
        $this->db->query('DELETE FROM complaint WHERE complaint_id=:complaint_id');
        $this->db->bind(':complaint_id', $complaint_id);
        if($this->db->execute()){
            return true;
        }
        else{
            return false;
        }
    }

    public function update_complaint($data){
        $this->db->query('UPDATE complaint SET email=:email, type= :type, subject= :subject, discription= :discription, date= :now where complaint_id = :complaint_id');
        $this->db->bind(":email", $data['email']);
        $this->db->bind(":type", $data['type']);
        $this->db->bind(":subject", $data['subject']);
        $this->db->bind(":discription", $data['discription']);
        $this->db->bind(":now",date('Y-m-d'));
        $this->db->bind(":complaint_id",$data['complaint_id']);
        if($this->db->execute()){
            return true;
        }
        else{
            return false;
        }

    }

    public function find_email($id){
        $this->db->query('SELECT email as user_email from user where user_id=:user_id');
        $this->db->bind(":user_id", $_SESSION['user_id']);
        return $this->db->single();

    }



}


?>