<link rel="stylesheet" href="../css/Users/Users/view_profile.css"></link>
<?php require APPROOT.'/views/Users/component/Header.php'?>
<?php require APPROOT.'/views/Agri_officer/Agri_officer/officer_topnavbar.php'?>
<?php require APPROOT.'/views/Agri_officer/Agri_officer/Officer_Sidebar.php'?>

<div class="body">
    <div class="section_1">

    </div>
    <div class="section_2">  
        <div class="settings">
        <div class="three_btns">
                <h4>Settings</h4>
                <div class="button" >
                <input type="submit" id="update_btn" value="Update">
                </div>

                <div class="button" >
                <a href="<?php echo URLROOT?>/Users/changePW"><input type="button" id="change_pwd"  value="Change Password"></a>
                </div>

                <div class="button" >
                <input type="submit" id="delete" value="Delete">
                </div>
                </div>
        </div>

        <?php 
            die();
            foreach($data['profile_detail'] as $profile_detail):?>
        <hr class="profile_hr">
        <div class="a_add_admin_maincontent">
        <div class="container">
            <div class="title">Account Information</div>
            <div class="profile_image">
                <img  src="./../public/upload/user_profile_pics/<?php echo $data['profile_picture']?>" id="userprofileimage_for_viewprofile"/>
                <div class="image_change_button">
                    <button id="change_img">change picture</button>
                    <button id="delete_img">delete picture</button>
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
                    <span class="details">Qualifications</span>
                    <input type="text" placeholder="Enter your qualifications" value="<?php echo $profile_detail->qualifications ?>"readonly>
                </div>
                <!-- <div class="input-box">
                    <span class="details">Birthday</span>
                    <input type="text" placeholder="" value="<?php echo $data['dob']?>" readonly>
                </div>
                <div class="input-box">
                    <span class="details">Qualification File</span>
                    <button class="qualification"><a download="<?php echo $data['qualifications']?>"  href="<?php echo URLROOT?>/upload/qualification_files/<?php echo  $data['qualifications']?>">Download</a></button>
                </div>
             
                </div>
                <div class="gender-details">
                <input type="radio" name="gender" checked="checked" id="dot-1">
                <input type="radio" name="gender" id="dot-2">
                </div>

                











            </form>
            </div>

            
        </div>
        </div>
        <?php endforeach;?>
    </div>

    <div class="last">
                    <p class="notification_main_header">Notifications<i class="fa-solid fa-chevron-down" id="drop_down_arrow"></i></p>
                    <div class="individual_notification_1">
                        <span class="icon" ><i class="fa-regular fa-circle-check"></i></span>
                        <span class="notification_header">Success</span><br>
                        <span class="notification_body">Success message</span><br>
                        <i class="fa-solid fa-xmark" id="close"></i>    
                    </div>

                    <div class="individual_notification_2">
                        <span class="icon" ><i class="fa-solid fa-triangle-exclamation"></i></span>
                        <span class="notification_header">Warning</span><br>
                        <span class="notification_body">Warning message</span><br>
                        <i class="fa-solid fa-xmark" id="close"></i>   
                    </div>

                    <div class="individual_notification_3">
                        <span class="icon" ><i class="fa-solid fa-circle-info"></i></span>
                        <span class="notification_header">Information</span><br>
                        <span class="notification_body">Information message</span><br>
                        <i class="fa-solid fa-xmark" id="close"></i>    
                    </div>

                    <div class="individual_notification_4">
                        <span class="icon" ><i class="fa-solid fa-circle-exclamation"></i></span>
                        <span class="notification_header">Error</span><br>
                        <span class="notification_body">Error message</span><br>
                        <i class="fa-solid fa-xmark" id="close"></i>    
                    </div>

                    <div class="individual_notification_5">
                        <span class="icon" ><i class="fa-regular fa-message"></i></span>
                        <span class="notification_header">Custom Message</span><br>
                        <span class="notification_body">Success message</span><br>
                        <i class="fa-solid fa-xmark" id="close"></i>    
                    </div>

    </div>
</div>

<?php require APPROOT.'/views/Users/component/footer.php'?>