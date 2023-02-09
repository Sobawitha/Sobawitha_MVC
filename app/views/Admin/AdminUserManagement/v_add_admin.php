
<link rel="stylesheet" href="../css/admin/add_agri_o_n_admin.css"></link><?php require APPROOT.'/views/inc/header.php'; ?>
<?php require APPROOT.'/views/inc/component/topnavbar.php'; ?>
<?php require APPROOT.'/views/inc/component/adminSidebar.php'; ?>
<?php require APPROOT.'/views/inc/header.php'?>



<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
<body>
&nbsp<div class="a_add_admin_maincontent">
  <div class="add_container">
    <div class="title">Register Admin</div>
    <div class="add_content">
      <form method="POST" action="<?php echo URLROOT?>/Admin_user_management/add_new_admin" enctype="multipart/form-data">
        <div class="user-details">
          
          <div class="input-box">
            <span class="details">First Name</span>
            <input type="text" placeholder="Enter your fisrt name" name="first_name">
            <span class="error_msg"><?php echo $data['first_name_err'] ?></span>
          </div>
          
          <div class="input-box">
            <span class="details">Last Name</span>
            <input type="text" placeholder="Enter your last name" name="last_name">
            <span class="error_msg"><?php echo $data['last_name_err'] ?></span>
          </div>
          
          <div class="input-box">
            <span class="details">Address Line 01</span>
            <input type="text" placeholder="" name="address_line_one">
            <span class="error_msg"><?php echo $data['address_line_one_err'] ?></span>
          </div>
          
          <div class="input-box">
            <span class="details">Address Line 02</span>
            <input type="text" placeholder="" name="address_line_two">
            <span class="error_msg"><?php echo $data['address_line_two_err'] ?></span>
          </div>
          
          <div class="input-box">
            <span class="details">Address Line 03</span>
            <input type="text" placeholder="" name="address_line_three">
            <span class="error_msg"><?php echo $data['address_line_three_err'] ?></span>
          </div>
          
          <div class="input-box">
            <span class="details">Address Line 04</span>
            <input type="text" placeholder="" name="address_line_four">
          </div>
          
          <div class="input-box">
            <span class="details">Email</span>
            <input type="text" placeholder="Enter your email" name="email">
            <span class="error_msg"><?php echo $data['email_err'] ?></span>
          </div>
          
          <div class="input-box">
            <span class="details">Phone Number</span>
            <input type="text" placeholder="Enter your number" name="contact_number">
            <span class="error_msg"><?php echo $data['contact_number_err'] ?></span>
          </div>
          
          <div class="input-box">
            <span class="details">NIC No</span>
            <input type="text" placeholder="Enter your NIC no" name="nic">
            <span class="error_msg"><?php echo $data['nic_err'] ?></span>
          </div>
          
          <div class="input-box">
            <span class="details">Birthday</span>
            <input type="date" placeholder="" name="birthday">
            <span class="error_msg"><?php echo $data['birthday_err'] ?></span>
          </div>

          <div class="input-box">
            <span class="details">Gender</span>
            <select name="admin_gender" id="admin_gender">
                <option value="Male">Male</option>
                <option value="Female">Female</option>
            </select>
            <!-- <span class="error_msg"><?php echo $data['gender_err'] ?></span> -->
         </div>

          <div class="input-box">
            <span class="details">Choose Profile Picture</span>
            <input type="file" name="propic" id="propic">
            <span class="error_msg"><?php echo $data['propic_err'] ?></span>
          </div>

          <div class="input-box">
            <span class="details">Bank Account Name</span>
            <input type="text" placeholder="" name="bank_account_name">
            <span class="error_msg"><?php echo $data['bank_account_name_err'] ?></span>
          </div>
          
          <div class="input-box">
            <span class="details">Bank Account Number</span>
            <input type="text" placeholder="" name="bank_account_no">
            <span class="error_msg"><?php echo $data['bank_account_no_err'] ?></span>
          </div>
          
          <div class="input-box">
            <span class="details">Bank</span>
            <input type="text" placeholder="" name="bank">
            <span class="error_msg"><?php echo $data['bank_err'] ?></span>
          </div>
          
          <div class="input-box">
            <span class="details">Branch of Bank</span>
            <input type="text" placeholder="" name="branch">
            <span class="error_msg"><?php echo $data['branch_err'] ?></span>
          </div>
          
          <div class="input-box">
            <span class="details">Password</span>
            <input type="password" placeholder="Enter your password" name="password">
            <span class="error_msg"><?php echo $data['password_err'] ?></span>
          </div>
          
          <div class="input-box">
            <span class="details">Confirm Password</span>
            <input type="password" placeholder="Confirm your password" name="confirm_password">
            <span class="error_msg"><?php echo $data['confirm_password_err'] ?></span>
          </div>
        
        </div>
          
        <div class="reg_button">
          <input type="submit" value="Register" >
        </div>
      </form>
    </div>
  </div>
</div>
</body>
</html>
