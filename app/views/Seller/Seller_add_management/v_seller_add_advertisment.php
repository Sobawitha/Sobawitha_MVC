<?php require APPROOT.'/views/Users/component/Header.php'?>
<?php require APPROOT.'/views/Seller/Seller/seller_topnavbar.php'?>
<?php require APPROOT.'/views/Seller/Seller/seller_sidebar.php'?>
<link rel="stylesheet" href="../css/seller/seller_add_advertisment.css"></link>
<script src="../js/Seller/AdManage/add_mul_images.js"></script>

<div class="body">
    <div class="section_1">

    </div>
    <div class="section_2">
        &nbsp<div class="a_add_admin_maincontent">
          &nbsp<div class="add_container">
            <div class="title">Add Advertisement</div>
            <div class="add_content">
              <form action="<?php echo URLROOT?>/seller_ad_management/add_listing" method="POST" enctype="multipart/form-data">

                <div class="advertisment-details">

              <div class="image-upload-container">
              <label for="image-upload" class="image-upload-label">
                <i class="fa fa-cloud-upload"></i> Choose Images (Max. 5) | First One will be Main Image |
              </label>
              <input type="file" id="image-upload" name="images[]" multiple>
              <div class="image-preview-container"></div>
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

                  <br><br>
                  <div class="input-box">
                    <span class="details">Product Name</span>
                    <input type="text" name="product_name" placeholder="Enter name of the product" required>
                  </div>
                  
                  <div class="input-box">
                    <span class="details">Crop Type</span>
                    <select name="crop_type" id="crop_type">
                              <option value="Paddy">Paddy</option>
                              <option value="Vegetables">Vegetables</option>
                              <option value="Vegetables">Fruits</option>
                              <option value="Tea">Tea</option>
                              <option value="Coconut">Coconut</option>
                              <option value="Flowers">Flowers</option>
                              <option value="Rubber">Rubber</option>
                              <option value="Grass">Grass</option>
                              <option value="Any">Any</option>
                    </select>
                </div>

                  <div class="input-box">
                    <span class="details">Registration Number</span>
                    <input type="text" name="registration_no" placeholder="Enter product registration number" required>
                  </div>
                  <div class="input-box">
                    <span class="details">Manufacturer</span>
                    <input type="text" name="manufacturer" placeholder="Enter Manufacture Name" required>
                  </div>
                  <div class="input-box">
                    <span class="details">Product Description</span>
                    <textarea name="description" placeholder="Enter product description" rows="15" required></textarea>
                  </div>
                  <div class="input-box">
                    <span class="details">Unit Price</span>
                    <input type="text" name="price" placeholder="Enter unit price" required>
                  </div>
                  <div class="input-box">
                    <span class="details">Quantity</span>
                    <input type="text" name="quantity" placeholder="Enter quantity" required>
                  </div>
                  
                  <div class="input-box">
                    <span class="details">Product Type</span>
                    <select name="type" id="type">
                              <option value="Solid">Solid</option>
                              <option value="Liquid">Liquid</option>
                    </select>
                  </div>
               
                </div>


                <div class="input-box">
                  <input type="submit" value="submit" id="publish_btn">
                </div>

              </form>
            </div>
          </div>
        </div>
    </div>

    <div class="last">

    </div>
 
</div>


