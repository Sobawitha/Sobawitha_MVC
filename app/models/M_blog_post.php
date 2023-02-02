<?php

class M_blog_post
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function create_posts($data)
    {
    
                $this->db->query('INSERT into blogpost (title, tag, discription,image,created,officer_id,no_of_likes) VALUES ( :title, :tag ,:discription,:image,:now , :officer_id ,:no_of_likes)');
                $this->db->bind(":title", $data['title']);
                $this->db->bind(":tag", $data['tag']);
                $this->db->bind(":discription", $data['discription']);
                $this->db->bind(":image", $data['image']);
                $this->db->bind(":now",date('Y-m-d') );
                $this->db->bind(":officer_id", $data['officer_id']);
                $this->db->bind(":no_of_likes", $data['no_of_likes']);
            
                //execute the query
                if($this->db->execute()){
                    return true;
                }
                else{
                    return false;
                }
            
    }

    public function display_all_posts(){
        $this->db->query('SELECT * FROM blogpost WHERE officer_id=:userid');
        $this->db->bind(':userid', $_SESSION['user_id']);
        return $this->db->resultSet();
    }

    public function search_bar($search_cont){
        $this->db->query('SELECT * from blogpost where (upper(title) like upper(concat("%", :search_content , "%")))');
        $this->db->bind(":search_content", $search_cont);
        return $this->db->resultset();
    }
}


?>