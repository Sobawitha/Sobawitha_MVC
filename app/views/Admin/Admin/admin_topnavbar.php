    
<!--top navbar-->
<!-- <link rel="stylesheet" href="../css/Users/component/topnavbar.css"></link> -->
<link rel="stylesheet" href="<?php echo URLROOT ?>/css/Users/component/topnavbar.css"></link>
<script src="../js/Users/component/topnavbar.js"></script> 

<div class="topnav" id="navbar">
<?php
// Get the current URL
$current_url = "http".(!empty($_SERVER['HTTPS'])?"s":"")."://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];                                          
?>
<!-- <?php echo "<script> 
 alert('$current_url'); 
 </script>" ?> -->

  <div class="drop_down">
    <div class="dropdown-content" >
      
      <a href="<?php echo URLROOT?>/Login/logout">Log Out</a>

    </div>

    <div class="notification-dropdown-content" >
      <div class="notification_section_header">Notifications<i class="fa-solid fa-gear" id="gear"></i></div>
      <div class="notification">
        <i class="fa-solid fa-envelope" id="mail"></i><span class="notification_line">Email from Mr. Perera</span>
        <hr class="notification_hr">
      </div>
  

      <div class="notification">
        <i class="fa-brands fa-forumbee" id="forum"></i><span class="">Email from Mr. Perera</span>
        <hr class="notification_hr">
      </div>

      <div class="notification">
        <i class="fa-regular fa-message" id="messages"></i><span class="">Email from Mr. Perera</span>
        <hr class="notification_hr">
      </div>

      <div class="see_more"><a href="<?php echo URLROOT?>/Users/view_profile" class="see_more_txt">See More</a> </div>

    </div>
    </div>

    <span class="site_name_nav" id="part_a_nav"><i class="fa-solid fa-leaf" id="leaf1"></i></i>SOBA</span><span id="part_b_nav">WITHA</span>
    <div class="nav-link">
      <a href="<?php echo URLROOT?>/Admin/profile" class="<?php if ($current_url === URLROOT.'/Admin/updateProfile' || $current_url === URLROOT.'/Admin/profile' || $current_url === URLROOT.'/Users/changePW') echo 'active'; ?>">Profile</a>
      <a href="<?php echo URLROOT?>/Admin_dashboard/main_view" class="<?php if ($current_url === URLROOT.'/Admin_dashboard/main_view') echo 'active'; ?>">Dashboard</a>
      <!-- <a href="<?php echo URLROOT?>/order/view_cart"><i class="fa fa-shopping-cart" aria-hidden="true" id="cart"></i></a>  -->
      <a><i class="fa fa-solid fa-bell" id="bell" onclick="openNotificationMenu()"></i></a>
      <a href="<?php echo URLROOT?>/Login/logout"><i class="fa-solid fa-right-from-bracket" id="dots"></i></a>
    </div>
  </div>

</div>