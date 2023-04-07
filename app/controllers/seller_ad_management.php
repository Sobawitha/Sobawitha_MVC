<?php
    class seller_ad_management extends Controller{
        public function __construct(){
            $this->seller_ad_management_model = $this->model('M_seller_ad_management');
    }

    public function View_listing(){
        $pending_fertilizer_advertisments = $this->seller_ad_management_model->display_pending_advertisement();
        $data = [
            'pending_advertisements'=> $pending_fertilizer_advertisments,
        ];
        $this->view('Seller/Seller_add_management/v_seller_add_manage', $data);
    }

    public function add_listing(){
        

        if($_SERVER['REQUEST_METHOD'] == 'POST'){

            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $userid = $_SESSION['user_id'];
            

            $data = [

                'product_name' => trim($_POST['product_name']),
                'category' => trim($_POST['category']),
                'certificate_no' => trim($_POST['certificate_no']),
                'manufacturer' => trim($_POST['manufacturer']),
                'description' => trim($_POST['description']),
                'price' => trim($_POST['price']),
                'quantity' => trim($_POST['quantity']),
                'location' => trim($_POST['location']),
                'current_status' => 1,
                'created_by' => $userid,
                'fertilizer_image' =>$_FILES['fertilizer_img'],
                'fertilizer_image_name' => trim($_POST['product_name']).'_'.$_FILES['fertilizer_img']['name'],
                'fertilizer_image_err' => '',

            ];

            if(empty($data['fertilizer_image'])){
                $data['fertilizer_image_err']='fertilizer image cannot be empty';
            
            }
            else{
                $fileExt=explode('.',$_FILES['fertilizer_img']['name']);
                $fileActualExt=strtolower(end($fileExt));
                $allowed=array('jpg','jpeg','png');
    
            
                if(!in_array($fileActualExt,$allowed)){
                $data['fertilizer_image_err']='You cannot upload files of this type';
    
                }
        
    
                if($data['fertilizer_image']['size']>0){
                if(uploadFile($data['fertilizer_image']['tmp_name'],$data['fertilizer_image_name'],'/upload/fertilizer_images/')){
                            
                }else{  
                $data['fertilizer_image_err']='Unsuccessful image uploading';
                
                }
                }else{
                $data[ 'fertilizer_image_err'] ="Image file size is empty";
                
                }
    
            }

            if ($this->seller_ad_management_model->add_fertilizer_advertisment($data)) {
                redirect('seller_ad_management/View_listing');
            }
        }

        else{
            $this->view('Seller/Seller_add_management/v_seller_add_advertisment');
        }

    }

    public function delete_advertisment(){
        if($_SERVER["REQUEST_METHOD"]== 'POST'){
            $advertisementid = trim($_POST['deleteadvertisment']);
            $this->seller_ad_management_model->delete_advertisment($advertisementid);
        }

        redirect('seller_ad_management/View_listing');
    }

    public function Update_advertisment(){
        $fertilizer_id = $_GET['fertilizer_id'];
        $fertilizer_details = $this->seller_ad_management_model->get_fertilizer_details($fertilizer_id);
        $data = [
            'fertilizer_details'=>$fertilizer_details,
        ];
        
        $this->view('Seller/Seller_add_management/v_seller_update_add',$data);
    }

}
?>