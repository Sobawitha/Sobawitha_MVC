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
        <li><a href="<?php echo URLROOT?>/Admin_dashboard/main_view"><i class="fas fa-table"></i>&nbsp;&nbsp;Dashboard</a></li>
        <li><a href="<?php echo URLROOT?>/Admin_user_management/user_manage"><i class="fa-solid fa-users" aria-hidden="true"></i>&nbsp;&nbsp;User Mgnt</a></li>
        <li><a href="<?php echo URLROOT?>/forum/forum" class="activeN"><i class="fa-brands fa-forumbee" aria-hidden="true"></i>&nbsp;&nbsp;Forum Mgnt</a></li>
        <li><a href="<?php echo URLROOT?>/Admin_ad_management/review" class="activeN"><i class="fa-sharp fa-solid fa-rectangle-ad" aria-hidden="true"></i>&nbsp;&nbsp;Ads Mgnt</a></li>
        <li><a href="<?php echo URLROOT?>/Admin_feedback_management/feed_review_pending" ><i class="fa-solid fa-message" aria-hidden="true"></i>&nbsp;&nbsp;Feedbacks Mgnt</a></li>
        <li><a href="<?php echo URLROOT?>/Admin_payments/view_payments" ><i class="fa-solid fa-coins"></i>&nbsp;&nbsp;Payments</a></li>
        <li><a href="<?php echo URLROOT?>/Admin_complaints_management/comp_review_pending" class=""><i class="fa fa-file-text" aria-hidden="true"></i>&nbsp;&nbsp;Complaints</a></li> 
    </ul>
</div>




    



















