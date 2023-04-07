

<?php require APPROOT.'/views/Users/component/Header.php'?>
<?php require APPROOT.'/views/Seller/Seller/seller_topnavbar.php'?>
<?php require APPROOT.'/views/Seller/Seller/seller_sidebar.php'?>
<link rel="stylesheet" href="../css/seller/seller_add_advertisment.css"></link>
<div class="body">
    <div class="section_1">

    </div>
    <div class="section_2">
        &nbsp<div class="a_add_admin_maincontent">
          &nbsp<div class="add_container">
            <div class="title">Add advertisment</div>
            <div class="add_content">
              <form action="<?php echo URLROOT?>/seller_ad_management/Update_advertisment" method="POST" enctype="multipart/form-data">

                <div class="advertisment-details">
                <i class="fa-solid fa-image" id="uploard_image"></i>
                  <!-- <input type="file"></input> -->
                  <br><br>
                  <div class="input-box">
                    <span class="details">Name of the product</span>
                    <input type="text" name="product_name" value="<?php echo $data['fertilizer_details']->product_name; ?>" required>
                  </div>
                  
                  <div class="input-box">
                    <span class="details">Category</span>
                    <select name="category" id="category" >
                      
                              <option value="Paddy" <?php if($data['fertilizer_details']->category == 'Paddy') echo ' selected';?>>Paddy</option>
                              <option value="Vegetables" <?php if($data['fertilizer_details']->category == 'Vegetables') echo ' selected';?>>Vegetables</option>
                              <option value="Tea" <?php if($data['fertilizer_details']->category == 'Tea') echo ' selected';?>>Tea</option>
                              <option value="Coconut" <?php if($data['fertilizer_details']->category == 'Coconut') echo ' selected';?>>Coconut</option>
                              <option value="Flowers" <?php if($data['fertilizer_details']->category == 'Flower') echo ' selected';?>>Flowers</option>
                              <option value="Rubber" <?php if($data['fertilizer_details']->category == 'Rubber') echo ' selected';?>>Rubber</option>
                              <option value="Othercrops" <?php if($data['fertilizer_details']->category == 'Othercrops') echo ' selected';?>>Other Crops</option>
                    </select>
                </div>

                  <div class="input-box">
                    <span class="details">Certificate Number</span>
                    <input type="text" name="certificate_no" value="<?php echo $data['fertilizer_details']->certificate_no; ?>" required>
                  </div>
                  <div class="input-box">
                    <span class="details">Manufacturer</span>
                    <input type="text" name="manufacturer" value="<?php echo $data['fertilizer_details']->manufacturer; ?>" required>
                  </div>
                  <div class="input-box">
                    <span class="details">Description</span>
                    <input type="text" name="description" value="<?php echo $data['fertilizer_details']->product_description; ?>" required>
                  </div>
                  <div class="input-box">
                    <span class="details">Price</span>
                    <input type="text" name="price" value="<?php echo $data['fertilizer_details']->price; ?>" required>
                  </div>
                  <div class="input-box">
                    <span class="details">Quantity</span>
                    <input type="text" name="quantity" value="<?php echo $data['fertilizer_details']->quantity; ?>" required>
                  </div>

                  <div class="input-box">
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