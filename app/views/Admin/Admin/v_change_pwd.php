<link rel="stylesheet" href="../css/admin/change_pwd.css"></link>
<?php require APPROOT.'/views/inc/header.php'; ?>
<?php require APPROOT.'/views/inc/component/topnavbar.php'; ?>
<?php require APPROOT.'/views/inc/component/adminSidebar.php'; ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
<body>
<div class="a_add_admin_maincontent">
  <div class="container">
    <div class="title">Change Password</div>
    <div class="content">
      <form action="#">
        <div class="user-details">
          <div class="input-box">
            <span class="details">Current Password</span>
            <input type="password" placeholder="Enter your current password" required>
          </div>
        
          <div class="input-box">
            <span class="details">New Password</span>
            <input type="password" placeholder="Enter your new password" required>
          </div>
          <div class="input-box">
            <span class="details">Confirm New Password</span>
            <input type="password" placeholder="Confirm your new password" required>
          </div>
        </div>
          <div class="button">
          <button type="submit" id="change_pwd"   >Change Password</button>
        </div>
      </form>
    </div>
  </div>
</div>
</body>
</html>
