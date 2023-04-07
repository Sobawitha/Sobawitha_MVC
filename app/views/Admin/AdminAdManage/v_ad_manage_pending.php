<link rel="stylesheet" href="<?php echo URLROOT;?>/css/Admin/admin_ad_manage_pending.css"></link>
<?php require APPROOT.'/views/Users/component/Header.php'?>
<?php require APPROOT.'/views/Admin/Admin/admin_topnavbar.php'?>
<?php require APPROOT.'/views/Admin/Admin/admin_sidebar.php'?>
<script src="../js/Admin/Add_management/add_management.js"></script>

<div class="body">
        <div class="section_1">
            
        </div>

        <div class="section_2">

        <h3>Advertisements Management</h3>
        <hr>

        <br><br>
        <form class="searchForm" action="<?php echo URLROOT;?>/Admin_ad_management/adminSearchAd" method="GET">
        <div class="search_bar">
            <div class="search_content">
                
                    <span class="search_cont" onclick="open_cancel_btn()"><input type="text" name="search" placeholder="<?php echo $data['search'] ?>" id="searchBar" require/></span>
                    <button type="submit" class="search_btn" onclick="clear_search_bar()"><i class="fa-solid fa-xmark" id="cancel" ></i></button>
                    <button type="submit" class="search_btn"  onclick="open_cancel_btn()" ><i class="fa fa-search" aria-hidden="true" id="search"></i></button>
                
            </div>
        </div>
        </form>
        <?php if(empty($data['message'])){ ?>
                <?php if($data['search'] ==='Search by title of the advertisement'): ?>
               
                <div class="filter_section">
                <div class="radio-buttons"  id="radioButtons">        
                <form method ="POST" action="<?php echo URLROOT?>/Admin_ad_management/ad_management_view" id="filter_form">
                <label for="pending_ads" id="filter_label"> <input type="radio" id="pending_ads" name="ad_type" onclick="javascript:submit()" value="pending_ads" <?php if (isset($_POST['ad_type']) && $_POST['ad_type'] == 'pending_ads') echo ' checked="checked"';?> checked>Pending Ads</label>
                <label for="reviewed_ads" id="filter_label"> <input type="radio" id="reviewed_ads" name="ad_type" value="reviewed_ads" onclick="javascript:submit()" value = "reviewed_ads"<?php if (isset($_POST['ad_type']) && $_POST['ad_type'] == 'reviewed_ads') echo ' checked="checked"';?>>Reviewed Ads</label>
                <label for="rejected_ads" id="filter_label"> <input type="radio" id="rejected_ads" name="ad_type" value="rejected_ads" onclick="javascript:submit()" value = "rejected_ads"<?php if (isset($_POST['ad_type']) && $_POST['ad_type'] == 'rejected_ads') echo ' checked="checked"';?>>Rejected Ads</label>
                <div class="radio-buttons">
                </form>        
                </div>
                <?php endif?> 

                <div class="order_list">
                <div class="orders">

                <table class="order_list_table">
                        <tr class="table_head">
                                <td>Image</td>
                                <td>Title</td>
                                <td>Discription</td>
                                <td>Category</td>
                                <td>Manufacturer</td>
                                <td>Price</td>
                                <td>Quantity</td>
                                <td>Options</td>
                        </tr>
                        <?php foreach($data['products'] as $products): ?>
                       
                        <tr class="order">
                                <div class="order_detail">
                                <td><img src="<?php echo URLROOT;?>/public/upload/listing_images/<?php echo $products->listing_image?>" class="add_image"></td>
                                <td><?php echo $products->product_name ?></td>
                                <td><?php echo $products->product_description ?></td>
                                <td><button class="product_category"><?php echo $products->category ?></button></td>
                                <td><?php echo $products->manufacturer ?></td>
                                <td>Rs.<?php echo $products->price ?></td>
                                <td class="unit"><span class="value"><?php echo $products->quantity ?></span></td>
                                
                                <?php if($products->review_status ==0 ): ?>
                                        <td><span class="delete"><button type="button" onclick="popUpOpenDelete()" id="review_btn"> Review</button></span></td>
                                <?php elseif($products->review_status == 1): ?>
                                        <td><button type="button" onclick="popUpOpenDelete()" id="ad_view_more_btn"><i class="fa-solid fa-circle-info"></i> View More</button></td>
                                <?php else: ?>
                                        <td><button type="button" onclick="popUpOpenDelete()" id="ad_view_more_btn"><i class="fa-solid fa-circle-info"></i> View More</button></td>
                                <?php endif?> 
  

                               
                       
                                </div>

                        </tr>
                                 
                   <?php endforeach;?>
                   <?php }else{ ?>
                          <span class="error_msg"><?php echo $data['message'];?></span>
                   <?php    }  ?> 

                </table>

                </div>
                </div>
        </div>

        <div class="section_3">
                <!-- add forum -->
                
                
        </div>
</div>

<?php require APPROOT.'/views/Users/component/Header.php'?>