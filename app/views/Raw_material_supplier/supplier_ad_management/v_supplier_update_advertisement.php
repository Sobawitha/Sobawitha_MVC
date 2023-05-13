


<?php require APPROOT.'/views/Users/component/Header.php'?>
<?php require APPROOT.'/views/Raw_material_supplier/Raw_material_supplier/supplier_topnavbar.php'?>
<?php require APPROOT.'/views/Raw_material_supplier/Raw_material_supplier/supplier_Sidebar.php'?>
<link rel="stylesheet" href="<?php echo URLROOT ?>/public/css/Raw_material_supplier/ad_management/update_advertisement.css"></link>
<div class="body">
    <div class="section_1">

    </div>
    <div class="section_2">
        &nbsp<div class="a_add_admin_maincontent">
          &nbsp<div class="add_container">
            <div class="title">Update advertisment</div>
            <div class="add_content">
              <form action="<?php echo URLROOT;?>/supplier_ad_management/update_advertisement/<?php echo $data['product_id']; ?>" method="POST" enctype="multipart/form-data">

                <div class="advertisment-details">
                  <div class="image_container">
                    
                  <div class="">
                    <div class="post-image1">
                      <?php if($data['image_name1'] != null): ?>
                        <img src="<?php echo URLROOT;?>/img/postsImgs/<?php echo $data['image_name1']; ?>" alt="" id="image_placeholder1">
                      <?php else: ?>
                        <img src="" alt="" id="image_placeholder1" style="display: none;">
                      <?php endif; ?>
                    </div>
                    <div class="right1">
                        <img src="<?php echo URLROOT; ?>/img/components/posts/browse-image.png" alt="" id="addImagebtn1" onclick="toggleBrowse1()">
                        <img src="<?php echo URLROOT; ?>/img/components/posts/remove-image.png" alt="" id="removeImagebtn1" style="display:none;" onclick="removeImage1()">
                        <input type="text" name="intentially_removed1" id="intentially_removed1" style="display: none;" readonly>
                        <input type="file" name="image1" id="image1" style="display: none;">
                    </div>
                  </div>

                  <div class="">
                    <div class="post-image2">
                      <?php if($data['image_name2'] != null): ?>
                        <img src="<?php echo URLROOT;?>/img/postsImgs/<?php echo $data['image_name2']; ?>" alt="" id="image_placeholder2">
                      <?php else: ?>
                        <img src="" alt="" id="image_placeholder2" style="display: none;">
                      <?php endif; ?>
                    </div>
                    <div class="right2">
                        <img src="<?php echo URLROOT; ?>/img/components/posts/browse-image.png" alt="" id="addImagebtn2" onclick="toggleBrowse2()">
                        <img src="<?php echo URLROOT; ?>/img/components/posts/remove-image.png" alt="" id="removeImagebtn2" style="display:none;" onclick="removeImage2()">
                        <input type="text" name="intentially_removed2" id="intentially_removed2" style="display: none;" readonly>
                        <input type="file" name="image2" id="image2" style="display: none;">
                    </div>
                  </div>


                  <div class="">        
                    <div class="post-image3">
                      <?php if($data['image_name3'] != null): ?>
                        <img src="<?php echo URLROOT;?>/img/postsImgs/<?php echo $data['image_name3']; ?>" alt="" id="image_placeholder3">
                      <?php else: ?>
                        <img src="" alt="" id="image_placeholder3" style="display: none;">
                      <?php endif; ?>
                    </div>
                    <div class="right3">
                        <img src="<?php echo URLROOT; ?>/img/components/posts/browse-image.png" alt="" id="addImagebtn3" onclick="toggleBrowse3()">
                        <img src="<?php echo URLROOT; ?>/img/components/posts/remove-image.png" alt="" id="removeImagebtn3" style="display:none;" onclick="removeImage3()">
                        <input type="text" name="intentially_removed3" id="intentially_removed3" style="display: none;" readonly>
                        <input type="file" name="image3" id="image3" style="display: none;">
                    </div>
                  </div>
                  </div>
                  <p>Cover Image</p>
                  <span class="error_msg"><?php echo $data['image_err1'] ?></span>
                  





                <!-- <i class="fa-solid fa-image" id="uploard_image"></i> -->
                  <!-- <input type="file"></input> -->
                  <br><br>
                  <div class="input-box">
                    <span class="details">Title of the listing with unit weight</span>
                    <input type="text" name="name" placeholder="" value="<?php echo $data['product_name']; ?>" required>
                    <span class="error_msg"><?php echo $data['product_name_err'] ?></span>
                  </div>

                  <div class="input-box">
                    <div class="text_filed">
                      <span class="details">Unit Price (Rs.)</span>
                    </div>

                  <div class="input_box">
                    <input type="text" name="price" placeholder="Enter unit price" value="<?php echo $data['price']; ?>" required>
                    <span class="error_msg"><?php echo $data['price_err'] ?></span>
                  </div>
                  </div>
                  
                  <!-- <div class="input-box unit">
                    <span class="details">per</span>
                    <select name="category" id="category">
                              <option value="mg">mg</option>
                              <option value="g">g</option>
                              <option value="kg">kg</option>
                              <option value="ml">ml</option>
                              <option value="l">l</option>
                              <option value="packet">packets</option>
                              <option value="others">others</option>
                    </select>
                </div> -->

                  <div class="input-box">
                    <span class="details">Type</span>
                    <!-- <input type="text" name="type" placeholder="" value="" required> -->
                    <select name="type" value="" id="category" required>
                              <option value="Solid" <?php if($data['type'] == 'Solid') echo 'selected'; ?>>Solid</option>
                              <option value="Liquid" <?php if($data['type'] == 'Liquid') echo 'selected'; ?>>Liquid</option>
                    </select>
                    <span class="error_msg"><?php echo $data['type_err'] ?></span>
                  </div>
                  <div class="input-box">
                    <span class="details">Manufacturer</span>
                    <input type="text" name="manufacturer" placeholder="" value="<?php echo $data['manufacturer']; ?>" required>
                    <span class="error_msg"><?php echo $data['manufacturer_err'] ?></span>
                  </div>
                  <div class="input-box">
                    <span class="details">Available quantity</span>
                    <div class="input-box">
                      <input type="text" name="quantity" placeholder="" value="<?php echo $data['quantity']; ?>" required>
                      <span class="error_msg"><?php echo $data['quantity_err'] ?></span>
                      
                    </div>
                  </div>

                  <div class="input-box">
                    <span class="details">Additional information</span>
                    <textarea
                      id="additional-info"
                      name="additional-info"
                      style="height: 200px"
                    ><?php echo $data['product_description']; ?></textarea>
                    <span class="error_msg"><?php echo $data['product_description_err'] ?></span>
                  </div>
                </div>


                <div class="input-box">
                  <input type="submit" value="Publish" id="publish_btn">
                </div>

              </form>
            </div>
          </div>
        </div>
    </div>

    <div class="last">

    </div>
</div>


<!-- javascript for posts -->
<script type="text/JavaScript" src="<?php echo URLROOT;?>/public/js/Raw_material_supplier/ad_management/ad_update.js" ></script>