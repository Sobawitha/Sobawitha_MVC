    
<!--top navbar-->
<link rel="stylesheet" href="<?php echo URLROOT ?>/public/css/Users/component/topnavbar.css"></link>
<script src="../js/Users/component/topnavbar.js"></script> 

<?php
// Get the current URL
$current_url = "http".(!empty($_SERVER['HTTPS'])?"s":"")."://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
?>
<div class="notification-dropdown-content" >
          <div class="notification_section_header">Notifications<i class="fa-solid fa-gear" id="gear"></i></div>
          
          <?php foreach ($data['notifications'] as $notifications): ?> 

          <?php if($notifications->type == 'information'){?>
            <div class="notification">
            <i class="fa-solid fa-circle-info" id="mail"></i><span class="notification_line"><?php echo $notifications->message ?></span>
            <hr class="notification_hr">
            </div>  
          <?php
          }else if($notifications->type == 'message'){?>
              <div class="notification">
              <i class="fa-regular fa-message" id="messages"></i><span class="notification_line"><?php echo $notifications->message ?></span>
              <hr class="notification_hr">
              </div> 
          <?php
          }else if($notifications->type == 'annoucement'){?>
            <div class="notification">
            <i class="fa-brands fa-forumbee" id="forum"></i><span class="notification_line"><?php echo $notifications->message ?></span>
            <hr class="notification_hr">
            </div> 
        <?php
        }?>
    <?php endforeach;?>
          <div class="see_more"><a href="<?php echo URLROOT?>/AgriOfficer/profile" class="see_more_txt">See More</a> </div>
  </div>
</div>


<div class="topnav" id="navbar">
  

  <div class="drop_down">
    <div class="dropdown-content" >
      <a href="<?php echo URLROOT?>/Login/logout">Log Out</a>

    </div>
    </div>

    <span class="site_name_nav" id="part_a_nav"><i class="fa-solid fa-leaf" id="leaf1"></i></i>SOBA</span><span id="part_b_nav">WITHA</span>
    <div class="nav-link">
      <a href="<?php echo URLROOT?>/Supplier/profile" class="<?php if ($current_url === URLROOT.'/Supplier/updateProfile' || $current_url === URLROOT.'/Supplier/profile' || $current_url === URLROOT.'/Users/changePW') echo 'active'; ?>">Profile</a>
      <a href="<?php echo URLROOT?>/supplier_dashboard/supplier_dashboard" class="<?php if ($current_url === URLROOT.'/dashboard/supplier_dashboard') echo 'active'; ?>">Dashboard</a>
      <!-- <a href="<?php echo URLROOT?>/order/view_cart" id="cart_icon"><i class="fa fa-shopping-cart" aria-hidden="true"></i></a> change -->
      <i class="fa fa-solid fa-bell" id="bell" onclick="openNotificationMenu()"></i>
      <?php if($data['no_of_notifications'] > 0){?> 
          <span id="no_of_notifications"><?php echo $data['no_of_notifications'];?> </span>
          
      <?php
      }?>
      <a href="<?php echo URLROOT?>/Login/logout"><i class="fa-solid fa-right-from-bracket" id="dots"></i></a>
    </div>
  </div>

</div>