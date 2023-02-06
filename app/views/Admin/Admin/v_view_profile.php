<link rel="stylesheet" href="../css/admin/view_profile.css"></link>
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
    <div class="title">Account Information</div>
    <div class="content">
      <form action="#">
        <div class="user-details">
          <div class="input-box">
            <span class="details">First Name</span>
            <input type="text" placeholder="Enter your fisrt name" value="Devin" required>
          </div>
          <div class="input-box">
            <span class="details">Last Name</span>
            <input type="text" placeholder="Enter your last name" value="Yapa" required>
          </div>
          <div class="input-box">
            <span class="details">Address Line 01</span>
            <input type="text" placeholder="" value="58/B" required>
          </div>
          <div class="input-box">
            <span class="details">Address Line 02</span>
            <input type="text" placeholder="" value="Yehiya Road" required>
          </div>
          <div class="input-box">
            <span class="details">Address Line 03</span>
            <input type="text" placeholder="" value="Issadeen Town" required>
          </div>
          <div class="input-box">
            <span class="details">Address Line 04</span>
            <input type="text" placeholder=""  value="Matara">
          </div>
          <div class="input-box">
            <span class="details">Email</span>
            <input type="text" placeholder="Enter your email" value="yapadevin@gmail.com" required>
          </div>
          <div class="input-box">
            <span class="details">Phone Number</span>
            <input type="text" placeholder="Enter your number" value="071 1234567"required>
          </div>
          <div class="input-box">
            <span class="details">NIC No</span>
            <input type="text" placeholder="Enter your NIC no" value="992142200V"required>
          </div>
          <div class="input-box">
            <span class="details">Birthday</span>
            <input type="text" placeholder="" value="1999.08.01" required>
          </div>
          <div class="input-box">
            <span class="details">Bank Account Name</span>
            <input type="text" placeholder="" value="D.P.D Yapa"required>
          </div>
          <div class="input-box">
            <span class="details">Bank Account Number</span>
            <input type="text" placeholder="" value="123456789" required>
          </div>
          <div class="input-box">
            <span class="details">Bank Name</span>
            <input type="text" placeholder="" value="Sampath" required>
          </div>
          <div class="input-box">
            <span class="details">Branch of Bank</span>
            <input type="text" placeholder="" value="Matara - Super" required>
          </div>
        </div>
        <div class="gender-details">
          <input type="radio" name="gender" checked="checked" id="dot-1">
          <input type="radio" name="gender" id="dot-2">
          <span class="gender-title">Gender</span>
          <div class="avp_category">
            <label for="dot-1">
            <span class="dot one"></span>
            <span class="gender" >Male</span>
          </label>
          <label for="dot-2">
            <span class="dot two"></span>
            <span class="gender">Female</span>
          </label>
          </div>
        </div>
        <div class="three_btns">
        <div class="button" >
        <button type="submit" id="avf_update_btn">Update</button> 
      
        </div>
         <div class="button" >
        <a href="<?php echo URLROOT?>/Admin/change_pwd"><button type="button" id="avf_change_pwd_btn">Chnage Password</button></a>

        </div>
        <div class="button" >
          <!-- <input type="submit" id="delete" value="Delete"> -->
          <button type="submit" id="avf_delete_btn">Delete</button> 

        </div>
        </div>
      </form>
    </div>
  </div>
</div>
</body>
</html>
