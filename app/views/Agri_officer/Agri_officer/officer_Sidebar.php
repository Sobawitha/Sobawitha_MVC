<!--sidebar-->
<link rel="stylesheet" href="../css/Users/component/sidebar.css"></link>
<script src="../js/Users/component/sidebar.js"></script> 
<div class="sidebar">
    <div class="logo">
        <i class="fa-solid fa-leaf" id="leaf"></i>
        <span class="logo">SOBAWITHA</span>
        <i class="fa-solid fa-bars" id="equal"></i>
        <i class="fa-solid fa-play" id="shape"></i>
    </div>
    <?php echo '<img src=".././public/upload/profile_images/'.$_SESSION['profile_image'].'"   alt="user profile"  id="userprofileimage">';?>
     <div class="user_detail">
     <span class="uname"> <?php echo $_SESSION['username'] ," ",$_SESSION['lastname'] ?>  </span><br>
    <span class="position"><?php echo $_SESSION['position'] ?></span>
    </div>
    <ul>
        <li><a href="<?php echo URLROOT?>/Pages/home" class="tab"><i class="fa-solid fa-house"></i>&nbsp;&nbsp;Home</a></li>
        <li><a href="<?php echo URLROOT?>/resources/resource_page" class="tab"><i class="fa-solid fa-file-signature"></i>&nbsp;&nbsp;Resources</a></li>
        <li><a href="<?php echo URLROOT?>/forum/forum" class="tab"><i class="fa-brands fa-forumbee"></i>&nbsp;&nbsp;Forum</a></li>
        <li><a href="<?php echo URLROOT?>/dashboard/officer_dashboard" class="tab active"><i class="fas fa-table"></i>&nbsp;&nbsp;Dashboard</a></li>
        <li><a href="<?php echo URLROOT?>/blog_post/create_posts" class="tab"><i class="fas fa-book"></i>&nbsp;&nbsp;Manage Resources</a></li> 
        <li><a href="<?php echo URLROOT?>/complaint/display_all_complaint" class="tab"><i class="fa fa-file-text" aria-hidden="true"></i>&nbsp;&nbsp;Complaints</a></li> 
    </ul>
</div>