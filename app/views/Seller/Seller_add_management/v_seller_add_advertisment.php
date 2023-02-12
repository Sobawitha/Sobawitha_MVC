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
              <form action="#">

                <div class="advertisment-details">
                <i class="fa-solid fa-image" id="uploard_image"></i>
                  <!-- <input type="file"></input> -->
                  <br><br>
                  <div class="input-box">
                    <span class="details">Name of the product</span>
                    <input type="text" placeholder="Enter name of the product" required>
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
                    <span class="details">Cirtificate Number</span>
                    <input type="text" placeholder="" required>
                  </div>
                  <div class="input-box">
                    <span class="details">Manufacture</span>
                    <input type="text" placeholder="" required>
                  </div>
                  <div class="input-box">
                    <span class="details">Discription</span>
                    <input type="text" placeholder="" required>
                  </div>
                  <div class="input-box">
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


