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
        <form class="searchForm" action="<?php echo URLROOT;?>/Admin_ad_management/adminSearchAd" method="GET">
        <div class="search_bar">
            <div class="search_content">
                
                    <span class="search_cont" onclick="open_cancel_btn()"><input type="text" name="search" placeholder="<?php echo $data['search'] ?>" id="searchBar" require/></span>
                    <button type="submit" class="search_btn" onclick="clear_search_bar()"><i class="fa-solid fa-xmark" id="cancel" ></i></button>
                    <button type="submit" class="search_btn"  onclick="open_cancel_btn()" ><i class="fa fa-search" aria-hidden="true" id="search"></i></button>
                
            </div>
        </div>
        </form>
        <?php if(empty($data['message'])){ ?>
                <?php if($data['search'] ==='Search by title of the advertisement'): ?>
               
                <div class="filter_section">
                <div class="radio-buttons"  id="radioButtons">        
                <form method ="POST" action="<?php echo URLROOT?>/Admin_ad_management/ad_management_view" id="filter_form">
                <label for="pending_ads" id="filter_label"> <input type="radio" id="pending_ads" name="ad_type" onclick="javascript:submit()" value="pending_ads" <?php if (isset($_POST['ad_type']) && $_POST['ad_type'] == 'pending_ads') echo ' checked="checked"';?> checked>Pending Ads</label>
                <label for="reviewed_ads" id="filter_label"> <input type="radio" id="reviewed_ads" name="ad_type" value="reviewed_ads" onclick="javascript:submit()" value = "reviewed_ads"<?php if (isset($_POST['ad_type']) && $_POST['ad_type'] == 'reviewed_ads') echo ' checked="checked"';?>>Reviewed Ads</label>
                <label for="rejected_ads" id="filter_label"> <input type="radio" id="rejected_ads" name="ad_type" value="rejected_ads" onclick="javascript:submit()" value = "rejected_ads"<?php if (isset($_POST['ad_type']) && $_POST['ad_type'] == 'rejected_ads') echo ' checked="checked"';?>>Rejected Ads</label>
                <div class="radio-buttons">
                </form>        
                </div>
                <?php endif?> 
                <span class="error_msg"><?php echo $data['emptydata'];?></span>  
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
                                <td><?php echo $products->product_name ?></td>
                                <td><?php echo $products->product_description ?></td>
                                <td><button class="product_category"><?php echo $products->category ?></button></td>
                                <td><?php echo $products->manufacturer ?></td>
                                <td>Rs.<?php echo $products->price ?></td>
                                <td class="unit"><span class="value"><?php echo $products->quantity ?></span></td>
                              
                                <?php if($products->current_status ==0 ): ?>
                                        <td>
                                        <button type="button" id="review_btn" onclick="popUpOpenAdReview('<?php echo $products->product_name ?>','<?php echo $products->listing_image ?>','<?php echo $products->img_two ?>','<?php echo $products->img_three ?>','<?php echo $products->img_four ?>','<?php echo $products->img_five ?>','<?php echo $products->quantity ?>','<?php echo $products->manufacturer ?>','<?php echo $products->price ?>','<?php echo $products->product_description ?>','<?php echo $products->category ?>','<?php echo isset($products->registration_no) ? $products->registration_no : 'No need for Raw Materials' ?>','<?php echo $products->date ?>','<?php echo $products->crop_type ?>','<?php echo $products->type ?>','<?php echo $products->seller_name ?>','<?php echo $products->avg_rating ?>','<?php echo isset($products->location) ? $products->location : 'No need for Raw Materials' ?>')" > Review</button>


                                        
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
                                        <!-- <label>Product Images:</label>
                                                <div class="product-images">
                                                <img id="image_one" class="product-image img-container" src="" alt="Product Image"><br><br>
                                                <img id="image_two" class="product-image img-container" src="" alt="Product Image"><br><br>
                                                <img id="image_three" class="product-image img-container" src="" alt="Product Image"><br><br>
                                                <img id="image_four" class="product-image img-container" src="" alt="Product Image"><br><br>
                                                <img id="image_five" class="product-image img-container" src="" alt="Product Image">
                                                </div> -->
                                        

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
                                        
                                        <!-- <div class="form-group">
                                        <label for="rejected-reason">Reason for rejection:</label>
                                        <input type="text" id="rejected-reason" name="rejected-reason">
                                        </div> -->
                                 
                                        <div class="btn-group">
                                                                  
                                                
                                        <button type="submit" class="btn" id="ad-review-btn" formaction="<?php echo URLROOT?>/Admin_ad_management/adminReviewAd/<?php echo $products->Product_id ?>?category=<?php echo $products->category ?>">Accept</button>
                                        <button type="button" class="btn" id="clc" onclick="document.getElementById('ad-details').close()">Close</button>
                                         <!-- <button type="submit" class="btn" id="reject-btn" formaction="<?php echo URLROOT?>/Admin_ad_management/adminRejectAd/<?php echo $products->Product_id ?>?category=<?php echo $products->category ?>">Reject</button> -->
                                         <button type="submit" class="btn" id="reject-btn"  formaction="<?php echo URLROOT?>/Admin_ad_management/adminRejectAd/<?php echo $products->Product_id ?>?category=<?php echo $products->category ?>">Reject</button>
                                                                  
                                        </div>
                                        </form>
                                        
                                        </div>
                                        </dialog>

                                        </td>
                                    <?php elseif($products->current_status == 1 || $products->current_status == 2): ?>
                                        <td>
                                        <button type="button" onclick="popUpOpenViewMore('<?php echo $products->product_name ?>','<?php echo $products->listing_image ?>','<?php echo $products->img_two ?>','<?php echo $products->img_three ?>','<?php echo $products->img_four ?>','<?php echo $products->img_five ?>','<?php echo $products->quantity ?>','<?php echo $products->manufacturer ?>','<?php echo $products->price ?>','<?php echo $products->product_description ?>','<?php echo $products->category ?>','<?php echo isset($products->registration_no) ? $products->registration_no : 'No need for Raw Materials' ?>','<?php echo $products->date ?>','<?php echo isset($products->location) ? $products->location : 'No need for Raw Materials' ?>')" id="ad_view_more_btn"><i class="fa-solid fa-circle-info"></i> View More</button>
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
                          <span class="error_msg"><?php echo $data['message'];?></span>
                   <?php    }  ?> 

                </table>

                </div>
                </div>
        </div>

        <div class="section_3">
                <!-- add forum -->
                
                
        </div>

</div>

<?php require APPROOT.'/views/Users/component/Header.php'?>