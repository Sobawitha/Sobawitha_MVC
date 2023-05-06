<link rel="stylesheet" href="../css/Seller/seller_purchases.css"></link>
<?php require APPROOT.'/views/Users/component/Header.php'?>
<?php require APPROOT.'/views/Seller/Seller/seller_topnavbar.php'?>
<?php require APPROOT.'/views/Seller/Seller/seller_Sidebar.php'?>

<body >

<div class="body">
        <div class="section_1">
            
        </div>

        <div class="section_2">

        <h3>Recently sold items</h3>
        <hr>

        <span class="filter_section">
            <form method="POST">
            <div class="search_bar">
                <div class="search_content">
                    
                        <span class="search_cont" onclick="open_cansel_btn()"><input type="text" name="search_text" placeholder="" require/></span>
                        <button type="submit" class="search_btn" onclick="clear_search_bar()" value=""><i class="fa-solid fa-xmark" id="cansel" ></i></button>
                        <button type="submit" class="search_btn"><i class="fa fa-search" aria-hidden="true" id="search"></i></button>
                    
                </div>
            </div>
            </form>

            <!-- <select name="time_period" id="time_period">
            <option value="last_7_days">Last 7 Days</option>
            <option value="last_month">Last Month</option>
            <option value="last_year" >Last Year</option>
            </select> -->
        </span>



        <div class="sp_view_list">
        <div class="views">

        <table class="sp_view_list_table">
                <tr class="table_head">
                        <td>#</td>
                        <td>Image</td>
                        <td>Item</td>
                        <td>Quantity</td>
                        <td>Date</td>
                        <td>Price(Per item)</td>
                        <td></td>
                        <td></td>
                </tr>

                <?php foreach($data['purchase_list'] as $purchase):?>

                <tr class="sp_view">
                        <div class="sp_view_detail">
                                <td><span class="no"><?php echo  $purchase-> purchase_id?></span></td>
                                <td><span class="image"><td><img src="./../public/upload/raw_material_images/<?php echo $purchase-> raw_material_image?>" alt="raw_material_image"  id="raw_material_image"></td></span></td>
                                <td><span class="item"><?php echo  $purchase-> product_name?></span></td>
                                <td><span class="quantity"><?php echo  $purchase-> quantity?></span></td>
                                <td><span class="price"><?php echo  $purchase-> price?></span></td>
                                <td id="review">
                                <i class="fa-solid fa-handshake"></i>&nbsp;&nbsp;Review
                                </td>
                        </div>
                </tr>

                <?php endforeach?>
        </table>

        </div>
        </div>
        </div>
       

        <div class="section_3">
                <!-- add forum -->
                
                
        </div>
</div>


<?php require APPROOT.'/views/Users/component/footer.php'?>









