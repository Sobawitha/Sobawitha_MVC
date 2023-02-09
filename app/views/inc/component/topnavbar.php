    
<!--top navbar-->
<link rel="stylesheet" href="../css/component/topnavbar.css"></link>
<script src="../js/component/topnavbar.js"></script> 

<div class="topnav" id="navbar">
  

  <div class="drop_down">
    <div class="dropdown-content" >
      <a href="<?php echo URLROOT?>/Admin/view_profile">View Profile</a>
      <a href="<?php echo URLROOT?>/Admin_dashboard/main_view">Dashboard</a>
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

      <div class="see_more">See More </div>

    </div>
    </div>

    <span class="site_name_nav" id="part_a_nav"><i class="fa-solid fa-leaf" id="leaf1"></i></i>SOBA</span><span id="part_b_nav">WITHA</span>

    <div class="nav-link">
      <a href="<?php echo URLROOT?>/Pages/home">Home</a>
      <a href="<?php echo URLROOT?>/resources/resource_page">Resources</a>
      <a href="<?php echo URLROOT?>/forum/forum">Forum</a>
      <a href="#sell">Sell</a>
      <a href="<?php echo URLROOT?>/order/view_cart"><i class="fa fa-shopping-cart" aria-hidden="true"></i></a> <!--change-->
      <i class="fa fa-solid fa-bell" id="bell" onclick="openNotificationMenu()"></i>
      <i class="fa-solid fa-ellipsis-vertical" id="dots" onclick="openProfileMenu()"></i>

    </div>
  </div>

</div>