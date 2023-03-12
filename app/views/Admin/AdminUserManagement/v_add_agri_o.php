<link rel="stylesheet" href="../css/admin/add_agri_o_n_admin.css"></link>
<?php require APPROOT.'/views/Users/component/Header.php'?>
<?php require APPROOT.'/views/Admin/Admin/admin_topnavbar.php'?>
<?php require APPROOT.'/views/Admin/Admin/admin_sidebar.php'?>



<div class="body">
    <div class="section_1">

    </div>
    <div class="section_2">
        &nbsp<div class="a_add_admin_maincontent">
          &nbsp<div class="add_container">
            <div class="title">Register Agri Officer</div>
            <div class="add_content">
              
            <form method="POST" action="<?php echo URLROOT?>/Admin_user_management/add_new_agri" enctype="multipart/form-data">
                <div class="user-details">
                  <div class="input-box">
                    <span class="details">First Name</span>
                    <input type="text" placeholder="Enter fisrt name" name="first_name" >
                    <span class="error_msg"><?php echo $data['first_name_err'] ?></span>
                  </div>

                  <div class="input-box">
                    <span class="details">Last Name</span>
                    <input type="text" placeholder="Enter last name" name="last_name">
                    <span class="error_msg"><?php echo $data['last_name_err'] ?></span>
                  </div>
                  
                  <div class="input-box">
                    <span class="details">Address Line 01</span>
                    <input type="text" placeholder="Enter house no: " name="address_line_one">
                    <span class="error_msg"><?php echo $data['address_line_one_err'] ?></span>
                  </div>
                  
                  <div class="input-box">
                    <span class="details">Address Line 02</span>
                    <input type="text" placeholder="Enter street name: " name="address_line_two" >
                    <span class="error_msg"><?php echo $data['address_line_two_err'] ?></span>
                  </div>
                 
                  <div class="input-box">
                    <span class="details">Address Line 03</span>
                    <input type="text" placeholder="Enter city: " name="address_line_three">
                    <span class="error_msg"><?php echo $data['address_line_three_err'] ?></span>
                  </div>
                  <div class="input-box">
                    <span class="details">Address Line 04</span>
                    <input type="text" placeholder="Enter district: " name="address_line_four">
                  </div>
                  
                  <div class="input-box">
                    <span class="details">Email</span>
                    <input type="text" placeholder="Enter email" name="email">
                    <span class="error_msg"><?php echo $data['email_err'] ?></span>
                  </div>
                  
                  <div class="input-box">
                    <span class="details">Phone Number</span>
                    <input type="text" placeholder="Enter contact number" name="contact_number">
                    <span class="error_msg"><?php echo $data['contact_number_err'] ?></span>
                  </div>
                  
                  <div class="input-box">
                    <span class="details">Birthday</span>
                    <input type="date" placeholder="" name="birthday">
                    <span class="error_msg"><?php echo $data['birthday_err'] ?></span>
                  </div>
                  
                  
                  
                  <div class="input-box">
                    <span class="details">NIC No</span>
                    <input type="text" placeholder="Enter nic no" name="nic" >
                    <span class="error_msg"><?php echo $data['nic_err'] ?></span>
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
                    <input type="file" id="propic" name="propic" >
                    <span class="error_msg"><?php echo $data['propic_err'] ?></span>
                  </div>

                  <div class="input-box">
                    <span class="details">Choose Qualification File</span>
                    <input type="file"  id="qualification" name="qualification">
                    <span class="error_msg"><?php echo $data['qualification_err'] ?></span>
                  </div>

                  <div class="input-box">
                    <span class="details">Password</span>
                    <input type="password" placeholder="Enter password"  name="password">
                    <span class="error_msg"><?php echo $data['password_err'] ?></span>
                  </div>

                  <div class="input-box">
                    <span class="details">Confirm Password</span>
                    <input type="password" placeholder="Confirm password" name="confirm_password" >
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
    </div>

    <div class="last">

    </div>
</div>











