<?php

class M_supplier_advertisment
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function getPosts() {
        // Check Expired ones
        $this->db->query('UPDATE raw_material SET current_status = 3 WHERE date <= DATE_SUB(NOW(), INTERVAL 2 WEEK)');
        $this->db->execute();

        $this->db->query('SELECT * FROM raw_material WHERE (ad_status != 1 AND (date > DATE_SUB(NOW(), INTERVAL 2 WEEK)))');

        $results = $this->db->resultSet();

        return $results;
    }
    public function getPostsfilter() {
        // Check Expired ones
        $this->db->query('UPDATE raw_material SET current_status = 3 WHERE date <= DATE_SUB(NOW(), INTERVAL 2 WEEK)');
        $this->db->execute();

        $user_id = $_SESSION['user_id'];
        if(isset($_POST['current_status']) && !empty($_POST['current_status'])){
            if ($_POST['current_status'] == 'all'){
                $this->db->query('SELECT * FROM raw_material WHERE (user_id = :uid AND ad_status != 1)');

                $this->db->bind(':uid', $user_id);
                return $this->db->resultSet(); 
            }
            if ($_POST['current_status'] == 'Pending'){
                $this->db->query('SELECT * FROM raw_material WHERE ((ad_status != 1 AND current_status=0) AND user_id = :uid)');
                $this->db->bind(':uid', $user_id);
                return $this->db->resultSet(); 
            }
            if ($_POST['current_status'] == 'Accepted'){
                $this->db->query('SELECT * FROM raw_material WHERE ((ad_status != 1 AND current_status=1) AND user_id = :uid)');
                $this->db->bind(':uid', $user_id);
                return $this->db->resultSet(); 
            }
    
            if ($_POST['current_status'] == 'Rejected'){
              $this->db->query('SELECT * FROM raw_material WHERE ((ad_status != 1 AND current_status=2) AND user_id = :uid)');
              $this->db->bind(':uid', $user_id);
              return $this->db->resultSet(); 
            }
            if ($_POST['current_status'] == 'Expired'){
                $this->db->query('SELECT * FROM raw_material WHERE ((ad_status != 1 AND current_status=3) AND user_id = :uid)');
                $this->db->bind(':uid', $user_id);
                return $this->db->resultSet(); 
            }
        }else{
            $this->db->query('SELECT * FROM raw_material WHERE (user_id = :uid AND ad_status != 1)');
            $this->db->bind(':uid', $user_id);
            return $this->db->resultSet(); 
        }
        






        // $this->db->query('SELECT * FROM raw_material WHERE ad_status != 1');

        // $results = $this->db->resultSet();

        // return $results;
    }

    public function getPostById($productId) {
        // Check Expired ones
        $this->db->query('UPDATE raw_material SET current_status = 3 WHERE date <= DATE_SUB(NOW(), INTERVAL 2 WEEK)');
        $this->db->execute();
        
        $this->db->query('SELECT * FROM raw_material WHERE (Product_id = :id AND ad_status != 1)');
        $this->db->bind(':id', $productId);

        $row = $this->db->single();

        return $row;
    }





    public function create($data) {
        $this->db->query('INSERT INTO raw_material(product_name, manufacturer, quantity, price, product_description, type, raw_material_image, rm_image_two, rm_image_three, user_id, current_status) VALUES (:product_name, :manufacturer, :quantity, :price, :product_description, :type, :image1, :image2, :image3, :user_id, :current_status)');
        $this->db->bind(':user_id', $_SESSION['user_id']);
        $this->db->bind(':image1', $data['image_name1']);
        $this->db->bind(':image2', $data['image_name2']);
        $this->db->bind(':image3', $data['image_name3']);
        // $this->db->bind(':product_id', $data['Product_id']);
        $this->db->bind(':product_name', $data['product_name']);
        $this->db->bind(':quantity', $data['quantity']);
        // $this->db->bind(':category_avl', $data['category_avl']);
        $this->db->bind(':manufacturer', $data['manufacturer']);
        $this->db->bind(':price', $data['price']);
        // $this->db->bind(':per', $data['per']);
        // $this->db->bind(':category_per', $data['category_per']);
        $this->db->bind(':product_description', $data['product_description']);
        $this->db->bind(':type', $data['type']);
        
        $this->db->bind(':current_status', $data['current_status']);

        // $this->db->bind(':admin_id', $data['Admin_Id']);
        // $this->db->bind(':raw_material_image', $data['raw_material_image']);
        
        // Execute
        if($this->db->execute()) {
            return true;
        }
        else {
            return false;
        }
    }

    public function edit($data) {
        $this->db->query('UPDATE raw_material SET raw_material_image = :image1, rm_image_two = :image2, rm_image_three = :image3, product_name = :product_name, manufacturer = :manufacturer, quantity=:quantity, price= :price, product_description=:product_description, type=:type WHERE Product_id = :id');
        $this->db->bind(':image1', $data['image_name1']);
        $this->db->bind(':image2', $data['image_name2']);
        $this->db->bind(':image3', $data['image_name3']);
        $this->db->bind(':product_name', $data['product_name']);
        $this->db->bind(':quantity', $data['quantity']);
        // $this->db->bind(':category_avl', $data['category_avl']);
        $this->db->bind(':manufacturer', $data['manufacturer']);
        $this->db->bind(':price', $data['price']);
        // $this->db->bind(':per', $data['per']);
        // $this->db->bind(':category_per', $data['category_per']);
        $this->db->bind(':product_description', $data['product_description']);
        $this->db->bind(':type', $data['type']);
        $this->db->bind(':id', $data['product_id']);
        
        // Execute
        if($this->db->execute()) {
            return true;
        }
        else {
            return false;
        }
    }

    public function delete($productId) {
        $this->db->query('UPDATE raw_material SET ad_status = 1 WHERE Product_id = :id');
        // $this->db->query('DELETE FROM raw_material WHERE Product_id = :id');
        $this->db->bind(':id', $productId);
        
        // Execute
        if($this->db->execute()) {
            return true;
        }
        else {
            return false;
        }
    }


    // search
    public function getSearchAds($search)
    {
        $user_id = $_SESSION['user_id'];
        $this->db->query('UPDATE raw_material SET current_status = 3 WHERE date <= DATE_SUB(NOW(), INTERVAL 2 WEEK)');
        $this->db->execute();

        $this->db->query("SELECT * FROM raw_material WHERE ((ad_status != 1 AND CONCAT(product_name, price, quantity) LIKE '%$search%' ) AND user_id = :uid)");
        $this->db->bind(':uid', $user_id);
        $result=$this->db->resultSet();
        return $result;
    }

   

}


?>