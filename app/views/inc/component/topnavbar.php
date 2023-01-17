    
<!--top navbar-->
<link rel="stylesheet" href="../css/component/topnavbar.css"></link>
<script src="../js/component/topnavbar.js"></script> 

<div class="topnav" id="navbar">
  <div class="topnav-content">
    <div class="dropdown-content" >
      <a href="#">View Profile</a>
      <a href="#">Dashboard</a>
      <a href="<?php echo URLROOT?>/Users/logout">Log Out</a>
    </div>
    
    <!-- <img src="../images/logo_2.png" alt="Logo of the System" class="img"> 
    <img src="../images/Name221.png" alt="Logo of the System" class="dis"> -->

    <span class="site_name_nav" id="part_a_nav"><i class="fa-regular fa-leaf"></i><i class="fa-solid fa-leaf"></i>SOBA</span><span id="part_b_nav">WITHA</span>



    <div class="nav-link">
      <a href="<?php echo URLROOT?>/Pages/home">Home</a>
      <a href="<?php echo URLROOT?>/resources/resource_page">Resources</a>
      <a href="<?php echo URLROOT?>/forum/forum">Forum</a>
      <a href="#sell">Sell</a>
      <a href="#shopping_cart"><i class="fa fa-shopping-cart" aria-hidden="true"></i></a>
      <a href="#notification_bell"><i class="fa fa-solid fa-bell" ></i></a>
      <!-- <button class="dropbtn" id="dropbtn" onclick="openProfileMenu()" > <?php echo set_mr_or_mrs($_SESSION['gender']),$_SESSION['username']?></button> -->
      <i class="fa-solid fa-ellipsis-vertical" id="dots" onclick="openProfileMenu()"></i>
    </div>
  </div>

</div>