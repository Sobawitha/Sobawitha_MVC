
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
    
                $this->db->query('INSERT into blogpost (title, tag, discription,created,officer_id,no_of_likes, image) VALUES ( :title, :tag ,:discription,:now , :officer_id ,:no_of_likes,:image)');
                $this->db->bind(":title", $data['title']);
                $this->db->bind(":tag", $data['tag']);
                $this->db->bind(":discription", $data['discription']);
                $this->db->bind(":image", $data['image_name']);
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

        if(isset($_POST['tag']) && !empty($_POST['tag'])){
            if ($_POST['tag'] == 'all'){            
                $this->db->query('SELECT * FROM blogpost WHERE officer_id=:userid');
                $this->db->bind(':userid', $_SESSION['user_id']);
                return $this->db->resultSet();
            }
            if ($_POST['tag'] == 'Innovations'){
                $this->db->query('SELECT * FROM blogpost WHERE officer_id=:userid AND tag="Innovations" ');
                $this->db->bind(':userid', $_SESSION['user_id']);
                return $this->db->resultSet();
            }
            if ($_POST['tag'] == 'Knowledge'){
                $this->db->query('SELECT * FROM blogpost WHERE officer_id=:userid AND tag="Knowledge" ');
                $this->db->bind(':userid', $_SESSION['user_id']);
                return $this->db->resultSet(); 
            }
            if ($_POST['tag'] == 'New_technique'){
                $this->db->query('SELECT * FROM blogpost WHERE officer_id=:userid AND tag="New_technique" ');
                $this->db->bind(':userid', $_SESSION['user_id']);
                return $this->db->resultSet(); 
            }
            if ($_POST['tag'] == 'Production'){
                $this->db->query('SELECT * FROM blogpost WHERE officer_id=:userid AND tag="Production" ');
                $this->db->bind(':userid', $_SESSION['user_id']);
                return $this->db->resultSet(); 
            }
        }

        else{
            $this->db->query('SELECT * FROM blogpost WHERE officer_id=:userid');
            $this->db->bind(':userid', $_SESSION['user_id']);
            return $this->db->resultSet();
        }
    }

    public function search_bar($search_cont){
        $this->db->query('SELECT * from blogpost where (upper(title) like upper(concat("%", :search_content , "%")))');
        $this->db->bind(":search_content", $search_cont);
        return $this->db->resultset();
    }

    public function delete_post($postid){
        $this->db->query('DELETE FROM blogpost WHERE post_id=:postid');
        $this->db->bind(':postid', $postid);
        if($this->db->execute()){
            return true;
        }
        else{
            return false;
        }
    }

    public function update_post($data){

        $this->db->query('UPDATE blogpost SET title = :title, tag = :tag, discription = :discription, image=:image WHERE post_id = :post_id');
        $this->db->bind(":title", $data['title']);
        $this->db->bind(":tag" , $data['tag']);
        $this->db->bind(":discription", $data['discription']);
        $this->db->bind(":image", $data['image_name']);
        $this->db->bind(":post_id", $data['post_id']);
        if($this->db->execute()){
            return true;
        }
        else{
            return false;
        }
    }

    public function select_image_name($postid){
        $this->db->query('SELECT image as update_post_image from blogpost where post_id=:postid');
        $this->db->bind(":postid", $postid);
        return $this->db->single();
    }
}


?>















