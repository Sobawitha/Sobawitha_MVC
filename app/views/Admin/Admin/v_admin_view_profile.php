<link rel="stylesheet" href="../css/Users/Users/view_profile.css"></link>
<?php require APPROOT.'/views/Users/component/Header.php'?>
<?php require APPROOT.'/views/Admin/Admin/admin_topnavbar.php'?>
<?php require APPROOT.'/views/Admin/Admin/admin_sidebar.php'?>


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
                <input type="submit" id="change_pwd" value="Change Password">
                </div>
                <div class="button" >
                <input type="submit" id="delete" value="Delete">
                </div>
                </div>
        </div>
        <hr class="profile_hr">
        <div class="a_add_admin_maincontent">
        <div class="container">
            <div class="title">Account Information</div>
            <div class="profile_image">
                <img  src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($_SESSION['profile_image']);?>" id="userprofileimage_for_viewprofile"/>
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
                    <input type="text" placeholder="Enter your fisrt name" value="Devin" readonly>
                </div>
                <div class="input-box">
                    <span class="details">Last Name</span>
                    <input type="text" placeholder="Enter your last name" value="Yapa" readonly>
                </div>
                <div class="input-box">
                    <span class="details">Address Line 01</span>
                    <input type="text" placeholder="" value="58/B" readonly>
                </div>
                <div class="input-box">
                    <span class="details">Address Line 02</span>
                    <input type="text" placeholder="" value="Yehiya Road" readonly>
                </div>
                <div class="input-box">
                    <span class="details">Address Line 03</span>
                    <input type="text" placeholder="" value="Issadeen Town" readonly>
                </div>
                <div class="input-box">
                    <span class="details">Address Line 04</span>
                    <input type="text" placeholder=""  value="Matara">
                </div>
                <div class="input-box">
                    <span class="details">Email</span>
                    <input type="text" placeholder="Enter your email" value="yapadevin@gmail.com" readonly>
                </div>
                <div class="input-box">
                    <span class="details">Phone Number</span>
                    <input type="text" placeholder="Enter your number" value="071 1234567"readonly>
                </div>
                <div class="input-box">
                    <span class="details">NIC No</span>
                    <input type="text" placeholder="Enter your NIC no" value="992142200V"readonly>
                </div>
                <div class="input-box">
                    <span class="details">Birthday</span>
                    <input type="text" placeholder="" value="1999.08.01" readonly>
                </div>
                <div class="input-box">
                    <span class="details">Bank Account Name</span>
                    <input type="text" placeholder="" value="D.P.D Yapa"readonly>
                </div>
                <div class="input-box">
                    <span class="details">Bank Account Number</span>
                    <input type="text" placeholder="" value="123456789" readonly>
                </div>
                <div class="input-box">
                    <span class="details">Bank Name</span>
                    <input type="text" placeholder="" value="Sampath" readonly>
                </div>
                <div class="input-box">
                    <span class="details">Branch of Bank</span>
                    <input type="text" placeholder="" value="Matara - Super" readonly>
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