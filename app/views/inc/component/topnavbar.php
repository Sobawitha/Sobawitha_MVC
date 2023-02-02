    
<!--top navbar-->
<link rel="stylesheet" href="../css/component/topnavbar.css"></link>
<script src="../js/component/topnavbar.js"></script> 

<div class="topnav" id="navbar">
  <div class="topnav-content">
    <div class="dropdown-content" >
      <a href="<?php echo URLROOT?>/Admin/view_profile">View Profile</a>
      <a href="<?php echo URLROOT?>/Admin_dashboard/main_view">Dashboard</a>
      <a href="<?php echo URLROOT?>/Admin/tlogout">Log Out</a>
    </div>
    
    <img src="../img/TopNavBar/logorem.png" alt="Logo of the System" class="img">
    <img src="../img/TopNavBar/motto.png" alt="Motto of the System" class="dis">
    <div class="nav-link">
      <a href="./Home.php">Home</a>
      <a href="<?php echo URLROOT?>/resources/resource_page">Resources</a>
      <a href="./Forum.php">Forum</a>
      <a href="#sell">Sell</a>
      <a href="#shopping_cart"><i class="fa fa-shopping-cart" aria-hidden="true"></i></a>
      <a href="#notification_bell"><i class="fa fa-solid fa-bell" ></i></a>
      <button class="dropbtn" id="dropbtn" onclick="openProfileMenu()" > <?php echo 'Mr. Devin'?></button>
    </div>
  </div>

</div>