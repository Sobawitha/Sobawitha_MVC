<link rel="stylesheet" href="../css/seller/seller_wishlist.css"></link>
<?php require APPROOT.'/views/Users/component/Header.php'?>
<?php require APPROOT.'/views/Seller/Seller/seller_topnavbar.php'?>
<?php require APPROOT.'/views/Seller/Seller/seller_Sidebar.php'?>


<div class="body">
    <div class="section_1">

    </div>


    <div class="section_2">

    <!-- <h3>Wishlist</h3>
    <hr> -->

    <br><br>

    <div class="shop-items">

    <?php
        foreach($data['seller_wishlist'] as $Seller_wishlist_item):
        
            ?>
        <div class="wishlist-item">
            <a href="<?php echo URLROOT ?>/seller_wishlist/remove_wishlist_item?product_id=<?php echo $Seller_wishlist_item->Product_id ?>"  id="xmark"><i class="fa-solid fa-xmark" ></i></a>
            <!-- <span id="remove">Remove</span> -->
            <div class="pic">
            <img src="../public/upload/raw_material_images/<?php echo $Seller_wishlist_item->raw_material_image?>" alt="raw_material_image" class="wisthlist_image">
            </div>

            <div class="info">
            <span class="title"><?php echo $Seller_wishlist_item->product_name ?></span>
            <span class="producer"><?php echo $Seller_wishlist_item->manufacturer ?></span>
            </div>

            <div class="currPrice">Rs.<?php echo $Seller_wishlist_item->price ?></div>
            <!-- <span class="wishlist_button">
                <button class="add_to_cart">Add to cart</button>    
            </span>   -->
            </div>
        <?php endforeach; 
        ?>

    </div>
    <div class="last">

    </div>
</div>

</div>
<?php require APPROOT.'/views/Users/component/footer.php'?>