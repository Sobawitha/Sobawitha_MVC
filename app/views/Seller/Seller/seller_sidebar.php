<!--sidebar-->
<link rel="stylesheet" href="../css/Users/component/sidebar.css"></link>
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
    <?php echo '<img src="../'.$_SESSION['profile_image_path'].'"   alt="Profile Picture"  id="userprofileimage">';?>
     <div class="user_detail">
     <span class="uname"> <?php echo $_SESSION['username'] ," ",$_SESSION['lastname'] ?>  </span><br>
    <span class="position"><?php echo $_SESSION['position'] ?></span>
    </div>
    <ul>
        <li class="<?php if ($current_url === URLROOT.'/Pages/home') echo 'active'; ?>"><a href="<?php echo URLROOT?>/Pages/home"><i class="fa-solid fa-house"></i>&nbsp;&nbsp;Home</a></li>
        <li class="<?php if (strpos($current_url, URLROOT.'/resources') !== false) echo 'active'; ?>"><a href="<?php echo URLROOT?>/resources/resource_page"><i class="fa-solid fa-file-signature"></i>&nbsp;&nbsp;Resources</a></li>
        <li class="<?php if (strpos($current_url, URLROOT.'/dashboard') !== false) echo 'active'; ?>"><a href="<?php echo URLROOT?>/dashboard/seller_dashboard" class=""><i class="fas fa-table"></i>&nbsp;&nbsp;Dashboard</a></li>
        <li class="<?php if (strpos($current_url, URLROOT.'/forum') !== false) echo 'active'; ?>"><a href="<?php echo URLROOT?>/forum/forum"><i class="fa-brands fa-forumbee"></i>&nbsp;&nbsp;Forum</a></li>
        <li class="<?php if (strpos($current_url, URLROOT.'/seller_ad_management') !== false) echo 'active'; ?>"><a href="<?php echo URLROOT?>/seller_ad_management/View_listing"><i class="fa-solid fa-rectangle-ad"></i>&nbsp;&nbsp;Manage Ads</a></li> 
        <li class="<?php if (strpos($current_url, URLROOT.'/seller_order_list') !== false) echo 'active'; ?>"><a href="<?php echo URLROOT?>/seller_order_list/view_orders"><i class="fa-sharp fa-solid fa-store"></i>&nbsp;&nbsp;Orders</a></li> 
        <li class="<?php if (strpos($current_url, URLROOT.'/seller_buy') !== false) echo 'active'; ?>"><a href="<?php echo URLROOT?>/"><i class="fa-solid fa-cart-shopping"></i></i>&nbsp;&nbsp;Buy Raw-materials</a></li> 
        <li class="<?php if (strpos($current_url, URLROOT.'/seller_feedback') !== false) echo 'active'; ?>"><a href="<?php echo URLROOT?>/seller_feedback/view_all_feed"><i class="fa-solid fa-comments"></i>&nbsp;&nbsp;Feedbacks</a></li> 
        <li class="<?php if (strpos($current_url, URLROOT.'/complaint') !== false) echo 'active'; ?>"><a href="<?php echo URLROOT?>/complaint/display_all_complaint"><i class="fa fa-file-text" aria-hidden="true"></i>&nbsp;&nbsp;Complaints</a></li> 
        <li class="<?php if (strpos($current_url, URLROOT.'/seller_payment') !== false) echo 'active'; ?>"><a href="<?php echo URLROOT?>/seller_payment/view_payment"><i class="fa-solid fa-coins"></i></i>&nbsp;&nbsp;Payments</a></li> 
    </ul>
</div>





    