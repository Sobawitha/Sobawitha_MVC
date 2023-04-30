<?php
    class M_Admin_dashboard{
    private $db;

    public function __construct(){
        $this->db = new Database();
    }

    public function getTotalSellers()
    {
      $this->db->query('SELECT COUNT(user_id) as total_seller_count FROM user WHERE user_flag="3"');
     
      $row= $this->db->single();

      if($this->db->rowCount() >0){
            return $row;
      }else{
            return false;
      }
    } 

    public function getTotalSuppliers()
    {
      $this->db->query('SELECT COUNT(user_id) as total_supplier_count FROM user WHERE user_flag="4"');
     
      $row= $this->db->single();

      if($this->db->rowCount() >0){
            return $row;
      }else{
            return false;
      }
    } 

    public function getTotalAgrio()
    {
      $this->db->query('SELECT COUNT(user_id) as total_agrio_count FROM user WHERE user_flag="5"');
     
      $row= $this->db->single();

      if($this->db->rowCount() >0){
            return $row;
      }else{
            return false;
      }
    } 

    public function getTotalFertilizerAds()
    {
      $this->db->query('SELECT COUNT(Product_id) as total_fertilizer_adds_count FROM fertilizer WHERE date BETWEEN DATE_SUB(NOW(), INTERVAL 1 MONTH) AND NOW()');
     
      $row= $this->db->single();

      if($this->db->rowCount() >0){
            return $row;
      }else{
            return false;
      }
    } 

    public function getTotalProfit()
    {
      $this->db->query('SELECT SUM(profit) as total_profit FROM payments WHERE date >= DATE_SUB(NOW(), INTERVAL 1 MONTH)');
     
      $row= $this->db->single();

      if($this->db->rowCount() >0){
            return $row;
      }else{
            return false;
      }
    }

    public function getTotalComplaints()
    {
      $this->db->query('SELECT COUNT(complaint_id) as total_complaints FROM complaint WHERE date BETWEEN DATE_SUB(NOW(), INTERVAL 1 MONTH) AND NOW()');
     
      $row= $this->db->single();

      if($this->db->rowCount() >0){
            return $row;
      }else{
            return false;
      }
    }

    public function get_user_detail(){
      $this->db->query("SELECT DISTINCT(user_flag) as user_type, COUNT(*) AS num_users FROM user GROUP BY user_flag");
      return $this->db->resultSet();
  }
  
   //Officer
   public function get_no_of_blogposts($id){
      // $this->db->query("SELECT COUNT(*) AS num_posts FROM blogpost WHERE (created) >= DATE_SUB(NOW(), INTERVAL 1 YEAR) AND officer_id = :id ");
      $this->db->query("SELECT COUNT(*) AS num_posts FROM blogpost WHERE officer_id = :id AND created >= DATE_SUB(NOW(), INTERVAL 1 YEAR);");
      $this->db->bind(":id", $id);
      return $this->db->single();
      
  }

  public function get_no_of_forumtopics($id){
      // $this->db->query("SELECT COUNT(*) AS num_forum_topics FROM forum_posts WHERE (date) >= DATE_SUB(NOW(), INTERVAL 1 YEAR) AND created_by = :id");
      $this->db->query("SELECT COUNT(*) AS num_forum_topics FROM forum_posts WHERE created_by = :id AND date >= DATE_SUB(NOW(), INTERVAL 1 YEAR);");
      $this->db->bind(":id", $id);
      return $this->db->single();
      
  }

  public function get_no_of_complaints($id){
      // $this->db->query("SELECT COUNT(*) AS num_complaint FROM complaint WHERE (date) >= DATE_SUB(NOW(), INTERVAL 1 MONTH) AND created_by = :id");
      $this->db->query("SELECT COUNT(*) AS num_complaint 
      FROM complaint 
      WHERE created_by = :id 
      AND date >= DATE_SUB(NOW(), INTERVAL 1 YEAR);
      ");
      $this->db->bind(":id", $id);
      return $this->db->single();
      
  }

  public function get_no_of_category(){
      $this->db->query("SELECT count(DISTINCT(tag)) AS num_category FROM blogpost");
      return $this->db->single();
  }
  
  //fertilizer ads function
  public function get_fertilizer_ads_count_details(){
      $this->db->query("SELECT 
      YEAR(m.month_year) AS year, 
      MONTHNAME(m.month_year) AS month, 
      COALESCE(COUNT(f.date), 0) AS count
  FROM (
      SELECT DATE_FORMAT(NOW() - INTERVAL n MONTH, '%Y-%m-01') AS month_year
      FROM (
          SELECT 0 n UNION SELECT 1 UNION SELECT 2 UNION SELECT 3 
          UNION SELECT 4 UNION SELECT 5 UNION SELECT 6 
          UNION SELECT 7 UNION SELECT 8 UNION SELECT 9 
          UNION SELECT 10 UNION SELECT 11
      ) numbers
  ) m 
  LEFT JOIN fertilizer f 
      ON YEAR(f.date) = YEAR(m.month_year) 
      AND MONTH(f.date) = MONTH(m.month_year)
  WHERE m.month_year BETWEEN DATE_FORMAT(NOW() - INTERVAL 11 MONTH, '%Y-%m-01') AND NOW()
  GROUP BY YEAR(m.month_year), MONTH(m.month_year)
       
      ");
      return $this->db->resultSet();
  }


  public function get_complaint_count_details(){
      $this->db->query("SELECT YEAR(date) as year, MONTHNAME(date) as month, COUNT(*) as count
      FROM complaint where created_by=:id
      GROUP BY YEAR(date), MONTH(date) 
      ");
      $this->db->bind(":id", $_SESSION['user_id']);
      return $this->db->resultSet();
  }

  public function get_all_forum_posts($start_from,$num_per_page){
      $this->db->query("SELECT discussion_id, subject, date, type, count(reply_id) as no_of_reply from view_discussion_and_reply group by(discussion_id) limit :start_from, :num_per_page ");
      $this->db->bind(":start_from", $start_from);
      $this->db->bind(":num_per_page", $num_per_page);
      return $this->db->resultSet();
  }




}