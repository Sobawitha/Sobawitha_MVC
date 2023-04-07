<!--sidebar-->
<!-- <link rel="stylesheet" href="../css/Users/component/sidebar.css"></link> -->
<link rel="stylesheet" href="<?php echo URLROOT ?>/css/Users/component/sidebar.css"></link>
<script src="../js/Users/component/sidebar.js"></script> 

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
        <li class="<?php if (strpos($current_url, URLROOT.'/resources') !== false) echo 'active'; ?>"><a href="<?php echo URLROOT?>/resources/resource_page" class=""><i class="fa-solid fa-file-signature"></i>&nbsp;&nbsp;Resources</a></li>
        <li class="<?php if (strpos($current_url, URLROOT.'/Admin_dashboard') !== false) echo 'active'; ?>"><a href="<?php echo URLROOT?>/Admin_dashboard/main_view" class=""><i class="fas fa-table"></i>&nbsp;&nbsp;Dashboard</a></li>
        <li class="<?php if (strpos($current_url, URLROOT.'/Admin_user_management') !== false) echo 'active'; ?>"><a href="<?php echo URLROOT?>/Admin_user_management/view_all_users" ><i class="fa-solid fa-users" aria-hidden="true"></i>&nbsp;&nbsp;User Mgnt</a></li>  
        <li class="<?php if (strpos($current_url, URLROOT.'/forum') !== false) echo 'active'; ?>"><a href="<?php echo URLROOT?>/forum/forum" ><i class="fa-brands fa-forumbee" aria-hidden="true"></i>&nbsp;&nbsp;Forum Mgnt</a></li>
        <li class="<?php if (strpos($current_url, URLROOT.'/Admin_ad_management') !== false) echo 'active'; ?>"><a href="<?php echo URLROOT?>/Admin_ad_management/ad_management_view" ><i class="fa-sharp fa-solid fa-rectangle-ad" aria-hidden="true"></i>&nbsp;&nbsp;Ads Mgnt</a></li>
        <li class="<?php if (strpos($current_url, URLROOT.'/Admin_feedback_management') !== false) echo 'active'; ?>"><a href="<?php echo URLROOT?>/Admin_feedback_management/view_feedback" ><i class="fa-solid fa-message" aria-hidden="true"></i>&nbsp;&nbsp;Feedbacks Mgnt</a></li>
        <li class="<?php if (strpos($current_url, URLROOT.'/Admin_payments') !== false) echo 'active'; ?>"><a href="<?php echo URLROOT?>/Admin_payments/view_payments" class=""><i class="fa-solid fa-coins"></i>&nbsp;&nbsp;Payments</a></li>
        <li class="<?php if (strpos($current_url, URLROOT.'/Admin_complaints_management') !== false) echo 'active'; ?>"><a href="<?php echo URLROOT?>/Admin_complaints_management/view_complaints" class=""><i class="fa fa-file-text" aria-hidden="true"></i>&nbsp;&nbsp;Complaints Mgnt</a></li> 
    </ul>
</div>


    



















