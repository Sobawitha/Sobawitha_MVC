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
              <form action="<?php echo URLROOT?>/seller_ad_management/add_listing" method="POST" enctype="multipart/form-data">

                <div class="advertisment-details">
                <i class="fa-solid fa-image" id="uploard_image"></i>
                 <div class="input-box">
                    <span class="details">Choose Fertilizer Image</span>
                    <input type="file" id="fertilizer_image" name="fertilizer_img" >
                  </div>
                  <br><br>
                  <div class="input-box">
                    <span class="details">Name of the product</span>
                    <input type="text" name="product_name" placeholder="Enter name of the product" required>
                  </div>
                  
                  <div class="input-box">
                    <span class="details">Category</span>
                    <select name="category" id="category">
                              <option value="Paddy">Paddy</option>
                              <option value="Vegetables">Vegetables</option>
                              <option value="Tea">Tea</option>
                              <option value="Coconut">Coconut</option>
                              <option value="Flowers">Flowers</option>
                              <option value="Rubber">Rubber</option>
                              <option value="Othercrops">Other Crops</option>
                    </select>
                </div>

                  <div class="input-box">
                    <span class="details">Certificate Number</span>
                    <input type="text" name="certificate_no" placeholder="" required>
                  </div>
                  <div class="input-box">
                    <span class="details">Manufacturer</span>
                    <input type="text" name="manufacturer" placeholder="" required>
                  </div>
                  <div class="input-box">
                    <span class="details">Description</span>
                    <input type="text" name="description" placeholder="" required>
                  </div>
                  <div class="input-box">
                    <span class="details">Price</span>
                    <input type="text" name="price" placeholder="" required>
                  </div>
                  <div class="input-box">
                    <span class="details">Quantity</span>
                    <input type="text" name="quantity" placeholder="" required>
                  </div>

                  <!-- <div class="input-box">
                    <span class="details">District</span>
                    <select name="location" id="location">
                              <option value="Ampara">Ampara</option>
                              <option value="Anuradhapura">Anuradhapura</option>
                              <option value="Badulla">Badulla</option>
                              <option value="Batticaloa">Batticaloa</option>
                              <option value="Colombo">Colombo</option>
                              <option value="Galle">Galle</option>
                              <option value="Gampaha">Gampaha</option>
                              <option value="Hambantota">Hambantota</option>
                              <option value="Jaffna">Jaffna</option>
                              <option value="Kalutara">Kalutara</option>
                              <option value="Kandy">Kandy</option>
                              <option value="Kegalle">Kegalle</option>
                              <option value="Kilinochchi">Kilinochchi</option>
                              <option value="Kurunegala">Kurunegala</option>
                              <option value="Mannar">Mannar</option>
                              <option value="Matale">Matale</option>
                              <option value="Matara">Matara</option>
                              <option value="Monaragala">Monaragala</option>
                              <option value="Mullaitivu">Mullaitivu</option>
                              <option value="Nuwaraeliya">Nuwara Eliya</option>
                              <option value="Polonnaruwa">Polonnaruwa</option>
                              <option value="Puttalam">Puttalam</option>
                              <option value="Ratnapura">Ratnapura</option>
                              <option value="Trincomalee">Trincomalee</option>
                              <option value="Vavuniya">Vavuniya</option>

                          </select>
                  </div> -->
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


