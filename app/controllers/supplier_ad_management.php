<?php
    class supplier_ad_management extends Controller{
        public function __construct(){
            $this->supplier_ad = $this->model('M_supplier_advertisment');
    }


    public function index() {
        $posts = $this->supplier_ad->getPosts();
    
        $data = [
            'posts' => $posts
        ];
    
        $this->view('Raw_material_supplier/supplier_ad_management/supplier_add_management', $data);
    }
    
    public function indexfilter() {
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $filter_type = trim($_POST['current_status']);
            $posts = $this->supplier_ad->getPostsfilter($filter_type);
        
            $data = [
                'posts' => $posts
            ];
        
            $this->view('Raw_material_supplier/supplier_ad_management/supplier_add_management', $data);

        }else{
            $posts = $this->supplier_ad->getPostsfilter();
        
            $data = [
                'posts' => $posts
            ];
        
            $this->view('Raw_material_supplier/supplier_ad_management/supplier_add_management', $data);
        }
    }





    public function add_advertisment(){
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                'image1' => $_FILES['image1'],
                'image_name1' => time().'_'.$_FILES['image1']['name'],
                'image2' => $_FILES['image2'],
                'image_name2' => time().'_'.$_FILES['image2']['name'],
                'image3' => $_FILES['image3'],
                'image_name3' => time().'_'.$_FILES['image3']['name'],

                'product_name' => trim($_POST['name']),
                'price' => trim($_POST['price']),
                // 'per' => trim($_POST['per']),
                // 'category_per' => trim($_POST['category_per']),
                'quantity' => trim($_POST['quantity']),
                // 'category_avl' => trim($_POST['category_avl']),
                'product_description' => trim($_POST['additional-info']),
                'type' => trim($_POST['type']),
                'manufacturer' =>trim($_POST['manufacturer']),
                'current_status' => 0,
                // 'raw_material_image' => trim($_POST['image']),
                
                'image_err1' => '',
                'image_err2' => '',
                'image_err3' => '',
                'product_name_err' => '',
                'price_err' => '',
                'quantity_err' => '',
                'product_description_err' => '',
                'type_err' => '',
                'manufacturer_err' => '',
                // 'raw_material_image_err' => ''
            ];

            //validation
            if($data['image1']['size'] > 0) {
                if(uploadImage($data['image1']['tmp_name'], $data['image_name1'], '/img/postsImgs/')) {
                    //done
                }
                else {
                    $data['image_err1'] = 'Unsuccessful image uploading';
                }
            }
            else {
                $data['image_err1'] = 'Cover image can not be empty';
            }

            //validation
            if($data['image2']['size'] > 0) {
                if(uploadImage($data['image2']['tmp_name'], $data['image_name2'], '/img/postsImgs/')) {
                    //done
                }
                else {
                    $data['image_err2'] = 'Unsuccessful image uploading';
                }
            }
            else {
                // $data['image_name2'] = null;
            }

            //validation
            if($data['image3']['size'] > 0) {
                if(uploadImage($data['image3']['tmp_name'], $data['image_name3'], '/img/postsImgs/')) {
                    //done
                }
                else {
                    $data['image_err3'] = 'Unsuccessful image uploading';
                }
            }
            else {
                // $data['image_name3'] = null;
            }

            // 2023.05.11

            $titleValidationResult = validate_title($data['product_name']);

            if ($titleValidationResult !== true || empty($data['product_name'])) {
                $data['product_name_err'] = !empty($titleValidationResult) ? $titleValidationResult : 'title cannot be empty';
            }

            $priceValidationResult = validate_price($data['price']);

            if ($priceValidationResult !== true || empty($data['price'])) {
                $data['price_err'] = !empty($priceValidationResult) ? $priceValidationResult : 'price cannot be empty';
            }

            $typeValidationResult = validate_type($data['type']);

            if ($typeValidationResult !== true || empty($data['type'])) {
                $data['type_err'] = !empty($typeValidationResult) ? $typeValidationResult : 'type cannot be empty';
            }

            $manufacturerValidationResult = validate_manufacturer($data['manufacturer']);

            if ($manufacturerValidationResult !== true || empty($data['manufacturer'])) {
                $data['manufacturer_err'] = !empty($manufacturerValidationResult) ? $manufacturerValidationResult : 'manufacturer cannot be empty';
            }

            $quantityValidationResult = validate_quantity($data['quantity']);

            if ($quantityValidationResult !== true || empty($data['quantity'])) {
                $data['quantity_err'] = !empty($quantityValidationResult) ? $quantityValidationResult : 'quantity cannot be empty';
            }

            $productDescriptionValidationResult = validate_additional_info($data['product_description']);

            if ($productDescriptionValidationResult !== true || empty($data['product_description'])) {
                $data['product_description_err'] = !empty($productDescriptionValidationResult) ? $productDescriptionValidationResult : 'additional info cannot be empty';
            }


            // if(empty($data['product_name'])) {
            //     $data['product_name_err'] = 'Please enter a product_name';
            // }

            // if(empty($data['price'])) {
            //     $data['price_err'] = 'Please enter a price';
            // }

            // if(empty($data['quantity'])) {
            //     $data['quantity_err'] = 'Please enter a quantity';
            // }

            // if(empty($data['product_description'])) {
            //     $data['product_description_err'] = 'Please enter a product description';
            // }

            // if(empty($data['raw_material_image'])) {
            //     $data['raw_material_image_err'] = 'Please enter a raw material image';
            // }

            if(empty($data['image_err1']) && empty($data['image_err2']) && empty($data['image_err3']) && empty($data['product_name_err']) && empty($data['price_err']) && empty($data['type_err']) && empty($data['manufacturer_err']) && empty($data['quantity_err']) && empty($data['product_description_err'])) {
                if($this->supplier_ad->create($data)) {
                    // flash('post_msg', 'Post is published');
                    redirect('supplier_ad_management/indexfilter');
                }
                else {
                    die('Something went wrong');
                }
            }
            else {
                // Loading the view with errors
                $this->view('Raw_material_supplier/supplier_ad_management/supplier_add_advertisment',$data);
            }
        }
        else{
            $data = [
                'image1' => '',
                'image_name1' => '',
                'image2' => '',
                'image_name2' => '',
                'image3' => '',
                'image_name3' => '',
                'product_name' => '',
                'price' => '',
                // 'per' => '',
                // 'category_per' => '',
                'quantity' => '',
                // 'category_avl' => '',
                'product_description' => '',
                'type' => '',
                'manufacturer' =>'',
                'raw_material_image' => '',

                'image_err1' => '',
                'image_err2' => '',
                'image_err3' => '',
                'product_name_err' => '',
                'price_err' => '',
                'quantity_err' => '',
                'product_description_err' => '',
                'type_err' => '',
                'manufacturer_err' => ''
                // 'raw_material_image_err' => ''
            ];

            $this->view('Raw_material_supplier/supplier_ad_management/supplier_add_advertisment',$data);
        }





        // $data=[];
        // $this->view('Raw_material_supplier/supplier_ad_management/supplier_add_advertisment',$data);
    }

    public function view_advertisment(){
        $data=[];
        $this->view('Raw_material_supplier/supplier_ad_management/supplier_add_management',$data);
    }

    public function update_advertisement($productId){
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                'image1' => $_FILES['image1'],
                'image_name1' => time().'_'.$_FILES['image1']['name'],
                'image2' => $_FILES['image2'],
                'image_name2' => time().'_'.$_FILES['image2']['name'],
                'image3' => $_FILES['image3'],
                'image_name3' => time().'_'.$_FILES['image3']['name'],

                'product_id' => $productId,
                'product_name' => trim($_POST['name']),
                'price' => trim($_POST['price']),
                // 'per' => trim($_POST['per']),
                // 'category_per' => trim($_POST['category_per']),
                'quantity' => trim($_POST['quantity']),
                // 'category_avl' => trim($_POST['category_avl']),
                'product_description' => trim($_POST['additional-info']),
                'type' => trim($_POST['type']),
                'manufacturer' =>trim($_POST['manufacturer']),
                // 'raw_material_image' => trim($_POST['image']),
                
                'image_err1' => '',
                'image_err2' => '',
                'image_err3' => '',
                'product_name_err' => '',
                'price_err' => '',
                'quantity_err' => '',
                'product_description_err' => '',
                'type_err' => '',
                'manufacturer_err' => ''
                // 'raw_material_image_err' => ''
            ];

            //validation
            $post = $this->supplier_ad->getPostById($productId);
            $oldImage1 = PUBROOT.'/img/postsImgs/'.$post->raw_material_image;
            $oldImage2 = PUBROOT.'/img/postsImgs/'.$post->rm_image_two;
            $oldImage3 = PUBROOT.'/img/postsImgs/'.$post->rm_image_three;

            //photo updated
            //user haven't changed the existing image

            // For image one
            if($_POST['intentially_removed1'] == 'removed') {
                deleteImage($oldImage1);

                $data['image_name1'] = '';
                $data['image_err1'] = 'Cover image can not be empty';
            }
            else {
                if($_FILES['image1']['name'] == '') {

                    $data['image_name1'] = $post->raw_material_image;
                }
                else {
                    updateImage($oldImage1, $data['image1']['tmp_name'], $data['image_name1'], '/img/postsImgs/');
                }
            }

            // For image two
            if($_POST['intentially_removed2'] == 'removed') {
                deleteImage($oldImage2);

                $data['image_name2'] = '';
            }
            else {
                if($_FILES['image2']['name'] == '') {

                    $data['image_name2'] = $post->rm_image_two;
                }
                else {
                    updateImage($oldImage2, $data['image2']['tmp_name'], $data['image_name2'], '/img/postsImgs/');
                }
            }

            // For image three
            if($_POST['intentially_removed3'] == 'removed') {
                deleteImage($oldImage3);

                $data['image_name3'] = '';
            }
            else {
                if($_FILES['image3']['name'] == '') {

                    $data['image_name3'] = $post->rm_image_three;
                }
                else {
                    updateImage($oldImage3, $data['image3']['tmp_name'], $data['image_name3'], '/img/postsImgs/');
                }
            }


            // 2023.05.11

            $titleValidationResult = validate_title($data['product_name']);

            if ($titleValidationResult !== true || empty($data['product_name'])) {
                $data['product_name_err'] = !empty($titleValidationResult) ? $titleValidationResult : 'title cannot be empty';
            }

            $priceValidationResult = validate_price($data['price']);

            if ($priceValidationResult !== true || empty($data['price'])) {
                $data['price_err'] = !empty($priceValidationResult) ? $priceValidationResult : 'price cannot be empty';
            }

            $typeValidationResult = validate_type($data['type']);

            if ($typeValidationResult !== true || empty($data['type'])) {
                $data['type_err'] = !empty($typeValidationResult) ? $typeValidationResult : 'type cannot be empty';
            }

            $manufacturerValidationResult = validate_manufacturer($data['manufacturer']);

            if ($manufacturerValidationResult !== true || empty($data['manufacturer'])) {
                $data['manufacturer_err'] = !empty($manufacturerValidationResult) ? $manufacturerValidationResult : 'manufacturer cannot be empty';
            }

            $quantityValidationResult = validate_quantity($data['quantity']);

            if ($quantityValidationResult !== true || empty($data['quantity'])) {
                $data['quantity_err'] = !empty($quantityValidationResult) ? $quantityValidationResult : 'quantity cannot be empty';
            }

            $productDescriptionValidationResult = validate_additional_info($data['product_description']);

            if ($productDescriptionValidationResult !== true || empty($data['product_description'])) {
                $data['product_description_err'] = !empty($productDescriptionValidationResult) ? $productDescriptionValidationResult : 'additional info cannot be empty';
            }

            // if(empty($data['product_name'])) {
            //     $data['product_name_err'] = 'Please enter a product_name';
            // }

            // if(empty($data['price'])) {
            //     $data['price_err'] = 'Please enter a price';
            // }

            // if(empty($data['quantity'])) {
            //     $data['quantity_err'] = 'Please enter a quantity';
            // }

            // if(empty($data['product_description'])) {
            //     $data['product_description_err'] = 'Please enter a product description';
            // }

            // if(empty($data['raw_material_image'])) {
            //     $data['raw_material_image_err'] = 'Please enter a raw material image';
            // }

            if(empty($data['image_err1']) && empty($data['image_err2']) && empty($data['image_err3']) && empty($data['product_name_err']) && empty($data['price_err']) && empty($data['type_err']) && empty($data['manufacturer_err']) && empty($data['quantity_err']) && empty($data['product_description_err'])) {
                if($this->supplier_ad->edit($data)) {
                    // flash('post_msg', 'Post is published');
                    redirect('supplier_ad_management/indexfilter');
                }
                else {
                    die('Something went wrong');
                }
            }
            else {
                // Loading the view with errors
                $this->view('Raw_material_supplier/supplier_ad_management/v_supplier_update_advertisement', $data);
            }
        }
        else{
            $post = $this->supplier_ad->getPostById($productId);

            // Check the owner
            // if($post->user_id != $_SESSION['user_id']) {
            //     redirect('Posts/v_index');
            // }

            $data = [
                'image1' => '',
                'image_name1' => $post->raw_material_image,
                'image2' => '',
                'image_name2' => $post->rm_image_two,
                'image3' => '',
                'image_name3' => $post->rm_image_three,
                
                'product_id' => $productId,
                'product_name' => $post->product_name,
                'price' => $post->price,
                // 'per' => $post->per_amount,
                // 'category_per' => $post->category_per,
                'quantity' => $post->quantity,
                // 'category_avl' => $post->category_avl,
                'product_description' => $post->product_description,
                'type' => $post->type,
                'manufacturer' => $post->manufacturer,
                // 'image_err' => '',
                // 'title_err' => '',
                // 'body_err' => ''


                
                'image_err1' => '',
                'image_err2' => '',
                'image_err3' => '',
                'product_name_err' => '',
                'price_err' => '',
                'quantity_err' => '',
                'product_description_err' => '',
                'type_err' => '',
                'manufacturer_err' => ''
                
            ];

            $this->view('Raw_material_supplier/supplier_ad_management/v_supplier_update_advertisement', $data);
        }
    }

    // DELETE
    public function delete_advertisement($productId) {
        $post = $this->supplier_ad->getPostById($productId);

        // Check owner
        if($post->user_id != $_SESSION['user_id']) {
            redirect('supplier_ad_management/indexfilter');
        }
        else {
            // $post = $this->postsModel->getPostById($productId);
            // $oldImage = PUBROOT.'/img/postsImgs/'.$post->image;
            // deleteImage($oldImage);
            
            if($this->supplier_ad->delete($productId)) {
                // flash('post_msg', 'Post is deleted');
                redirect('supplier_ad_management/indexfilter');
            }
            else {
                die('Something went wrong');
            }
        }
    }
}
?>