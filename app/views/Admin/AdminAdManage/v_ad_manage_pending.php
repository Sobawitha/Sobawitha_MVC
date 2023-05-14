<link rel="stylesheet" href="<?php echo URLROOT;?>/css/Admin/admin_ad_manage_pending.css"></link>
<?php require APPROOT.'/views/Users/component/Header.php'?>
<?php require APPROOT.'/views/Admin/Admin/admin_topnavbar.php'?>
<?php require APPROOT.'/views/Admin/Admin/admin_sidebar.php'?>
<script src="../js/Admin/Add_management/add_management.js"></script>

<div class="body">
        <div class="section_1">
            
        </div>

        <div class="section_2">

        <h3>Advertisements Management</h3>
        <hr>

        <br><br>

        <div class="button_section">
        <form class="searchForm" action="<?php echo URLROOT;?>/Admin_ad_management/adminSearchAd" method="GET">
        <div class="search_bar">
            <div class="search_content">
                
                    <span class="search_cont" onclick="open_cancel_btn()"><input type="text" name="search" id="searchBar" placeholder="<?php echo $data['search'] ?>" id="searchBar" require/></span>
                    <button type="button" class="search_btn" onclick="clear_search_bar()"><i class="fa-solid fa-xmark" id="cancel" ></i></button>
                    <button type="submit" class="search_btn"  onclick="open_cancel_btn()" ><i class="fa fa-search" aria-hidden="true" id="search"></i></button>
                
            </div>
        </div>
     
        </form>
        </div>
        <?php if(empty($data['message'])){ ?>
                <?php if($data['search'] ==='Search by title of the advertisement'): ?>
               
                <div class="filter_section">
                <div class="radio-buttons"  id="radioButtons">        
                
                <form method ="POST" action="<?php echo URLROOT?>/Admin_ad_management/ad_management_view" id="filter_form">
                
                <label for="pending_ads" id="filter_label"> <input type="radio" id="pending_ads" name="ad_type" onclick="javascript:submit()" value="pending_ads" <?php 
                if (isset($_POST['ad_type']) && $_POST['ad_type'] == 'pending_ads') {
                echo ' checked="checked"';
                $_SESSION['radio_admin_ad'] = 'pending_ads';
                }elseif (!isset($_POST['ad_type'])){
                echo 'checked'; 
                $_SESSION['radio_admin_ad'] = 'pending_ads';       
                }?> checked>Pending Ads</label>

                <label for="reviewed_ads" id="filter_label"> <input type="radio" id="reviewed_ads" name="ad_type" value="reviewed_ads" onclick="javascript:submit()" value = "reviewed_ads"
                <?php if (isset($_POST['ad_type']) && $_POST['ad_type'] == 'reviewed_ads') {
                echo ' checked="checked"';
                $_SESSION['radio_admin_ad'] = 'reviewed_ads';
                }elseif(!isset($_POST['ad_type']) && isset($_GET['ad_type']) && $_GET['ad_type'] == 'reviewed_ads '){
                echo 'checked';
                $_SESSION['radio_admin_ad'] = 'reviewed_ads';
                }?> >Reviewed Ads</label>

                <label for="rejected_ads" id="filter_label"> <input type="radio" id="rejected_ads" name="ad_type" value="rejected_ads" onclick="javascript:submit()" value = "rejected_ads"
                <?php if (isset($_POST['ad_type']) && $_POST['ad_type'] == 'rejected_ads'){
                 echo ' checked="checked"';
                 $_SESSION['radio_admin_ad'] = 'rejected_ads';
                }elseif(!isset($_POST['ad_type']) && isset($_GET['ad_type']) && $_GET['ad_type'] == 'rejected_ads '){
                echo 'checked';
                $_SESSION['radio_admin_ad'] = 'rejected_ads';
                } ?>>Rejected Ads</label>

                
                
                </form>        
                </div>
                
                <?php endif?> 
                <?php if (!empty($data['emptydata'])) : ?>
                        <div class="error-msg-container">
                                <span class="error_msg"><?php echo $data['emptydata']; ?></span>
                        </div>
                <?php endif; ?>
                
                
                <div class="order_list">
                <div class="orders">
                
                <table class="order_list_table">
                <?php if(empty($data['emptydata'])){ ?>
                        <tr class="table_head">
                                <td>Image</td>
                                <td>Title</td>
                                <td>Description</td>
                                <td>Category</td>
                                <td>Manufacturer</td>
                                <td>Unit Price</td>
                                <td>Quantity</td>
                                <td>Options</td>
                        </tr>
                        <?php    }  ?> 
                        <?php foreach($data['products'] as $products): ?>
                       
                        <tr class="order">
                                <div class="order_detail">
                              
                                <td><img src="<?php echo URLROOT;?>/public/upload/fertilizer_images/<?php echo $products->listing_image?>" class="add_image"></td>
                                
                                <td><span class="title"><?php echo (strlen($products->product_name) > 20) ? substr($products->product_name, 0, 20) . "..." : $products->product_name; ?></span></td>
                                <td><span class="title"><?php echo (strlen($products->product_description) > 25) ? substr($products->product_description, 0, 25) . "...[See More]" : $products->product_description; ?></span></td>
                                
                                <td><button class="product_category"><?php echo $products->category ?></button></td>
                                <td><?php echo $products->manufacturer ?></td>
                                <td>Rs.<?php echo $products->price ?></td>
                                <td class="unit"><span class="value"><?php echo $products->quantity ?></span></td>
                              
                                <?php if($products->current_status ==0 ): ?>
                                        <td>
                                        <?php $def_image ='default_upload.png' ?>
                                        <button type="button" id="review_btn" onclick="popUpOpenAdReview('<?php echo $products->product_name ?>','<?php echo $products->listing_image ?>','<?php echo isset($products->img_two) ? $products->img_two : $products->rm_image_two ?>','<?php echo isset($products->img_three) ? $products->img_three : $def_image ?>','<?php echo isset($products->img_four) ? $products->img_four : $def_image ?>','<?php echo isset($products->img_five) ? $products->img_five : $def_image ?>','<?php echo $products->quantity ?>','<?php echo $products->manufacturer ?>','<?php echo $products->price ?>','<?php echo $products->product_description ?>','<?php echo $products->category ?>','<?php echo isset($products->registration_no) ? $products->registration_no : 'No need for Raw Materials' ?>','<?php echo $products->date ?>','<?php echo isset($products->crop_type) ? $products->crop_type : 'No need for Raw Materials' ?>','<?php echo $products->type ?>','<?php echo $products->seller_name ?>','<?php echo $products->avg_rating ?>','<?php echo isset($products->location) ? $products->location : 'No need for Raw Materials' ?>')" ><i class="fa-solid fa-check-double"></i> Review</button><br>
                                        
                                        <button id="reject_btn" onclick="openRejectDialog()" ><i class="fa-solid fa-registered"></i> Reject Ad</button>

                                        <dialog id="reject-dialog">
                                        <form method="POST">
                                        <label class="reject_popup_labels" for="reason-select">Reason for rejection:</label>
                                        <select id="reason-select" name="reason">
                                        <option value="Inappropriate content">Inappropriate content</option>
                                        <option value="False information">False information</option>
                                        <option value="Poor quality images">Poor quality images</option>
                                        <option value="Pricing not competitive">Pricing not competitive</option>
                                        <option value="Misleading product description">Misleading product description</option>
                                        <option value="Incomplete product details">Incomplete product details</option>
                                        <option value="Other">Other</option>
                                        </select>
                                        <br>
                                        <label for="reason-details" class="reject_popup_labels">More details:</label>
                                        <textarea id="reason-details" name="more_detail" rows="10"></textarea>
                                        <input type="hidden" id="reason-details" value="<?php echo $products->seller_email?>" name="seller_email">
                                        <input type="hidden" id="reason-details" value="<?php echo $products->category?>" name="seller_category">
                                        <input type="hidden" id="reason-details" value="<?php echo $products->seller_name ?>" name="seller_name">
                                        <input type="hidden" id="reason-details" value="<?php echo $products->Product_id?>" name="seller_productId">


                                        <br>
                                        <button type="submit" id="reject_btn_popup" formaction="<?php echo URLROOT?>/Admin_ad_management/adminRejectAd/">Reject</button>
                                        </form>
                                        <button id="reject-dialog-close" type="button" ><i class="fa-regular fa-circle-xmark"></i></button>
                                        </dialog>

                                        <script>
                                                const rejectDialog = document.querySelector("#reject-dialog");
                                                        const rejectDialogCloseBtn = document.querySelector("#reject-dialog-close");

                                                        function openRejectDialog() {

                                                        rejectDialog.showModal();
                                                        }

                                                        function closeRejectDialog() {
                                                        rejectDialog.close();
                                                        }

                                                        rejectDialogCloseBtn.addEventListener("click", closeRejectDialog);

                                        </script>
                                        <!-- Dialog box -->
                                        <dialog id="ad-details">
                                        <div class="ad-details">

                                        <h2>Advertisement Details</h2>
                                        <form method="POST">
                                        <div class="form-group">
                                                <label for="product-name">Product Title:</label>
                                                <input type="text" id="product-name" name="product-name" readonly>
                                        </div>

                                        <div class="form-group">
        
                                                <label>Product Images:</label>
                                                <div class="product-images">
                                                <img id="image_one" class="product-image img-container" src="" alt="Product Image">
                                                <img id="image_two" class="product-image img-container" src="" alt="Product Image">
                                                <img id="image_three" class="product-image img-container" src="" alt="Product Image">
                                                <img id="image_four" class="product-image img-container" src="" alt="Product Image">
                                                <img id="image_five" class="product-image img-container" src="" alt="Product Image">
                                                </div>
                                                <script>
                                                        // Get the popup elements
                                                        var popupContainer = document.querySelector(".popup-container");
                                                        var popupImage = document.querySelector("#popup-image");
                                                        var closeBtn = document.querySelector(".close-button");

                                                        // Get the product image elements
                                                        var productImages = document.querySelectorAll(".product-image");

                                                        // Add event listener for each product image
                                                        for (var i = 0; i <productImages.length; i++) {
                                                        productImages[i].addEventListener("click", function() {
                                                        // Get the source of the clicked image and set it as the source of the popup image
                                                        var src = this.src;
                                                        popupImage.src = src;

                                                        // Show the popup
                                                        popupContainer.style.display = "block";
                                                        });
                                                        }

                                                        // Add event listener for close button
                                                        closeBtn.addEventListener("click", function() {
                                                        // Hide the popup
                                                        popupContainer.style.display = "none";
                                                        });

                                                </script>
                                                <div class="popup-container">
                                                <div class="popup-image-container">
                                                <img id="popup-image" class="popup-image" src="" alt="Popup Image">
                                                <span class="close-button">&times;</span>
                                                </div>
                                                </div>

                                                

                                        </div>


                                 
                                        <div class="form-group">
                                                <label for="product-quantity">Product Quantity:</label>
                                                <input type="text" id="product-quantity" name="product-quantity" readonly>
                                        </div>
                                        <div class="form-group">
                                                <label for="manufacturer-name">Manufacturer Name:</label>
                                                <input type="text" id="manufacturer-name" name="manufacturer-name" readonly>
                                        </div>
                                        <div class="form-group">
                                                <label for="product-price">Product Price:</label>
                                                <input type="text" id="product-price" name="product-price" readonly>
                                        </div>
                                        <div class="form-group">
                                                <label for="product-description">Product Description:</label>
                                                <textarea id="product-description" name="product-description" rows="20000" readonly></textarea>
                                        </div>
                                        <div class="form-group">
                                                <label for="product-category">Product Category:</label>
                                                <input type="text" id="product-category" name="product-category" readonly>
                                        </div>
                                        <div class="form-group">
                                                <label for="regsitration-no">Registration No:</label>
                                                <input type="text" id="regsitration-no" name="regsitration-no" readonly>
                                        </div>
                                        <div class="form-group">
                                                <label for="product-date">Product Date:</label>
                                                <input type="text" id="product-date" name="product-date" readonly>
                                        </div>

                                        <div class="form-group">
                                                <label for="crop_type">Crop Type:</label>
                                                <input type="text" id="crop_type" name="crop_type" readonly>
                                        </div>

                                        <div class="form-group">
                                                <label for="product-type">Type:</label>
                                                <input type="text" id="product-type" name="product-type" readonly>
                                        </div>

                                        <div class="form-group">
                                                <label for="seller_name">Seller Full Name:</label>
                                                <input type="text" id="seller_name" name="seller_name" readonly>
                                        </div>

                                        <div class="form-group">
                                                <label for="rating">Seller Rating:</label>
                                                <input type="text" id="rating" name="rating" readonly>
                                        </div>

                                        <div class="form-group">
                                                <label for="product-location">Product Location:</label>
                                                <input type="text" id="product-location" name="product-location" readonly>
                                        </div>
                                        
                                        <!-- <div class="form-group">
                                        <label for="rejected-reason">Reason for rejection:</label>
                                        <input type="text" id="rejected-reason" name="rejected-reason">
                                        </div> -->
                                 
                                        <div class="btn-group">
                                                                  
                                                
                                        <button type="submit" class="btn" id="ad-review-btn" formaction="<?php echo URLROOT?>/Admin_ad_management/adminReviewAd/<?php echo $products->Product_id ?>?category=<?php echo $products->category ?>">Accept</button>
                                        <button type="button" class="btn" id="clc" onclick="document.getElementById('ad-details').close()">Close</button>
                                         <!-- <button type="submit" class="btn" id="reject-btn" formaction="<?php echo URLROOT?>/Admin_ad_management/adminRejectAd/<?php echo $products->Product_id ?>?category=<?php echo $products->category ?>">Reject</button> -->
                                         <!-- <button type="submit" class="btn" id="reject-btn"  formaction="<?php echo URLROOT?>/Admin_ad_management/adminRejectAd/<?php echo $products->Product_id ?>?category=<?php echo $products->category ?>">Reject</button> -->
                                                                  
                                        </div>
                                        </form>
                                        
                                        </div>
                                        </dialog>
                                        

                                        </td>
                                        <?php elseif($products->current_status == 1 || $products->current_status == 2): ?>
                                        <td>
                                        <button type="button" onclick="popUpOpenViewMore('<?php echo $products->product_name ?>','<?php echo $products->listing_image ?>','<?php echo $products->img_two ?>','<?php echo $products->img_three ?>','<?php echo $products->img_four ?>','<?php echo $products->img_five ?>','<?php echo $products->quantity ?>','<?php echo $products->manufacturer ?>','<?php echo $products->price ?>','<?php echo $products->product_description ?>','<?php echo $products->category ?>','<?php echo isset($products->registration_no) ? $products->registration_no : 'No need for Raw Materials' ?>','<?php echo $products->date ?>','<?php echo $products->crop_type ?>','<?php echo $products->type ?>','<?php echo $products->seller_name ?>','<?php echo $products->avg_rating ?>','<?php echo isset($products->location) ? $products->location : 'No need for Raw Materials' ?>')" id="ad_view_more_btn"><i class="fa-solid fa-circle-info"></i> View More</button>
                                            <!-- Dialog box -->
                                        <dialog id="ad-details">
                                        <div class="ad-details">

                                        <h2>Advertisement Details</h2>
                                        <form method="POST">
                                        <div class="form-group">
                                                <label for="product-name">Product Title:</label>
                                                <input type="text" id="product-name" name="product-name" readonly>
                                        </div>

                                        <div class="form-group">
                                        <label>Product Images:</label>
                                                <div class="product-images">
                                                <img id="image_one" class="product-image img-container" src="" alt="Product Image">
                                                <img id="image_two" class="product-image img-container" src="" alt="Product Image">
                                                <img id="image_three" class="product-image img-container" src="" alt="Product Image">
                                                <img id="image_four" class="product-image img-container" src="" alt="Product Image">
                                                <img id="image_five" class="product-image img-container" src="" alt="Product Image">
                                                </div>
                                                <script>
                                                        // Get the popup elements
                                                        var popupContainer = document.querySelector(".popup-container");
                                                        var popupImage = document.querySelector("#popup-image");
                                                        var closeBtn = document.querySelector(".close-button");

                                                        // Get the product image elements
                                                        var productImages = document.querySelectorAll(".product-image");

                                                        // Add event listener for each product image
                                                        for (var i = 0; i < productImages.length; i++) {
                                                        productImages[i].addEventListener("click", function() {
                                                        // Get the source of the clicked image and set it as the source of the popup image
                                                        var src = this.src;
                                                        popupImage.src = src;

                                                        // Show the popup
                                                        popupContainer.style.display = "block";
                                                        });
                                                        }

                                                        // Add event listener for close button
                                                        closeBtn.addEventListener("click", function() {
                                                        // Hide the popup
                                                        popupContainer.style.display = "none";
                                                        });

                                                </script>
                                                <div class="popup-container">
                                                <div class="popup-image-container">
                                                <img id="popup-image" class="popup-image" src="" alt="Popup Image">
                                                <span class="close-button">&times;</span>
                                                </div>
                                                </div>


                                        </div>

                                        <div class="form-group">
                                                <label for="product-quantity">Product Quantity:</label>
                                                <input type="text" id="product-quantity" name="product-quantity" readonly>
                                        </div>
                                        <div class="form-group">
                                                <label for="manufacturer-name">Manufacturer Name:</label>
                                                <input type="text" id="manufacturer-name" name="manufacturer-name" readonly>
                                        </div>
                                        <div class="form-group">
                                                <label for="product-price">Product Price:</label>
                                                <input type="text" id="product-price" name="product-price" readonly>
                                        </div>
                                        <div class="form-group">
                                                <label for="product-description">Product Description:</label>
                                                <textarea id="product-description" name="product-description" rows="5" readonly></textarea>
                                        </div>
                                        <div class="form-group">
                                                <label for="product-category">Product Category:</label>
                                                <input type="text" id="product-category" name="product-category" readonly>
                                        </div>
                                        <div class="form-group">
                                                <label for="regsitration-no">Registration No:</label>
                                                <input type="text" id="regsitration-no" name="regsitration-no" readonly>
                                        </div>
                                        <div class="form-group">
                                                <label for="product-date">Product Date:</label>
                                                <input type="text" id="product-date" name="product-date" readonly>
                                        </div>

                                        <div class="form-group">
                                                <label for="crop_type">Crop Type:</label>
                                                <input type="text" id="crop_type" name="crop_type" readonly>
                                        </div>

                                        <div class="form-group">
                                                <label for="product-type">Type:</label>
                                                <input type="text" id="product-type" name="product-type" readonly>
                                        </div>

                                        <div class="form-group">
                                                <label for="seller_name">Seller Full Name:</label>
                                                <input type="text" id="seller_name" name="seller_name" readonly>
                                        </div>

                                        <div class="form-group">
                                                <label for="rating">Seller Rating:</label>
                                                <input type="text" id="rating" name="rating" readonly>
                                        </div>

                                        <div class="form-group">
                                                <label for="product-location">Product Location:</label>
                                                <input type="text" id="product-location" name="product-location" readonly>
                                        </div>
                                 
                                        <div class="btn-group">
                                                                  
                                                
                                      
                                        <button type="button" class="btn" id="clc" onclick="document.getElementById('ad-details').close()">Close</button>

                                                                  
                                        </div>
                                        </form>
                                        
                                        </div>
                                        </dialog>
                                        
                                        </td>
                                   
                                    <?php endif?> 
  

                               
                       
                                </div>

                        </tr>
                                 
                   <?php endforeach;?>
                   <?php }else{ ?>
                        <div class="error-msg-container">
                           <span class="error-msg"><?php echo $data['message']; ?></span>
                        </div>
                   <?php    }  ?> 

                </table>

        
                </div>
        </div>
        </div>
       </div>

       <!-- <?php if ($data['search'] === 'Search by title of the advertisement') : ?>
       
       <div class="pagination-container text-center">
<?php if ($data['pagination']['total_pages'] > 1) : ?>
<div class="pagination">
   <?php if ($data['pagination']['current_page'] > 1) : ?>
       <a href="?page=<?php echo $data['pagination']['current_page'] - 1; ?>&ad_type=<?php echo isset($_GET['ad_type']) ? $_GET['ad_type'] : $_SESSION['radio_admin_ad']; ?>">Previous</a>
   <?php endif; ?>

   <?php for ($i = 1; $i <= $data['pagination']['total_pages']; $i++) : ?>
       <?php if ($i == $data['pagination']['current_page']) : ?>
           <span class="current-page"><?php echo $i; ?></span>
       <?php else : ?>
           <a href="?page=<?php echo $i; ?>&ad_type=<?php echo isset($_GET['ad_type']) ? $_GET['ad_type'] : $_SESSION['radio_admin_ad']; ?>"><?php echo $i; ?></a>
       <?php endif; ?>
   <?php endfor; ?>

   <?php if ($data['pagination']['current_page'] < $data['pagination']['total_pages']) : ?>
       <a href="?page=<?php echo $data['pagination']['current_page'] + 1; ?>&ad_type=<?php echo isset($_GET['ad_type']) ? $_GET['ad_type'] : $_SESSION['radio_admin_ad']; ?>">Next</a>
   <?php endif; ?>
</div>
<?php endif; ?>
   </div>

   <?php endif; ?> -->

         </div>
        <div class="section_3">
                <!-- add forum -->
                
                
        </div>


</div>


<div id="footer">
<?php require APPROOT.'/views/Users/component/footer.php'?>
</div>


<script>
    function clear_search_bar(){
    document.getElementById("searchBar").value = "";
    document.getElementById("cancel").style.display='none';
    window.location.replace("<?php echo URLROOT?>/Admin_ad_management/ad_management_view");
  }
</script>