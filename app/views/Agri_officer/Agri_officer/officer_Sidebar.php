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
    <!-- <img  src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($_SESSION['profile_image']);?>" id="userprofileimage"/> -->
    <img src="<?php echo URLROOT ?>/public/upload/user_profile_pics/<?php echo $_SESSION['profile_image']?>"   alt="Profile Picture"  id="userprofileimage" /> 
    <div class="user_detail">
     <span class="uname"> <?php echo $_SESSION['username'] ," ",$_SESSION['lastname'] ?>  </span><br>
    <span class="position"><?php echo $_SESSION['position'] ?></span>
    </div>
    <ul>
        <li class="<?php if ($current_url === URLROOT.'/Pages/home') echo 'active'; ?>"><a href="<?php echo URLROOT?>/Pages/home" class="tab"><i class="fa-solid fa-house"></i>&nbsp;&nbsp;Home</a></li>
        <li class="<?php if (strpos($current_url, URLROOT.'/resources') !== false) echo 'active'; ?>"><a href="<?php echo URLROOT?>/resources/resource_page" class="tab"><i class="fa-solid fa-file-signature"></i>&nbsp;&nbsp;Resources</a></li>
        <li class="<?php if (strpos($current_url, URLROOT.'/forum') !== false) echo 'active'; ?>"><a href="<?php echo URLROOT?>/forum/forum" class="tab"><i class="fa-brands fa-forumbee"></i>&nbsp;&nbsp;Forum</a></li>
        <li  class="<?php if (strpos($current_url, URLROOT.'/officer_dashboard') !== false) echo 'active'; ?>"><a href="<?php echo URLROOT?>/dashboard/officer_dashboard" class="tab active"><i class="fas fa-table"></i>&nbsp;&nbsp;Dashboard</a></li>
        <li class="<?php if (strpos($current_url, URLROOT.'/create_posts') !== false) echo 'active'; ?>"><a href="<?php echo URLROOT?>/blog_post/create_posts" class="tab"><i class="fas fa-book"></i>&nbsp;&nbsp;Manage Resources</a></li> 
        <li class="<?php if (strpos($current_url, URLROOT.'/display_all_complaint') !== false) echo 'active'; ?>"><a href="<?php echo URLROOT?>/complaint/display_all_complaint" class="tab"><i class="fa fa-file-text" aria-hidden="true"></i>&nbsp;&nbsp;Complaints</a></li> 
    </ul>
</div>