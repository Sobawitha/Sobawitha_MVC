<link rel="stylesheet" href="../css/Users/Users/view_profile.css"></link>
<?php require APPROOT.'/views/Users/component/Header.php'?>
<?php require APPROOT.'/views/Agri_officer/Agri_officer/officer_topnavbar.php'?>
<?php require APPROOT.'/views/Agri_officer/Agri_officer/Officer_Sidebar.php'?>
<!-- <script src="../js/Users/Notifications/push_notifications_profile.js"></script> -->
<!-- <script src="../js/Admin/Profile/profile.js"></script> -->



<!-- New -->

<div class="body">
    <div class="section_1">
   
    </div>
    <div id="notification-container">   </div>
   
 

    <div class="section_2">  
        <div class="settings">
        <div class="three_btns">
                <h4>Settings</h4>
                <div class="button" >
                <a href="<?php echo URLROOT?>/AgriOfficer/updateProfile"><input type="button" id="update_btn" value="Update Profile"></a>
                </div>

               
                <div class="button" >
                <a href="<?php echo URLROOT?>/Users/changePW"><input type="button" id="change_pwd"  value="Change Password"></a>
                </div>
                

                <form method="GET" >
                    <div class="button" >
                    <input type="button" onclick="popUpOpenDelete()" id="delete" value="Delete">
                    </div>
                   
                </form>
                <dialog id="deactivateUserPopup">
                    <div class="deactivateUserPopup">
                      <div class="dialog__heading">
                        <h2>Are you sure you want to delete your account ?</h2>
                        <button id="closebtntwo" type="button">
                                <i class="fa fa-times-circle" aria-hidden="true"></i>
                        </button>
                      </div>
                        
                      <div class="dialog__content">
                        <a href="<?php echo URLROOT?>/Admin/deactivateAccount/<?php echo $_SESSION['user_id'] ?>" id="yes">Yes</a>
                        <a href="<?php echo URLROOT?>/Admin/profile " id="no">No</a>
                      </div>
                    </div>
                    </dialog>
                </div>
        </div>

        <?php 
            // foreach($data['user'] as $user):?>
        <hr class="profile_hr">
        <div class="a_add_admin_maincontent">
            <!-- For push notifications -->

        <div class="container">
            <div class="title">Account Information</div>
            <div id="success-message"></div>
            <div class="profile_image">
                <img  src="./../public/upload/user_profile_pics/<?php echo $_SESSION['profile_image']?>" id="userprofileimage_for_viewprofile"/>
                
                <div class="image_change_button">
                
                <form method="POST" action="<?php echo URLROOT?>/AgriOfficer/change_profile_pic " enctype="multipart/form-data">
                
                <label for="propic" id="labelpic" >Change Picture</label>
                <input type="file" name="propic" id="propic" onchange="showButton()" />
                <br> <button type="button" onclick ="popUpOpenChangePic()" id="change_img" style="display:none;"  >Confirm change</button>
                <span class="error_msg"><?php echo $data['propic_err'] ?></span>
                <dialog id="confirmingChangePicPopup">
                    <div class="confirmingChangePicPopup">
                    <div class="dialog__heading">
                        <h2>Are you sure you want to change your profile pic?</h2>
                        <button id="closebtnthree" type="button">
                        <i class="fa fa-times-circle" aria-hidden="true"></i>
                        </button>
                    </div>
                    <div class="dialog__content">
                        <button type="submit" name="submitForm" value="true" id="green_yes">Yes</button>
                        <button type="button" id="no_btn" onclick="location.href='<?php echo URLROOT?>/AgriOfficer/profile'">No</button>

                    </div>
                    </div>
                </dialog>

           
         

            </form>

        
                </div>
            </div>
            <div class="content">
            <form action="#">
                <div class="user-details">
                <div class="input-box">
                    <span class="details">First Name</span>
                    <input type="text" placeholder="Enter your fisrt name" value="<?php echo $data['first_name']?>" readonly>
                </div>
                <div class="input-box">
                    <span class="details">Last Name</span>
                    <input type="text" placeholder="Enter your last name" value="<?php echo $data['last_name']?>" readonly>
                </div>
                <div class="input-box">
                    <span class="details">Address Line 01</span>
                    <input type="text" placeholder="" value="<?php echo $data['address_line_one']?>" readonly>
                </div>
                <div class="input-box">
                    <span class="details">Address Line 02</span>
                    <input type="text" placeholder="" value="<?php echo $data['address_line_two']?>" readonly>
                </div>
                <div class="input-box">
                    <span class="details">Address Line 03</span>
                    <input type="text" placeholder="" value="<?php echo $data['address_line_three']?>" readonly>
                </div>
                <div class="input-box">
                    <span class="details">Address Line 04</span>
                    <input type="text" placeholder=""  value="<?php echo $data['address_line_four']?>">
                </div>
                <div class="input-box">
                    <span class="details">Email</span>
                    <input type="text" placeholder="Enter your email" value="<?php echo $data['email']?>" readonly>
                </div>
                <div class="input-box">
                    <span class="details">Phone Number</span>
                    <input type="text" placeholder="Enter your number" value="<?php echo $data['contact_number']?>"readonly>
                </div>
                <div class="input-box">
                    <span class="details">NIC No</span>
                    <input type="text" placeholder="Enter your NIC no" value="<?php echo $data['nic']?>"readonly>
                </div>
                <div class="input-box">
                    <span class="details">Birthday</span>
                    <input type="text" placeholder="" value="<?php echo $data['dob']?>" readonly>
                </div>

                <div class="input-box">
                    <span class="details">Qualification File</span>
                    <?php if(empty($data['qualifications_all'])){ ?>
                        <button class="qualificationOne" disabled>No File to Download</button>
                    <?php } else {?>
                     <button class="qualificationTwo"><a download="<?php echo $data['qualifications']?>"  href="<?php echo URLROOT?>/upload/qualification_files/<?php echo  $data['qualifications'] ?>">Download</a></button>
                    <?php } ?>
                </div>
          
                </div>
            </form>
            </div>

            
        </div>
        </div>

    </div>

    <div class="last">

                <?php if (isset($_SESSION['success_msg'])): ?>
                <div class="success-msg"><i class="fa-regular fa-circle-check"></i> <?php echo $_SESSION['success_msg']; ?> <div class="progress-bar"></div>
               </div>
                <?php unset($_SESSION['success_msg']); ?>
                <?php endif; ?>
      
                <p class="notification_main_header">Notifications<i class="fa-solid fa-chevron-down" id="drop_down_arrow"></i></p>   
                <?php if(!empty($data['notifications'])){
                    ?>
                    <?php foreach ($data['notifications'] as $notifications): ?>
                        <?php if($notifications->type == "success"){
                            ?>
                                <div class="individual_notification_1" >
                            <?php
                        }else if($notifications->type == "information"){
                            ?>
                            <div class="individual_notification_2" >
                        <?php
                        }else if($notifications->type == "warning"){
                            ?>
                            <div class="individual_notification_3" >
                        <?php
                        }else if($notifications->type == "error"){
                            ?>
                            <div class="individual_notification_4" >
                        <?php
                        }else if($notifications->type == "custom_Message"){
                            ?>
                            <div class="individual_notification_5" >
                        <?php
                        }?>
                        
                        <span class="icon" ><i class="fa-regular fa-circle-check"></i></span>
                        <span class="notification_header"><?php echo $notifications->type ?></span><br>
                        <span class="notification_body"><?php echo $notifications->message ?></span><br>
                        <a href="<?php echo URLROOT?>/notification/delete_notification?notification_id=<?php echo $notifications->noti_id ?>"><i class="fa-solid fa-xmark" id="close"></i> </a>   
                    </div>
                    <?php endforeach;?>

                    <?php
                }else{?>
                    No notifications
                <?php
                }?>

        </div>

    <!-- <span id="isUpdated"><?php if(1){echo $_SESSION['profile_updateAdmin']; unset($_SESSION['profile_updateAdmin']);}?></span> -->


    


</div>

<div id="footer">
<?php require APPROOT.'/views/Users/component/footer.php'?>
</div>
