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
    <img src="<?php echo URLROOT ?>/public/upload/user_profile_pics/<?php echo $_SESSION['profile_image']?>"   alt="Profile Picture"  id="userprofileimage" />
     <div class="user_detail">
     <span class="uname"> <?php echo $_SESSION['username'] ," ",$_SESSION['lastname'] ?>  </span><br>
    <span class="position"><?php echo $_SESSION['position'] ?></span>
    </div>
    <ul>
        <li class="<?php if ($current_url === URLROOT.'/Pages/home') echo 'active'; ?>"><a href="<?php echo URLROOT?>/Pages/home"><i class="fa-solid fa-house"></i>&nbsp;&nbsp;Home</a></li>
        <li class="<?php if (strpos($current_url, URLROOT.'/resources') !== false) echo 'active'; ?>"><a href="<?php echo URLROOT?>/resources/resource_page"><i class="fa-solid fa-file-signature"></i>&nbsp;&nbsp;Resources</a></li>
        <li class="<?php if (strpos($current_url, URLROOT.'/forum') !== false) echo 'active'; ?>"><a href="<?php echo URLROOT?>/forum/forum"><i class="fa-brands fa-forumbee"></i>&nbsp;&nbsp;Forum</a></li>
        <li class="<?php if (strpos($current_url, URLROOT.'/dashboard') !== false) echo 'active'; ?>"><a href="<?php echo URLROOT?>/dashboard/buyer_dashboard" class=""><i class="fas fa-table"></i>&nbsp;&nbsp;Dashboard</a></li>
        <li class="<?php if (strpos($current_url, URLROOT.'/purchase') !== false) echo 'active'; ?>"><a href="<?php echo URLROOT?>/purchase/display_all_purchases" class=""><i class="fa-solid fa-list-check"></i>&nbsp;&nbsp;Purchase</a></li>
        <li class="<?php if (strpos($current_url, URLROOT.'/order') !== false) echo 'active'; ?>"><a href="<?php echo URLROOT?>/order/wish_list" class=""><i class="fa-solid fa-heart-circle-check"></i>&nbsp;&nbsp;Wish List</a></li>
        <li class="<?php if (strpos($current_url, URLROOT.'/complaint') !== false) echo 'active'; ?>"><a href="<?php echo URLROOT?>/complaint/display_all_complaint" class=""><i class="fas fa-table"></i>&nbsp;&nbsp;Complaint</a></li>
    </ul>
</div>





























