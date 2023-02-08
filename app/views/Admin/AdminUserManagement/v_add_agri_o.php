<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
  <link rel="stylesheet" href="../css/admin/add_agri_o_n_admin.css"></link><?php require APPROOT.'/views/inc/header.php'; ?>
  <?php require APPROOT.'/views/inc/component/topnavbar.php'; ?>
  <?php require APPROOT.'/views/inc/component/adminSidebar.php'; ?>
  <?php require APPROOT.'/views/inc/header.php'?>
   </head>
<body>
&nbsp<div class="a_add_admin_maincontent">
  &nbsp<div class="add_container">
    <div class="title">Register Agri Officer</div>
    <div class="add_content">
      <form action="#">
        <div class="user-details">
          <div class="input-box">
            <span class="details">First Name</span>
            <input type="text" placeholder="Enter your fisrt name" required>
          </div>
          <div class="input-box">
            <span class="details">Last Name</span>
            <input type="text" placeholder="Enter your last name" required>
          </div>
          <div class="input-box">
            <span class="details">Address Line 01</span>
            <input type="text" placeholder="" required>
          </div>
          <div class="input-box">
            <span class="details">Address Line 02</span>
            <input type="text" placeholder="" required>
          </div>
          <div class="input-box">
            <span class="details">Address Line 03</span>
            <input type="text" placeholder="" required>
          </div>
          <div class="input-box">
            <span class="details">Address Line 04</span>
            <input type="text" placeholder="" >
          </div>
          <div class="input-box">
            <span class="details">Email</span>
            <input type="text" placeholder="Enter your email" required>
          </div>
          <div class="input-box">
            <span class="details">Phone Number</span>
            <input type="text" placeholder="Enter your number" required>
          </div>
          <div class="input-box">
            <span class="details">NIC No</span>
            <input type="text" placeholder="Enter your nic no" required>
          </div>
          <div class="input-box">
            <span class="details">Birthday</span>
            <input type="date" placeholder="" required>
          </div>

          <div class="input-box">
            <span class="details">Gender</span>
            <select name="a_gender" id="a_gender">
                <option value="Male">Male</option>
                <option value="Female">Female</option>
            </select>
         </div>
         <div class="input-box">
            <span class="details">Choose Profile Picture</span>
            <input type="file" id="aa_pro_pic" name="aa_pro_pic" required>
          </div>

          <div class="input-box">
            <span class="details">Qualifications</span>
            <input type="text" placeholder="" required>
          </div>
          <div class="input-box">
            <span class="details">Password</span>
            <input type="password" placeholder="Enter your password" required>
          </div>
          <div class="input-box">
            <span class="details">Confirm Password</span>
            <input type="password" placeholder="Confirm your password" id="aa_confirm_pwd" required>
          </div>
        
                </div>
        <div class="input-box">
          <input type="submit" value="Register" id="agri_reg_button">
        </div>

      </form>
    </div>
  </div>
</div>
</body>
</html>