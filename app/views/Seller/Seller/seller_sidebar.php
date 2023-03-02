<!--sidebar-->
<link rel="stylesheet" href="../css/Users/component/sidebar.css"></link>
<script src="../js/component/sidebar.js"></script> 
<div class="sidebar">
    <div class="logo">
        <i class="fa-solid fa-leaf" id="leaf"></i>
        <span class="logo">SOBAWITHA</span>
        <i class="fa-solid fa-bars" id="equal"></i>
        <i class="fa-solid fa-play" id="shape"></i>
    </div>
    <?php echo '<img src="../'.$_SESSION['profile_image_path'].'"   alt="Profile Picture"  id="userprofileimage">';?>
     <div class="user_detail">
     <span class="uname"> <?php echo $_SESSION['username'] ," ",$_SESSION['lastname'] ?>  </span><br>
    <span class="position"><?php echo $_SESSION['position'] ?></span>
    </div>
    <ul>
        <li><a href="<?php echo URLROOT?>/Pages/home"><i class="fa-solid fa-house"></i>&nbsp;&nbsp;Home</a></li>
        <li><a href="<?php echo URLROOT?>/resources/resource_page"><i class="fa-solid fa-file-signature"></i>&nbsp;&nbsp;Resources</a></li>
        <li><a href="<?php echo URLROOT?>/forum/forum"><i class="fa-brands fa-forumbee"></i>&nbsp;&nbsp;Forum</a></li>
        <li><a href="<?php echo URLROOT?>/seller_ad_management/View_listing"><i class="fa-solid fa-rectangle-ad"></i>&nbsp;&nbsp;Manage Ads</a></li> 
        <li><a href="<?php echo URLROOT?>/seller_order_list/view_orders"><i class="fa-sharp fa-solid fa-store"></i>&nbsp;&nbsp;Orders</a></li> 
        <li><a href="<?php echo URLROOT?>/"><i class="fa-solid fa-cart-shopping"></i></i>&nbsp;&nbsp;Buy Raw-materials</a></li> 
        <li><a href="<?php echo URLROOT?>/seller_feedback/view_all_feed"><i class="fa-solid fa-comments"></i>&nbsp;&nbsp;Feedbacks</a></li> 
        <li><a href="<?php echo URLROOT?>/complaint/display_all_complaint"><i class="fa fa-file-text" aria-hidden="true"></i>&nbsp;&nbsp;Complaints</a></li> 
        <li><a href="<?php echo URLROOT?>/seller_payment/view_payment"><i class="fa-solid fa-coins"></i></i>&nbsp;&nbsp;Payments</a></li> 
    </ul>
</div>





    