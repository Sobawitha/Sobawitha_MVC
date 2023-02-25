<?php require APPROOT.'/views/Users/component/Header.php'?>
<?php require APPROOT.'/views/Raw_material_supplier/Raw_material_supplier/supplier_topnavbar.php'?>
<?php require APPROOT.'/views/Raw_material_supplier/Raw_material_supplier/supplier_Sidebar.php'?>
<link rel="stylesheet" href="../css/Raw_material_supplier/ad_management/ad_management.css"></link>


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
                  
                      <span class="search_cont" onclick="open_cansel_btn()"><input type="text" name="search_text" placeholder="" " require/></span>
                      <button type="submit" class="search_btn" onclick="clear_search_bar()" value=""><i class="fa-solid fa-xmark" id="cansel" ></i></button>
                      <button type="submit" class="search_btn"><i class="fa fa-search" aria-hidden="true" id="search"></i></button>
                  
              </div>
          </div>
          </form>

          <div class="add_new_user_btn">
            <a href="<?php echo URLROOT?>/supplier_ad_management/add_advertisment" onclick ="addNew()" id="add_user_btn"><span class="add_add"><i class="fa-solid fa-plus"></i>&nbsp;Add New Advertisement</span></a>
          </div>
        </div>

                <!-- <div class = "filter_and_add">
                        <div class="sm_filter_section">
                                <label for="ongoing_progress__order" id="sm_filter_label"> <input type="radio" id="ongoing_progress" name="order_type" value="ongoing" checked>Pending</label>
                                <label for="ongoing_ready_order" id="sm_filter_label"> <input type="radio" id="ongoing_ready" name="order_type" value="ongoing">Complete</label>
                                <label for="cancel_order" id="sm_filter_label"><input type="radio" id="cancel" name="order_type" value="cancel">Cancel</label>
                        </div>
                </div> -->
                <div class="sm_view_list">
                <div class="views">

                <table class="sm_view_list_table">
                        <tr class="table_head">
                                <td>Image</td>
                                <td>Name</td>
                                <td>Price(Rs.)</td>
                                <td>Avaiable Quantity</td>
                                <td>Additional Infomation</td>
                                <td>Options</td>
                                <td></td>
                        </tr>

                        <?php foreach($data['posts'] as $ad): ?>
                        <tr class="sm_view">
                                <div class="sm_view_detail">
                                        <td><img src="../public/images/other_image_2.jpg" alt="Girl in a jacket" id="fertilizer_img" ></td>
                                        <td><span class="title"><?php echo $ad->product_name ?></span></td>
                                        <td><span class="category"><?php echo $ad->price ?></span></td>
                                        <td><span class="certificate No<"><?php echo $ad->quantity ?> ml</span></td>
                                        <td><span class="manufacture"><?php echo $ad->product_description ?></span></td>


                                        <td id="option">
                                                
                                                <span class="edit"><a href="<?php echo URLROOT?>/supplier_ad_management/update_advertisment/<?php echo $ad->Product_id ?>"><i class="fa-solid fa-pen-to-square"></i></a></span>
                                                
                                                
                                                <span class="delete"><i class="fa-solid fa-trash-can"></i></span>
                                                
                                        </td>
                                </div>

                        </tr>
                        <?php endforeach; ?>

                        <!-- <tr class="sm_view">
                                <div class="sm_view_detail">
                                        <td><img src="../public/images/background2.jpg" alt="Girl in a jacket" id="fertilizer_img" ></td>
                                        <td><span class="title">Paddy fertilizer</span></td>
                                        <td><span class="category">Paddy</span></td>
                                        <td><span class="certificate No<">PD0001</span></td>
                                        <td><span class="manufacture">ABC producers</span></td>

                                        <td id="option">
                                                
                                                <span class="edit"><i class="fa-solid fa-pen-to-square"></i></span>
                                                
                                                
                                                <span class="delete"><i class="fa-solid fa-trash-can"></i></span>
                                                
                                        </td>
                                </div>
                        </tr>

                                <tr class="sm_view">
                                <div class="sm_view_detail">
                                        <td><img src="../public/images/background9.jpg" alt="Girl in a jacket" id="fertilizer_img" ></td>
                                        <td><span class="title">Paddy fertilizer</span></td>
                                        <td><span class="category">Paddy</span></td>
                                        <td><span class="certificate No<">PD0001</span></td>
                                        <td><span class="manufacture">ABC producers</span></td>

                                        <td id="option">
                                                
                                                <span class="edit"><i class="fa-solid fa-pen-to-square"></i></span>
                                                
                                                
                                                <span class="delete"><i class="fa-solid fa-trash-can"></i></span>
                                                
                                        </td>
                                </div>
                                </tr> -->
                                
                </table>

                </div>
                </div>
        </div>

        <div class="section_3">
                <!-- add forum -->
                
                
        </div>
</div>


<?php require APPROOT.'/views/Users/component/footer.php'?>





















