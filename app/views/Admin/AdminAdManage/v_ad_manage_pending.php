<link rel="stylesheet" href="../css/Admin/admin_ad_manage_pending.css"></link>
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
        <form method="POST">
        <div class="search_bar">
            <div class="search_content">
                
                    <span class="search_cont" onclick="open_cansel_btn()"><input type="text" name="search_text" placeholder="Search by title of the advertisement" require/></span>
                    <button type="submit" class="search_btn" onclick="clear_search_bar()" value=""><i class="fa-solid fa-xmark" id="cansel" ></i></button>
                    <button type="submit" class="search_btn"><i class="fa fa-search" aria-hidden="true" id="search"></i></button>
                
            </div>
        </div>
        </form>

                <div class="filter_section">
                <label for="ongoing_ready_order" id="filter_label"> <input type="radio" id="ongoing_ready" name="order_type" value="pending_ads" checked>Pending Ads</label>
                        <label for="ongoing_progress__order" id="filter_label"> <input type="radio" id="ongoing_progress" name="order_type" value="reviewed">Reviewed Ads</label>
                        
                </div>

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
                        <?php if($products->ad_status ==0 ) {?>
                        <tr class="order">
                                <div class="order_detail">
                                <td><img src="./../public/upload/listing_images/<?php echo $products->listing_image?>" class="add_image"></td>
                                <td><?php echo $products->product_name ?></td>
                                <td><?php echo $products->product_description ?></td>
                                <td><button class="product_category"><?php echo $products->category ?></button></td>
                                <td><?php echo $products->manufacturer ?></td>
                                <td>Rs.<?php echo $products->price ?></td>
                                <td class="unit"><span class="value"><?php echo $products->quantity ?></span></td>
                                <td><span class="delete"><button type="button" onclick="popUpOpenDelete()" id="review_btn"> Review</button></span></td>
                       
                                </div>

                        </tr>
                        <?php } ?>          
                   <?php endforeach;?>
        

                </table>

                </div>
                </div>
        </div>

        <div class="section_3">
                <!-- add forum -->
                
                
        </div>
</div>

<?php require APPROOT.'/views/Users/component/Header.php'?>