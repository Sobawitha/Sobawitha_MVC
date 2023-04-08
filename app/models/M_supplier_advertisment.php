<?php

class M_supplier_advertisment
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function getPosts() {
        $this->db->query('SELECT * FROM raw_material');

        $results = $this->db->resultSet();

        return $results;
    }

    public function getPostById($productId) {
        $this->db->query('SELECT * FROM raw_material WHERE Product_id = :id');
        $this->db->bind(':id', $productId);

        $row = $this->db->single();

        return $row;
    }





    public function create($data) {
        $this->db->query('INSERT INTO raw_material(product_name, quantity, price, product_description, raw_material_image, user_id) VALUES (:product_name, :quantity, :price, :product_description, :image, :user_id)');
        $this->db->bind(':user_id', $_SESSION['user_id']);
        $this->db->bind(':image', $data['image_name']);
        // $this->db->bind(':product_id', $data['Product_id']);
        $this->db->bind(':product_name', $data['product_name']);
        $this->db->bind(':quantity', $data['quantity']);
        // $this->db->bind(':manufacturer', $data['manufacturer']);
        $this->db->bind(':price', $data['price']);
        $this->db->bind(':product_description', $data['product_description']);
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
        $this->db->query('UPDATE raw_material SET raw_material_image = :image, product_name = :product_name, quantity=:quantity, price=:price, product_description=:product_description WHERE Product_id = :id');
        $this->db->bind(':image', $data['image_name']);
        $this->db->bind(':product_name', $data['product_name']);
        $this->db->bind(':quantity', $data['quantity']);
        $this->db->bind(':price', $data['price']);
        $this->db->bind(':product_description', $data['product_description']);
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
        $this->db->query('DELETE FROM raw_material WHERE Product_id = :id');
        $this->db->bind(':id', $productId);
        
        // Execute
        if($this->db->execute()) {
            return true;
        }
        else {
            return false;
        }
    }

}


?>