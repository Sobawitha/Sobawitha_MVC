    
<!--top navbar-->
<link rel="stylesheet" href="<?php echo URLROOT ?>/css/Users/component/topnavbar.css"></link>
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

      <div class="see_more"><a href="<?php echo URLROOT?>/Users/officer_view_profile" class="see_more_txt">See More</a> </div>

    </div>
    </div>

    <span class="site_name_nav" id="part_a_nav"><i class="fa-solid fa-leaf" id="leaf1"></i></i>SOBA</span><span id="part_b_nav">WITHA</span>
    <div class="nav-link">
      <a href="<?php echo URLROOT?>/AgriOfficer/profile" class="<?php if ($current_url === URLROOT.'/AgriOfficer/updateProfile' || $current_url === URLROOT.'/AgriOfficer/profile' || $current_url === URLROOT.'/Users/changePW') echo 'active'; ?>">Profile</a>
      <a href="<?php echo URLROOT?>/dashboard/officer_dashboard" class="<?php if ($current_url === URLROOT.'/dashboard/officer_dashboard') echo 'active'; ?>">Dashboard</a>
      <i class="fa fa-solid fa-bell" id="bell" onclick="openNotificationMenu()"></i><span id="no_of_notifications">4</span>
      <a href="<?php echo URLROOT?>/Login/logout"><i class="fa-solid fa-right-from-bracket" id="dots"></i></a>
    </div>
  </div>
</div>



<script>
  function getallnotifications() {

  var ajax = new XMLHttpRequest();

  ajax.open("POST", "http://localhost/gardening_hub/notifications/getallnotifications", true);
  ajax.send();

  ajax.onreadystatechange = function () {

      if (this.readyState == 4 && this.status == 200) {
          var data = JSON.parse(this.responseText);


          let notificationBody = " ";
          document.getElementById('numofnotifications').innerText =data.length;
          if (data.length > 0) {
            notibell.classList.remove('hidden');

              for (var a = 0; a < data.length; a++) {

                  notificationBody += 
                                    <div  class="notification-body">
                                      <div class="notification-icon">
                                        <img src="http://localhost/gardening_hub/img/admin/icon/warning.png" height="50px" width="50px" alt="">
                                      </div>
                                      <a style="text-decoration:none; cursor: pointer;" href="http://localhost/gardening_hub/admins/viewuserfromnotification/${data[a].user_id}" class="notification-message_and_time">
                                        <div class="notification-message">
                                          New ${data[a].user_type} registration found!
                                        </div>
                                        <div class="notification-date">
                                            ${data[a].dateandtime}
                                        </div>
                                      </a>
                                      <div class="notification-delete">
                                        <img src="http://localhost/gardening_hub/img/admin/icon/close.png" height="30px" width="30px" alt="" onclick="clearnotification(${data[a].notifiication_id});">
                                      </div>
                                    </div>
                                  ;


              }

          } else {

              notificationBody =  <h3 style="padding-left: 50px;margin-top: 20px">No notifications</h3>
              notibell.classList.add("hidden");
          }

          document.getElementById("notifications").innerHTML = notificationBody;
      }
  };
  }
</script>