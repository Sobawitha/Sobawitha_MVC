<?php
    class supplier_ad_view extends Controller{
        public function __construct(){
            $this->supplier_ad = $this->model('M_supplier_advertisment');
    }


    public function index() {
        $posts = $this->supplier_ad->getPosts();
    
        $data = [
            'posts' => $posts
        ];
    
        $this->view('Raw_material_supplier/supplier_ad_management/supplier_view_advertisement', $data);
    }
    
    
    public function indexmore($productId) {


        $post = $this->supplier_ad->getPostById($productId);

            // Check the owner
            // if($post->user_id != $_SESSION['user_id']) {
            //     redirect('Posts/v_index');
            // }

            $data = [
                'image' => '',
                'image_name' => $post->raw_material_image,
                'product_id' => $productId,
                'product_name' => $post->product_name,
                'price' => $post->price,
                'quantity' => $post->quantity,
                'product_description' => $post->product_description,
                'image_err' => '',
                // 'title_err' => '',
                // 'body_err' => ''
            ];

            $this->view('Raw_material_supplier/supplier_ad_management/supplier_view_more_advertisement', $data);
    }





    // public function add_advertisment(){
    //     if($_SERVER['REQUEST_METHOD'] == 'POST') {
    //         $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

    //         $data = [
    //             'image' => $_FILES['image'],
    //             'image_name' => time().'_'.$_FILES['image']['name'],

    //             'product_name' => trim($_POST['name']),
    //             'price' => trim($_POST['price']),
    //             'quantity' => trim($_POST['quantity']),
    //             'product_description' => trim($_POST['additional-info']),
    //             // 'raw_material_image' => trim($_POST['image']),
                
    //             'image_err' => '',
    //             'product_name_err' => '',
    //             'price_err' => '',
    //             'quantity_err' => '',
    //             'product_description_err' => '',
    //             // 'raw_material_image_err' => ''
    //         ];

    //         //validation
    //         if($data['image']['size'] > 0) {
    //             if(uploadImage($data['image']['tmp_name'], $data['image_name'], '/img/postsImgs/')) {
    //                 //done
    //             }
    //             else {
    //                 $data['image_err'] = 'Unsuccessful image uploading';
    //             }
    //         }
    //         else {
    //             $data['image_name'] = null;
    //         }

    //         if(empty($data['product_name'])) {
    //             $data['product_name_err'] = 'Please enter a product_name';
    //         }

    //         if(empty($data['price'])) {
    //             $data['price_err'] = 'Please enter a price';
    //         }

    //         if(empty($data['quantity'])) {
    //             $data['quantity_err'] = 'Please enter a quantity';
    //         }

    //         if(empty($data['product_description'])) {
    //             $data['product_description_err'] = 'Please enter a product description';
    //         }

    //         // if(empty($data['raw_material_image'])) {
    //         //     $data['raw_material_image_err'] = 'Please enter a raw material image';
    //         // }

    //         if(empty($data['image_err']) && empty($data['product_name_err']) && empty($data['price_err']) && empty($data['quantity_err']) && empty($data['product_description_err'])) {
    //             if($this->supplier_ad->create($data)) {
    //                 // flash('post_msg', 'Post is published');
    //                 redirect('supplier_ad_management/index');
    //             }
    //             else {
    //                 die('Something went wrong');
    //             }
    //         }
    //         else {
    //             // Loading the view with errors
    //             $this->view('Raw_material_supplier/supplier_ad_management/supplier_add_advertisment',$data);
    //         }
    //     }
    //     else{
    //         $data = [
    //             'image' => '',
    //             'image_name' => '',
    //             'product_name' => '',
    //             'price' => '',
    //             'quantity' => '',
    //             'product_description' => '',
    //             'raw_material_image' => '',

    //             'image_err' => ''
    //             // 'product_name_err' => '',
    //             // 'price_err' => '',
    //             // 'quantity_err' => '',
    //             // 'product_description_err' => '',
    //             // 'raw_material_image_err' => ''
    //         ];

    //         $this->view('Raw_material_supplier/supplier_ad_management/supplier_add_advertisment',$data);
    //     }





    //     // $data=[];
    //     // $this->view('Raw_material_supplier/supplier_ad_management/supplier_add_advertisment',$data);
    // }

    // public function view_advertisment(){
    //     $data=[];
    //     $this->view('Raw_material_supplier/supplier_ad_management/supplier_add_management',$data);
    // }

    // public function update_advertisement($productId){
    //     if($_SERVER['REQUEST_METHOD'] == 'POST') {
    //         $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

    //         $data = [
    //             'image' => $_FILES['image'],
    //             'image_name' => time().'_'.$_FILES['image']['name'],
    //             'product_id' => $productId,
    //             'product_name' => trim($_POST['name']),
    //             'price' => trim($_POST['price']),
    //             'quantity' => trim($_POST['quantity']),
    //             'product_description' => trim($_POST['additional-info']),
    //             // 'raw_material_image' => trim($_POST['image']),
                
    //             'image_err' => '',
    //             'product_name_err' => '',
    //             'price_err' => '',
    //             'quantity_err' => '',
    //             'product_description_err' => ''
    //             // 'raw_material_image_err' => ''
    //         ];

    //         //validation
    //         $post = $this->postsModel->getPostById($postId);
    //         $oldImage = PUBROOT.'/img/postsImgs/'.$post->image;

    //         //photo updated
    //         //user haven't changed the existing image
    //         if($_POST['intentially_removed'] == 'removed') {
    //             deleteImage($oldImage);

    //             $data['image_name'] = '';
    //         }
    //         else {
    //             if($_FILES['image']['name'] == '') {
    //                 $data['image_name'] = $post->image;
    //             }
    //             else {
    //                 updateImage($oldImage, $data['image']['tmp_name'], $data['image_name'], '/img/postsImgs/');
    //             }
    //         }

    //         if(empty($data['product_name'])) {
    //             $data['product_name_err'] = 'Please enter a product_name';
    //         }

    //         if(empty($data['price'])) {
    //             $data['price_err'] = 'Please enter a price';
    //         }

    //         if(empty($data['quantity'])) {
    //             $data['quantity_err'] = 'Please enter a quantity';
    //         }

    //         if(empty($data['product_description'])) {
    //             $data['product_description_err'] = 'Please enter a product description';
    //         }

    //         // if(empty($data['raw_material_image'])) {
    //         //     $data['raw_material_image_err'] = 'Please enter a raw material image';
    //         // }

    //         if(empty($data['product_name_err']) && empty($data['price_err']) && empty($data['quantity_err']) && empty($data['product_description_err'])) {
    //             if($this->supplier_ad->edit($data)) {
    //                 // flash('post_msg', 'Post is published');
    //                 redirect('supplier_ad_management/index');
    //             }
    //             else {
    //                 die('Something went wrong');
    //             }
    //         }
    //         else {
    //             // Loading the view with errors
    //             $this->view('Raw_material_supplier/supplier_ad_management/v_supplier_update_advertisement', $data);
    //         }
    //     }
    //     else{
    //         $post = $this->supplier_ad->getPostById($productId);

    //         // Check the owner
    //         // if($post->user_id != $_SESSION['user_id']) {
    //         //     redirect('Posts/v_index');
    //         // }

    //         $data = [
    //             'image' => '',
    //             'image_name' => '',
    //             'product_id' => $productId,
    //             'product_name' => $post->product_name,
    //             'price' => $post->price,
    //             'quantity' => $post->quantity,
    //             'product_description' => $post->product_description,
    //             'image_err' => '',
    //             // 'title_err' => '',
    //             // 'body_err' => ''
    //         ];

    //         $this->view('Raw_material_supplier/supplier_ad_management/v_supplier_update_advertisement', $data);
    //     }
    // }

    // // DELETE
    // public function delete_advertisement($productId) {
    //     $post = $this->supplier_ad->getPostById($productId);

    //     // Check owner
    //     if($post->user_id != $_SESSION['user_id']) {
    //         redirect('supplier_ad_management/index');
    //     }
    //     else {
    //         $this->postsModel->getPostById($postId);
    //         $oldImage = PUBROOT.'/img/postsImgs/'.$post->image;
    //         deleteImage($oldImage);
            
    //         if($this->supplier_ad->delete($productId)) {
    //             // flash('post_msg', 'Post is deleted');
    //             redirect('supplier_ad_management/index');
    //         }
    //         else {
    //             die('Something went wrong');
    //         }
    //     }
    // }
}
?>