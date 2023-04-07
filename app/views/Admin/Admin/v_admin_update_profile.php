<link rel="stylesheet" href="../css/Users/users/update_profile.css"></link>
<?php require APPROOT.'/views/Users/component/Header.php'?>
<?php require APPROOT.'/views/Admin/Admin/admin_topnavbar.php'?>
<?php require APPROOT.'/views/Admin/Admin/admin_sidebar.php'?>
<script src="../js/Admin/Profile/profile.js"></script>
<script src="../js/Users/Notifications/push_notifications_profile.js"></script>

<div class="body">
    <div class="section_1">

    </div>

    <div class="section_2">  
        <div class="settings">
        <div class="three_btns">
              
                <div class="button" >
              
                </div>
               
                </div>
        </div>
        <hr class="profile_hr">
        <div class="a_add_admin_maincontent">
        <div class="container">
            <div class="title">Account Information</div>
            <form method="POST" action="<?php echo URLROOT?>/Admin/updateProfile" enctype="multipart/form-data">
            
             <!-- Confirm Update Popup -->

                <dialog id="updateUserPopup">
                    <div class="updateUserPopup">
                      <div class="dialog__heading">
                        <h2>Are you sure you want to update your profile ?</h2>
                        <button id="closebtnfour" type="button">
                                <i class="fa fa-times-circle" aria-hidden="true"></i>
                        </button>
                      </div>
                        
                      <div class="dialog__content">
                        <button type="submit" name="submitForm" value="true" id="green_yes">Yes</button>
                        <button type="button" id="no" onclick="location.href='<?php echo URLROOT?>/Admin/profile'">No</button>
                      </div>
                    </div>
                    </dialog>
            
            
            
            <div class="profile_image">
                <img  src="./../public/upload/user_profile_pics/<?php echo $_SESSION['profile_image']?>" id="userprofileimage_for_viewprofile"/>
                <div class="image_change_button">
                
                <input type="button" id="update_profile" onclick="popUpOpenConfirmUpdate()"  value="Confirm Update">
                
                <button type="button" id="change_img" >Change picture </button>
                
                    <button type="button" id="delete_img" onclick="popUpOpenDeletePic()">delete picture</button>
                   

                    <dialog id="deactivateUserPopup">
                    <div class="deactivateUserPopup">
                      <div class="dialog__heading">
                        <h2>Are you sure you want to delete your Profile Picture ?</h2>
                        <button id="closebtntwo" type="button">
                                <i class="fa fa-times-circle" aria-hidden="true"></i>
                        </button>
                      </div>
                        
                      <div class="dialog__content">
                        <a href="<?php echo URLROOT?>/Admin/delete_profile_pic?>" id="yes">Yes</a>
                        <a href="<?php echo URLROOT?>/Admin/updateProfile " id="no">No</a>
                      </div>
                    </div>
                    </dialog>
                </div>
            </div>
            <div class="content">
                <div class="form_details">
                <div class="user-details">
                <div class="input-box">
                    <span class="details">First Name</span>
                    <input type="text" placeholder="" name="first_name" value="<?php echo $data['first_name']?>" >
                    <span class="error_msg"><?php echo $data['first_name_err'] ?></span>
                </div>

                <div class="input-box">
                    <span class="details">Last Name</span>
                    <input type="text" placeholder="" name="last_name" value="<?php echo $data['last_name']?>" >
                    <span class="error_msg"><?php echo $data['last_name_err'] ?></span>
                </div>
                <div class="input-box">
                    <span class="details">Address Line 01</span>
                    <input type="text" placeholder="" name="address_line_one" value="<?php echo $data['address_line_one']?>" >
                    <span class="error_msg"><?php echo $data['address_line_one_err'] ?></span>
                </div>

                <div class="input-box">
                    <span class="details">Address Line 02</span>
                    <input type="text" placeholder="" name="address_line_two" value="<?php echo $data['address_line_two']?>" >
                    <span class="error_msg"><?php echo $data['address_line_two_err'] ?></span>
                </div>

                <div class="input-box">
                    <span class="details">Address Line 03</span>
                    <input type="text" placeholder="" name="address_line_three" value="<?php echo $data['address_line_three']?>" >
                    <span class="error_msg"><?php echo $data['address_line_three_err'] ?></span>
                </div>

                <div class="input-box">
                    <span class="details">Address Line 04</span>
                    <select name="address_line_four" id="address_line_four">
                    <option value="Ampara">Ampara</option>
                    <option value="Anuradhapura">Anuradhapura</option>
                    <option value="Badulla">Badulla</option>
                    <option value="Batticaloa">Batticaloa</option>
                    <option value="Colombo">Colombo</option>
                    <option value="Galle">Galle</option>
                    <option value="Gampaha">Gampaha</option>
                    <option value="Hambantota">Hambantota</option>
                    <option value="Jaffna">Jaffna</option>
                    <option value="Kalutara">Kalutara</option>
                    <option value="Kandy">Kandy</option>
                    <option value="Kegalle">Kegalle</option>
                    <option value="Kilinochchi">Kilinochchi</option>
                    <option value="Kurunegala">Kurunegala</option>
                    <option value="Mannar">Mannar</option>
                    <option value="Matale">Matale</option>
                    <option value="Matara">Matara</option>
                    <option value="Moneragala">Moneragala</option>
                    <option value="Mullaitivu">Mullaitivu</option>
                    <option value="Nuwara Eliya">Nuwara Eliya</option>
                    <option value="Polonnaruwa">Polonnaruwa</option>
                    <option value="Puttalam">Puttalam</option>
                    <option value="Ratnapura">Ratnapura</option>
                    <option value="Trincomalee">Trincomalee</option>
                    <option value="Vavuniya">Vavuniya</option>
            </select>
          </div>
                
                <div class="input-box">
                    <span class="details">Email</span>
                    <input type="text" placeholder="Enter your email" value="<?php echo $data['email']?>" readonly>
                </div>

                <div class="input-box">
                    <span class="details">Phone Number</span>
                    <input type="text" placeholder="Enter your number" name="contact_number" value="<?php echo $data['contact_number']?>">
                    <span class="error_msg"><?php echo $data['contact_number_err'] ?></span>
                </div>

                <div class="input-box">
                    <span class="details">NIC No</span>
                    <input type="text" placeholder="Enter your NIC no" name="nic" value="<?php echo $data['nic']?>"readonly>
                    <span class="error_msg"><?php echo $data['nic_err'] ?></span>
                </div>

                <div class="input-box">
                    <span class="details">Birthday</span>
                    <input type="date" placeholder="" name="birthday" value="<?php echo $data['birthday']?>" >
                    <span class="error_msg"><?php echo $data['birthday_err'] ?></span>
                </div>

                <div class="input-box">
                    <span class="details">Bank Account Holder Name</span>
                    <input type="text" placeholder="" name="bank_account_name" value="<?php echo $data['bank_account_name']?>">
                    <span class="error_msg"><?php echo $data['bank_account_name_err'] ?></span>
                </div>

                <div class="input-box">
                    <span class="details">Bank Account Number</span>
                    <input type="text" placeholder=""  name="bank_account_no" value="<?php echo $data['bank_account_no']?>" >
                    <span class="error_msg"><?php echo $data['bank_account_no_err'] ?></span>
                </div>

                <div class="input-box">
                    <span class="details">Bank Name</span>
                    <input type="text" placeholder="" name="bank" value="<?php echo $data['bank']?>" >
                    <span class="error_msg"><?php echo $data['bank_err'] ?></span>
                </div>

                <div class="input-box">
                    <span class="details">Branch of Bank</span>
                    <input type="text" placeholder="" name="branch" value="<?php echo $data['branch']?>" >
                    <span class="error_msg"><?php echo $data['branch_err'] ?></span>
                </div>
                </div>

                </div>
                

            </form>









          
            </div>
        </div>
        </div>
    </div>
    <!-- </form> -->
</div>



<?php require APPROOT.'/views/Users/component/footer.php'?>
