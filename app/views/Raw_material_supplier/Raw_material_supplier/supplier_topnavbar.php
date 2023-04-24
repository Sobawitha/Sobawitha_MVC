    
<!--top navbar-->
<link rel="stylesheet" href="<?php echo URLROOT ?>/public/css/Users/component/topnavbar.css"></link>
<script src="../js/Users/component/topnavbar.js"></script> 

<?php
// Get the current URL
$current_url = "http".(!empty($_SERVER['HTTPS'])?"s":"")."://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
?>


<div class="topnav" id="navbar">
  

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
      <a href="<?php echo URLROOT?>/Supplier/profile" class="<?php if ($current_url === URLROOT.'/Supplier/updateProfile' || $current_url === URLROOT.'/Supplier/profile' || $current_url === URLROOT.'/Users/changePW') echo 'active'; ?>">Profile</a>
      <a href="<?php echo URLROOT?>/dashboard/supplier_dashboard" class="<?php if ($current_url === URLROOT.'/dashboard/supplier_dashboard') echo 'active'; ?>">Dashboard</a>
      <!-- <a href="<?php echo URLROOT?>/order/view_cart" id="cart_icon"><i class="fa fa-shopping-cart" aria-hidden="true"></i></a> change -->
      <i class="fa fa-solid fa-bell" id="bell" onclick="openNotificationMenu()"></i>
      <a href="<?php echo URLROOT?>/Login/logout"><i class="fa-solid fa-right-from-bracket" id="dots"></i></a>
    </div>
  </div>

</div>