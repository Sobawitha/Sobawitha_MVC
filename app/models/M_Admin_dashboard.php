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
      $this->db->query('SELECT COUNT(Product_id) as total_fertilizer_adds_count FROM fertilizer WHERE current_status = 1 AND date BETWEEN DATE_SUB(NOW(), INTERVAL 1 MONTH) AND NOW()');
     
      $row= $this->db->single();

      if($this->db->rowCount() >0){
            return $row;
      }else{
            return false;
      }
    } 

    public function getTotalRawAds()
    {
      $this->db->query('SELECT COUNT(Product_id) as total_raw_adds_count FROM raw_material WHERE current_status = 1 AND date BETWEEN DATE_SUB(NOW(), INTERVAL 1 MONTH) AND NOW()');
     
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

    public function get_tot_forum_posts(){
      $this->db->query('SELECT COUNT(discussion_id) as total_discussions FROM forum_posts WHERE date BETWEEN DATE_SUB(NOW(), INTERVAL 1 MONTH) AND NOW()');
     
      $row= $this->db->single();

      if($this->db->rowCount() >0){
            return $row;
      }else{
            return false;
      }
    }

    public function get_user_detail(){
      $this->db->query("SELECT DISTINCT(user_flag) as user_type, COUNT(user_flag) AS num_users FROM user GROUP BY user_flag");
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

  public function get_raw_material_ads_count_details(){
    $this->db->query("SELECT 
    YEAR(m.month_year) AS year, 
    MONTHNAME(m.month_year) AS month, 
    COALESCE(COUNT(r.date), 0) AS count
FROM (
    SELECT DATE_FORMAT(NOW() - INTERVAL n MONTH, '%Y-%m-01') AS month_year
    FROM (
        SELECT 0 n UNION SELECT 1 UNION SELECT 2 UNION SELECT 3 
        UNION SELECT 4 UNION SELECT 5 UNION SELECT 6 
        UNION SELECT 7 UNION SELECT 8 UNION SELECT 9 
        UNION SELECT 10 UNION SELECT 11
    ) numbers
) m 
LEFT JOIN raw_material r 
    ON YEAR(r.date) = YEAR(m.month_year) 
    AND MONTH(r.date) = MONTH(m.month_year)
WHERE m.month_year BETWEEN DATE_FORMAT(NOW() - INTERVAL 11 MONTH, '%Y-%m-01') AND NOW()
GROUP BY YEAR(m.month_year), MONTH(m.month_year)
     
    ");
    return $this->db->resultSet();
}
  public function get_all_forum_posts($start_from,$num_per_page){
      $this->db->query("SELECT discussion_id, subject, date, type, count(reply_id) as no_of_reply from view_discussion_and_reply group by(discussion_id) ORDER BY discussion_id DESC limit :start_from, :num_per_page ");
      $this->db->bind(":start_from", $start_from);
      $this->db->bind(":num_per_page", $num_per_page);
      return $this->db->resultSet();
  }

  public function get_total_row_count_forum(){
    $this->db->query("SELECT COUNT(DISTINCT discussion_id) as total_row_count FROM view_discussion_and_reply
    ");
    $row = $this->db->single();
    return $row->total_row_count;
  
  }

  public function get_complaint_count_details(){
    $this->db->query("SELECT YEAR(date) as year, MONTHNAME(date) as month, COUNT(*) as count
    FROM complaint WHERE current_status = 1 GROUP BY YEAR(date), MONTH(date) 
    ");
    
    return $this->db->resultSet();
}

 public function get_top_sellers(){
  $this->db->query("SELECT AVG(rating) AS avg_rating, receiver_id, CONCAT(first_name, ' ', last_name) AS full_name
  FROM feedback
  JOIN user ON feedback.receiver_id = user.user_id
  WHERE feed_status = 1
  GROUP BY receiver_id
  ORDER BY avg_rating DESC
  LIMIT 3;
  ");
  $result=$this->db->resultSet();
  return $result;
 }






}