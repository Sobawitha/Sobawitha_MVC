<link rel="stylesheet" href="../css/Buyer/wish_list/wish_list.css"></link>
<script src="../js/Buyer/index_wishlist.js" defer></script>
<?php require APPROOT.'/views/Users/component/Header.php'?>
<?php require APPROOT.'/views/Buyer/Buyer/buyer_topnavbar.php'?>
<?php require APPROOT.'/views/Buyer/Buyer/buyer_sidebar.php'?>




<div class="body">

    <div class="section_1">

    </div>


    <div class="section_2">

    <!-- <h3>Wishlist</h3>
    <hr> -->

    <br><br>

    <div class="shop-items">

    <?php
    if (!is_null($data['wishlist'])) {
       
        foreach($data['wishlist'] as $wishlist):{
        
            ?>
           
        <div class="wishlist-item" id = "user-<?php echo $wishlist->Product_id; ?>">
            <i class="fa-solid fa-xmark" id="xmark"></i>
            <span id="remove" data-id="<?php echo $wishlist->Product_id; ?>">Remove</span>
            <div class="pic">
            <img src="./../public/upload/fertilizer_images/<?php echo $wishlist->fertilizer_img ?>" class="wisthlist_image">
            </div>
            <div class="info">
            <span class="title"><?php echo strlen($wishlist->product_name) > 20 ? substr($wishlist->product_name, 0, 20) . '...' : $wishlist->product_name ?></span>
            <span class="producer"><?php echo  $wishlist->manufacturer ?></span>
            </div>

            <div class="currPrice"><?php echo $wishlist->price ?></div>
            <span class="wishlist_button">
              <button class="add_to_cart"  id = "add">Add to Cart</button>
              
            </span>  
            </div>
        <?php
        }
    ?>

<?php endforeach; }

else{
 echo "There is an error";   
}?>

    </div>
    <div class="last">

    </div>
</div>




</div>


<?php require APPROOT.'/views/Users/component/footer.php'?>