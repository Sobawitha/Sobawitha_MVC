<!--sidebar-->
<link rel="stylesheet" href="<?php echo URLROOT ?>/css/Users/component/sidebar.css"></link>
<script src="../js/component/sidebar.js"></script> 

<?php
// Get the current URL
$current_url = "http".(!empty($_SERVER['HTTPS'])?"s":"")."://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
?>

<div class="sidebar">
    <div class="logo">
        <i class="fa-solid fa-leaf" id="leaf"></i>
        <span class="logo">SOBAWITHA</span>
        <i class="fa-solid fa-bars" id="equal"></i>
        <i class="fa-solid fa-play" id="shape"></i>
    </div>
    <img src="<?php echo URLROOT ?>/public/upload/user_profile_pics/<?php echo $_SESSION['profile_image']?>"   alt="Profile Picture"  id="userprofileimage" />
     <div class="user_detail">
     <span class="uname"> <?php echo $_SESSION['username'] ," ",$_SESSION['lastname'] ?>  </span><br>
    <span class="position"><?php echo $_SESSION['position'] ?></span>
    </div>
    <ul>
        <li class="<?php if ($current_url === URLROOT.'/Pages/home') echo 'active'; ?>"><a href="<?php echo URLROOT?>/Pages/home"><i class="fa-solid fa-house"></i>&nbsp;&nbsp;Home</a></li>
        <li class="<?php if (strpos($current_url, URLROOT.'/forum') !== false) echo 'active'; ?>"><a href="<?php echo URLROOT?>/forum/forum"><i class="fa-brands fa-forumbee"></i>&nbsp;&nbsp;Forum</a></li>
        <li class="<?php if (strpos($current_url, URLROOT.'/seller_ad_management') !== false) echo 'active'; ?>"><a href="<?php echo URLROOT?>/seller_ad_management/View_listing"><i class="fa-solid fa-rectangle-ad"></i>&nbsp;&nbsp;Manage Ads</a></li> 
        <li class="<?php if (strpos($current_url, URLROOT.'/fertilizer_product') !== false) echo 'active'; ?>"><a href="<?php echo URLROOT?>/fertilizer_product/view_orders"><i class="fa-sharp fa-solid fa-store"></i>&nbsp;&nbsp;Orders</a></li> 
        <li class="<?php if (strpos($current_url, URLROOT.'/seller_purchase') !== false) echo 'active'; ?>"><a href="<?php echo URLROOT?>/seller_purchase/display_all_purchases"><i class="fa-solid fa-basket-shopping"></i>&nbsp;&nbsp;View Purchases</a></li>
        <li class="<?php if (strpos($current_url, URLROOT.'/seller_wishlist') !== false) echo 'active'; ?>"><a href="<?php echo URLROOT?>/seller_wishlist/view_wishlist"><i class="fa-solid fa-heart-circle-check"></i>&nbsp;&nbsp;Wish List</a></li>
        <li class="<?php if (strpos($current_url, URLROOT.'/supplier_ad_view') !== false) echo 'active'; ?>"><a href="<?php echo URLROOT?>/supplier_ad_view/index"><i class="fa-solid fa-cart-shopping"></i></i>&nbsp;&nbsp;Buy Raw-materials</a></li> 
        <li class="<?php if (strpos($current_url, URLROOT.'/seller_feedback') !== false) echo 'active'; ?>"><a href="<?php echo URLROOT?>/seller_feedback/view_all_feed"><i class="fa-solid fa-comments"></i>&nbsp;&nbsp;Feedbacks</a></li> 
        <li class="<?php if (strpos($current_url, URLROOT.'/complaint') !== false) echo 'active'; ?>"><a href="<?php echo URLROOT?>/complaint/display_all_complaint"><i class="fa fa-file-text" aria-hidden="true"></i>&nbsp;&nbsp;Complaints</a></li> 
    </ul>
</div>





    