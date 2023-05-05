<?php require APPROOT.'/views/Users/component/Header.php'?>
<?php require APPROOT.'/views/Raw_material_supplier/Raw_material_supplier/supplier_topnavbar.php'?>
<?php require APPROOT.'/views/Raw_material_supplier/Raw_material_supplier/supplier_Sidebar.php'?>
<link rel="stylesheet" href="../css/Raw_material_supplier/ad_management/ad_management.css"></link>
<script src="../js/Raw_material_supplier/ad_management/ad_manage.js"></script>
<!-- <script src="../js/Raw_material_supplier/ad_delete/ad_delete.js"></script>  -->

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


                <div class="filter_section">
                <form method ="POST" action="<?php echo URLROOT?>/supplier_ad_management/indexfilter" id="filter_form">

                        <label for="all" id="filter_label"> <input type="radio" id="all" name="current_status"  onclick="javascript:submit()" value = "all"<?php if (isset($_POST['current_status']) && $_POST['current_status'] == 'all') echo ' checked="checked"';?> checked>All</label>
                        <br><label for="admins" id="filter_label"> <input type="radio" id="admins" name="current_status" value="Pending" onclick="javascript:submit()"  value = "Pending"<?php if (isset($_POST['current_status']) && $_POST['current_status'] == 'Pending') echo ' checked="checked"';?>>Pending</label>
                        <br><label for="customers" id="filter_label"><input type="radio" id="customers" name="current_status" value="Accepted" onclick="javascript:submit()"  value = "Accepted"<?php if (isset($_POST['current_status']) && $_POST['current_status'] == 'Accepted') echo ' checked="checked"';?>>Accepted</label>
                        <br><label for="sellers" id="filter_label"><input type="radio" id="sellers" name="current_status" value="Rejected" onclick="javascript:submit()"  value = "Rejected"<?php if (isset($_POST['current_status']) && $_POST['current_status'] == 'Rejected') echo ' checked="checked"';?>>Rejected</label>
                        <br><label for="suppliers" id="filter_label"><input type="radio" id="suppliers" name="current_status" value="Expired" onclick="javascript:submit()"  value = "Expired"<?php if (isset($_POST['current_status']) && $_POST['current_status'] == 'Expired') echo ' checked="checked"';?>>Expired</label>
                        <br>
                </form>
                </div>










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
                                        <td>
                                                <?php if($ad->raw_material_image != null): ?>
                                                        <img src="<?php echo URLROOT;?>/img/postsImgs/<?php echo $ad->raw_material_image;?>" alt="non" id="fertilizer_img" >
                                                <?php endif; ?>
                                        </td>
                                        <td><span class="title"><?php echo $ad->product_name ?></span></td>
                                        <td><span class="category"><?php echo $ad->price ?></span></td>

                                        <td><span class="certificate No<"><?php echo $ad->quantity ?></span></td>

                                        <td><span class="manufacture"><?php echo $ad->product_description ?></span></td>


                                        <td id="option">
                                                
                                                <span class="edit"><a href="<?php echo URLROOT?>/supplier_ad_management/update_advertisement/<?php echo $ad->Product_id ?>"><i class="fa-solid fa-pen-to-square"></i></a></span>                                                
                                                

                                                <form method="GET">
                                                <span class="delete"><button type="button" onclick="popUpOpenDelete('<?php echo $ad->Product_id ?>')" id="deactive_user_button-<?php echo $ad->Product_id ?>"><i class="fa-solid fa-trash-can"></i></button></span>
                                                <dialog id="deactivateUserPopup-<?php echo $ad->Product_id ?>">
                                                        <div class="deactivateUserPopup">
                                                                <div class="dialog__heading">
                                                                        <h2>Are you sure you want to delete this ?</h2>
                                                                        <button id="closebtntwo-<?php echo $ad->Product_id ?>" type="button">
                                                                                <i class="fa fa-times-circle" aria-hidden="true"></i>
                                                                        </button>
                                                                </div>
                                                                
                                                                <div class="dialog__content">
                                                                        <a href="<?php echo URLROOT?>/supplier_ad_management/delete_advertisement/<?php echo $ad->Product_id ?>" id="yes">Yes</a>
                                                                        <a href="<?php echo URLROOT?>/supplier_ad_management/indexfilter " id="no">No</a>
                                                                </div>
                                                        </div>
                                                </dialog>
                                                </form>
                                                
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

















