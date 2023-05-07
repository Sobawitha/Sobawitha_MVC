

<?php require APPROOT.'/views/Users/component/Header.php'?>
<?php require APPROOT.'/views/Seller/Seller/seller_topnavbar.php'?>
<?php require APPROOT.'/views/Seller/Seller/seller_sidebar.php'?>
<link rel="stylesheet" href="<?php echo URLROOT ?>/css/seller/seller_add_advertisment.css"></link>
<div class="body">
    <div class="section_1">

    </div>
    <div class="section_2">
        &nbsp<div class="a_add_admin_maincontent">
          &nbsp<div class="add_container">
            <div class="title">Update advertisment</div>
            <div class="add_content">
              <?php $fertilizer_id = $_GET['fertilizer_id'] ; 
              ?>
              <form action="<?php echo URLROOT ?>/seller_ad_management/Update_advertisment?fertilizer_id=<?php echo $fertilizer_id ?>" method="POST" enctype="multipart/form-data">


                <div class="advertisment-details">

                <div class="image-upload-container">
              <label for="image-upload" class="image-upload-label">
                <i class="fa fa-cloud-upload"></i> Choose Images (Max. 5) | First One will be Main Image |
              </label>
              <input type="file" id="image-upload" name="images[]" multiple>
              <div class="image-preview-container">
                
                
                <?php
                $images = array(URLROOT.'/public/upload/fertilizer_images/'.$data['fertilizer_details']->fertilizer_img, URLROOT.'/public/upload/fertilizer_images/'.$data['fertilizer_details']->img_two, URLROOT.'/public/upload/fertilizer_images/'.$data['fertilizer_details']->img_three, URLROOT.'/public/upload/fertilizer_images/'.$data['fertilizer_details']->img_four, URLROOT.'/public/upload/fertilizer_images/'.$data['fertilizer_details']->img_five);
                foreach ($images as $image) {
                  echo '<img src="' . $image . '" class="preview-image">';
                }
              ?>


              </div>
            </div>
             <script>
             const imageUpload = document.getElementById('image-upload');
             const previewContainer = document.querySelector('.image-preview-container');

            imageUpload.addEventListener('change', function() {
              previewContainer.innerHTML = '';
              const files = imageUpload.files;
              if (files.length > 5) {
                alert('You can only upload up to 5 images');
                imageUpload.value = '';
                return;
              }
              for (let i = 0; i < files.length; i++) {
                const file = files[i];
                const imageType = /image.*/;
                if (!file.type.match(imageType)) {
                  alert('Please choose an image file');
                  continue;
                }
                const img = document.createElement('img');
                img.classList.add('preview-image');
                const objectUrl = URL.createObjectURL(file);
                img.src = objectUrl;
            
                previewContainer.appendChild(img);
              }
            });
            imagePreview.addEventListener("click", function(e) {
            if (e.target.classList.contains("remove-image")) {
              e.target.parentNode.remove();
            }
          });

             </script>
                  <!-- <input type="file"></input> -->
                  <br><br>
                  <div class="input-box">
                    <span class="details">Product Name</span>
                    <input type="text" name="product_name" value="<?php echo $data['fertilizer_details']->product_name; ?>" required>
                  </div>
                  
                  <div class="input-box">
                    <span class="details">Crop Type</span>
                    <select name="crop_type" id="crop_type" >
                      
                              <option value="Paddy" <?php if($data['fertilizer_details']->crop_type == 'Paddy') echo ' selected';?>>Paddy</option>
                              <option value="Vegetables" <?php if($data['fertilizer_details']->crop_type == 'Vegetables') echo ' selected';?>>Vegetables</option>
                              <option value="Tea" <?php if($data['fertilizer_details']->crop_type == 'Tea') echo ' selected';?>>Tea</option>
                              <option value="Coconut" <?php if($data['fertilizer_details']->crop_type == 'Coconut') echo ' selected';?>>Coconut</option>
                              <option value="Flowers" <?php if($data['fertilizer_details']->crop_type == 'Flower') echo ' selected';?>>Flowers</option>
                              <option value="Rubber" <?php if($data['fertilizer_details']->crop_type == 'Rubber') echo ' selected';?>>Rubber</option>
                              <option value="Othercrops" <?php if($data['fertilizer_details']->crop_type == 'Othercrops') echo ' selected';?>>Other Crops</option>
                              <option value="Any" <?php if($data['fertilizer_details']->crop_type == 'Any') echo ' selected';?>>Any</option>
                    </select>
                </div>

                  <div class="input-box">
                    <span class="details">Registration Number</span>
                    <input type="text" name="registration_no" value="<?php echo $data['fertilizer_details']->registration_no; ?>" required>
                  </div>
                  <div class="input-box">
                    <span class="details">Manufacturer</span>
                    <input type="text" name="manufacturer" value="<?php echo $data['fertilizer_details']->manufacturer; ?>" required>
                  </div>
                  <div class="input-box">
                    <span class="details">Product Description</span>
                    <textarea name="description"  rows="15" required><?php echo $data['fertilizer_details']->product_description; ?></textarea>
                  </div>
                  <div class="input-box">
                    <span class="details">Unit Price</span>
                    <input type="text" name="price" value="<?php echo $data['fertilizer_details']->price; ?>" required>
                  </div>
                  <div class="input-box">
                    <span class="details">Quantity</span>
                    <input type="text" name="quantity" value="<?php echo $data['fertilizer_details']->quantity; ?>" required>
                  </div>


                  <div class="input-box">
                    <span class="details">Product Type</span>
                    <select name="type" id="type">
                        <option value="Solid" <?php if($data['fertilizer_details']->type == 'Solid') echo ' selected';?>>Solid</option>
                        <option value="Liquid" <?php if($data['fertilizer_details']->type == 'Liquid') echo 'selected'; ?>>Liquid</option>
                    </select>
                  </div>

                  <!-- <div class="input-box">
                    <span class="details">District</span>
                    <select name="location" id="location">
                        <?php
                        $districts = ['Ampara', 'Anuradhapura', 'Badulla', 'Batticaloa','Colombo' ,'Galle', 'Gampaha', 'Hambantota', 'Jaffna', 'Kalutara', 'Kandy', 'Kegalle', 'Kilinochchi', 'Kurunegala', 'Mannar', 'Matale', 'Matara', 'Monaragala','Mullaitivu','Nuwara Eliya','Polonnaruwa','Puttalam','Ratnapura','Trincomalee','Vavuniya'];
                        foreach($districts as $district){
                          ?>
                          <option value="<?php echo $district?>" <?php if($data['fertilizer_details']->location == $district) echo ' selected';?>><?php echo $district?></option>
                          <?php
                        }                        
                        ?>
                          </select>
                  </div> -->
                </div>


                <div class="input-box">
                  <button type="submit" value="submit" id="publish_btn">Submit</button>
                </div>

              </form>
            </div>
          </div>
        </div>
    </div>

    <div class="last">

    </div>
</div>