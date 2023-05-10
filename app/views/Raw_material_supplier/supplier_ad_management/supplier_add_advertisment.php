


<?php require APPROOT . '/views/Users/component/Header.php'?>
<?php require APPROOT . '/views/Raw_material_supplier/Raw_material_supplier/supplier_topnavbar.php'?>
<?php require APPROOT . '/views/Raw_material_supplier/Raw_material_supplier/supplier_Sidebar.php'?>
<link rel="stylesheet" href="../css/Raw_material_supplier/ad_management/ad_advertisment.css"></link>

<!-- <script src="../js/Raw_material_supplier/ad_management/ad_add.js"></script> -->



<div class="body">
    <div class="section_1">

    </div>
    <div class="section_2">
        &nbsp<div class="a_add_admin_maincontent">
          &nbsp<div class="add_container">
            <div class="title">Add advertisment</div>
            <div class="add_content">
              <form action="<?php echo URLROOT ?>/supplier_ad_management/add_advertisment" method="POST" enctype="multipart/form-data">

                <div class="advertisment-details">
                  <div class="image_container">

                  <div class="">
                    <div class="post-image1">
                      <img src="" alt="" id="image_placeholder1" style="display: none;">
                    </div>
                    <div class="right1">
                        <img src="<?php echo URLROOT; ?>/img/components/posts/browse-image.png" alt="" id="addImagebtn1" onclick="toggleBrowse1()">
                        <img src="<?php echo URLROOT; ?>/img/components/posts/remove-image.png" alt="" id="removeImagebtn1" style="display:none;" onclick="removeImage1()">
                        <input type="file" name="image1" id="image1" style="display: none;">
                    </div>
                  </div>


                  <div>  
                    <div class="post-image2">
                      <img src="" alt="" id="image_placeholder2" style="display: none;">
                    </div>
                    <div class="right2">
                        <img src="<?php echo URLROOT; ?>/img/components/posts/browse-image.png" alt="" id="addImagebtn2" onclick="toggleBrowse2()">
                        <img src="<?php echo URLROOT; ?>/img/components/posts/remove-image.png" alt="" id="removeImagebtn2" style="display:none;" onclick="removeImage2()">
                        <input type="file" name="image2" id="image2" style="display: none;">
                    </div>
                  </div>

                  <div class="">  
                    <div class="post-image3">
                      <img src="" alt="" id="image_placeholder3" style="display: none;">
                    </div>
                    <div class="right3">
                        <img src="<?php echo URLROOT; ?>/img/components/posts/browse-image.png" alt="" id="addImagebtn3" onclick="toggleBrowse3()">
                        <img src="<?php echo URLROOT; ?>/img/components/posts/remove-image.png" alt="" id="removeImagebtn3" style="display:none;" onclick="removeImage3()">
                        <input type="file" name="image3" id="image3" style="display: none;">
                    </div>
                  </div>

                  </div>
                  
                  <!-- <input type="file"></input> -->
                  <br><br>
                  <div class="input-box">
                    <span class="details">Title of the listing with unit weight</span>
                    <input type="text" placeholder="Eg:-Egg shells - 200g" name="name" required>
                  </div>

                  <div class="input-box ">
                    <div class="text_filed">
                      <span class="details">Unit Price (Rs.)</span>
                    </div>

                    <div class="input_flex">
                      <input type="text" placeholder="Enter unit price" name="price" required>

                      
                  </div>
                  </div>

                  <div class="input-box">
                    <span class="details">Type</span>
                    <input type="text" placeholder="" name="type" required>
                  </div>
                  <div class="input-box">
                    <span class="details">Manufacturer</span>
                    <input type="text" placeholder="" name="manufacturer" required>
                  </div>
                  <div class="input-box">
                    <span class="details">Available quantity</span><br>
                    <div class="flex_view">
                      <input type="text" placeholder="" name="quantity" required>
                      
                  </div>
                  </div>

                  <div class="input-box">
                    <span class="details">Additional information</span>
                    <textarea
                      id="additional-info"
                      name="additional-info"
                      style="height: 200px"
                    ></textarea>
                  </div>
                  <!-- <div class="input-box">
                    <span class="details">Price</span>
                    <input type="text" placeholder="" >
                  </div>
                  <div class="input-box">
                    <span class="details">Quantity</span>
                    <input type="text" placeholder="Enter your email" required>
                  </div>

                  <div class="input-box">
                    <span class="details">Gender</span>
                    <select name="location" id="location">
                              <option value="ampara">Ampara</option>
                              <option value="anuradhapura">Anuradhapura</option>
                              <option value="badulla">Badulla</option>
                              <option value="batticaloa">Batticaloa</option>
                              <option value="colombo">Colombo</option>
                              <option value="galle">Galle</option>
                              <option value="gampaha">Gampaha</option>
                              <option value="hambantota">Hambantota</option>
                              <option value="jaffna">Jaffna</option>
                              <option value="kalutara">Kalutara</option>
                              <option value="kandy">Kandy</option>
                              <option value="kegalle">Kegalle</option>
                              <option value="kilinochchi">Kilinochchi</option>
                              <option value="kurunegala">Kurunegala</option>
                              <option value="mannar">Mannar</option>
                              <option value="matale">Matale</option>
                              <option value="matara">Matara</option>
                              <option value="monaragala">Monaragala</option>
                              <option value="mullaitivu">Mullaitivu</option>
                              <option value="nuwaraeliya">Nuwara Eliya</option>
                              <option value="polonnaruwa">Polonnaruwa</option>
                              <option value="puttalam">Puttalam</option>
                              <option value="ratnapura">Ratnapura</option>
                              <option value="trincomalee">Trincomalee</option>
                              <option value="vavuniya">Vavuniya</option>

                          </select>
                  </div> -->
                </div>


                <div class="input-box">
                  <input type="submit" value="Publish" id="publish_btn" name="add" >
                </div>

              </form>
            </div>
          </div>
        </div>
    </div>


</div>


<!-- javascript for posts -->
<script type="text/JavaScript" src="<?php echo URLROOT; ?>/js/Raw_material_supplier/ad_management/ad_add.js" ></script>


