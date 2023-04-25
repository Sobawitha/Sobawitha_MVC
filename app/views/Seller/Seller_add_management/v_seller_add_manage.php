<?php require APPROOT.'/views/Users/component/Header.php'?>
<?php require APPROOT.'/views/Seller/Seller/seller_topnavbar.php'?>
<?php require APPROOT.'/views/Seller/Seller/seller_sidebar.php'?>
<link rel="stylesheet" href="../css/seller/seller_ad_management.css"></link>
<script src="../js/Seller/add_advertisment.js"></script>


<body >

<div class="body">
        <div class="section_1">
            
        </div>

        <div class="section_2">

        <h3>Advertisement Management</h3>
        <hr>

        
        <div class="button_section">
          <form method="POST">
          <div class="search_bar">
              <div class="search_content">
                  
                      <span class="search_cont" onclick="open_cansel_btn()"><input type="text" name="search_text" placeholder=" " require/></span>
                      <button type="submit" class="search_btn" onclick="clear_search_bar()" value=""><i class="fa-solid fa-xmark" id="cansel" ></i></button>
                      <button type="submit" class="search_btn"><i class="fa fa-search" aria-hidden="true" id="search"></i></button>
                  
              </div>
          </div>
          </form>

          <div class="add_new_user_btn">
            <a href="<?php echo URLROOT?>/seller_ad_management/add_listing" onclick ="addNew()" id="add_user_btn"><span class="add_add"><i class="fa-solid fa-plus"></i>&nbsp;Add New Advertisement</span></a>
          </div>
        </div>

                <div class = "filter_and_add">
                        <div class="sm_filter_section">
                                <label for="ongoing_progress__order" id="sm_filter_label"> <input type="radio" id="ongoing_progress" name="order_type" value="ongoing" checked>Pending</label>
                                <label for="ongoing_ready_order" id="sm_filter_label"> <input type="radio" id="ongoing_ready" name="order_type" value="ongoing">Complete</label>
                                <label for="cancel_order" id="sm_filter_label"><input type="radio" id="cancel" name="order_type" value="cancel">Cancel</label>
                        </div>




                        
                </div>
                <div class="sm_view_list">
                <div class="views">

                <table class="sm_view_list_table">
                        <tr class="table_head">
                                <td>Image</td>
                                <td>Title</td>
                                <td>Crop Type</td>
                                <td>Certificate No</td>
                                <td>Manufacture</td>
                                <!-- <td>Location</td> -->
                                <td>Quantity</td>
                                <td>Price</td>
                                <td>Options</td>
                                <td></td>
                        </tr>

                        <?php
                                foreach($data['pending_advertisements'] as $pending_fertilizer_advertisement):?>
                                
                                <tr class="sm_view">
                                <div class="sm_view_detail">
                                        <td><img src="./../public/upload/fertilizer_images/<?php echo $pending_fertilizer_advertisement->fertilizer_img?>" alt="fertilizer_image"  id="fertilizer_img"></td>
                                        <td><span class="title"><?php echo $pending_fertilizer_advertisement->product_name ?></span></td>
                                        <td><span class="croptype"><?php echo $pending_fertilizer_advertisement->crop_type?></span></td>
                                        <td><span class="certificate No<"><?php echo $pending_fertilizer_advertisement->registration_no ?></span></td>
                                        <td><span class="manufacture"><?php echo $pending_fertilizer_advertisement->manufacturer ?></span></td>                                        
                                        <td class="quantity"><span class="value"><?php echo $pending_fertilizer_advertisement->quantity ?></span></td>
                                        <td><span class="price">Rs. <?php echo $pending_fertilizer_advertisement->price ?></span></td>


                                        <td id="option">

                                        <a href="<?php echo URLROOT?>/seller_ad_management/Update_advertisment?fertilizer_id=<?php echo $pending_fertilizer_advertisement->Product_id ?>" class="edit"><i class="fa-solid fa-pen-to-square" ></i></a>
                                                
                                                
                                                <span id="delete"><i class="fa-solid fa-trash-can" onclick="popUpOpen(<?php echo $pending_fertilizer_advertisement->Product_id ?>)"></i></span>

                                                <dialog id="deletePopup">
                                                        <div class="deletePopup">
                                                                <div class="delete_dialog_heading">
                                                                <i class="fa-regular fa-circle-xmark"></i>
                                                                <h2>Are you sure</h2>
                                                                <p>You will not be able to recover this image</p>
                                                                </div>

                                                                <div class="dialog_content">
                                                                <form method="POST" action="<?php echo URLROOT?>/seller_ad_management/delete_advertisment">
                                                                <button id="deletebtn" type="submit" value="" name="deleteadvertisment">Delete
                                                                </button>
                                                                <button id="cancelbtn" type="button">Cancel
                                                                </button>
                                                                </form>
                                                                </div>
                                                        </div>
                                                </dialog>
                                                
                                        </td>
                                </div>

                        </tr>

                        <?php endforeach;?>
                                
                </table>

                </div>
                </div>
        </div>

        <div class="section_3">
                <!-- add forum -->
                
                
        </div>
</div>


<?php require APPROOT.'/views/Users/component/footer.php'?>





















