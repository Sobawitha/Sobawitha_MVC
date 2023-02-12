<link rel="stylesheet" href="../css/Buyer/wish_list/wish_list.css"></link>
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
        for($i=1; $i<=8; $i++){
            ?>
        <div class="wishlist-item">
            <i class="fa-solid fa-xmark" id="xmark"></i>
            <span id="remove">Remove</span>
            <div class="pic">
            <img src="../public/images/background2.jpg" class="wisthlist_image">
            </div>

            <div class="info">
            <span class="title">Organic fertilizer</span>
            <span class="producer">From abc production</span>
            </div>

            <div class="currPrice">Rs. 500.00</div>
            <span class="wishlist_button">
                <button class="add_to_cart">Add to cart</button>    
            </span>  
            </div>
        <?php
        }?>

    </div>
    <div class="last">

    </div>
</div>

</div>
<?php require APPROOT.'/views/Users/component/footer.php'?>