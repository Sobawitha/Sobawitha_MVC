<!-- <link rel="stylesheet" href="../css/Admin/view_more_info.css"></link> -->
<?php require APPROOT.'/views/Users/component/Header.php'?>
<?php require APPROOT.'/views/Admin/Admin/admin_topnavbar.php'?>
<?php require APPROOT.'/views/Admin/Admin/admin_sidebar.php'?>
<link rel="stylesheet" href="<?php echo URLROOT ?>/css/Admin/view_more_info.css"></link>


<div class="body">
    <div class="section_1">

    </div>
    <div class="section_2">  
        <div class="settings">
        <div class="three_btns">
                <h4>Settings</h4>
                <div class="button" >
                <input type="submit" id="update_btn" value="Update" disabled>
                </div>
                <div class="button" >
                <input type="submit" id="change_pwd" value="Change Password" disabled>
                </div>
                <div class="button" >
                <input type="submit" id="delete" value="Delete" disabled>
                </div>
                </div>
        </div>
        <hr class="profile_hr">
        <div class="a_add_admin_maincontent">
        <div class="container">
            <div class="title">Account Information</div>
            <div class="profile_image">
                <img  src="<?php echo URLROOT ?>/public/upload/user_profile_pics/<?php echo $data['user']->profile_picture?>" id="userprofileimage_for_viewprofile"/>
                <div class="image_change_button">
                    <button id="change_img" disabled>change picture</button>
                    <button id="delete_img" disabled>delete picture</button>
                </div>
            </div>
            <div class="content">
            <form action="#">
                <div class="user-details">
                <div class="input-box">
                    <span class="details">First Name</span>
                    <input type="text" placeholder="Enter your fisrt name" value="<?php echo $data['user']->first_name ?>" readonly>
                </div>
                <div class="input-box">
                    <span class="details">Last Name</span>
                    <input type="text" placeholder="Enter your last name" value="<?php echo $data['user']->last_name ?>" readonly>
                </div>
                <div class="input-box">
                    <span class="details">Address Line 01</span>
                    <input type="text" placeholder="" value="<?php echo $data['user']->address_line_one ?>" readonly>
                </div>
                <div class="input-box">
                    <span class="details">Address Line 02</span>
                    <input type="text" placeholder="" value="<?php echo $data['user']->address_line_two ?>" readonly>
                </div>
                <div class="input-box">
                    <span class="details">Address Line 03</span>
                    <input type="text" placeholder="" value="<?php echo $data['user']->address_line_three ?>" readonly>
                </div>
                <div class="input-box">
                    <span class="details">Address Line 04</span>
                    <input type="text" placeholder=""  value="<?php echo $data['user']->address_line_four ?>">
                </div>
                <div class="input-box">
                    <span class="details">Email</span>
                    <input type="text" placeholder="Enter your email" value="<?php echo $data['user']->email ?>" readonly>
                </div>
                <div class="input-box">
                    <span class="details">Phone Number</span>
                    <input type="text" placeholder="Enter your number" value="<?php echo $data['user']->contact_no ?>"readonly>
                </div>
                <div class="input-box">
                    <span class="details">NIC No</span>
                    <input type="text" placeholder="Enter your NIC no" value="<?php echo $data['user']->nic_no ?>"readonly>
                </div>
                <div class="input-box">
                    <span class="details">Birthday</span>
                    <input type="text" placeholder="" value="<?php echo $data['user']->dob ?>" readonly>
                </div>
                
                <div class="input-box">
                    <span class="details">Gender</span>
                    <input type="text" placeholder="" value="<?php echo $data['user']->gender == 'M' ||$data['user']->gender == 'm' ? 'Male' : 'Female' ?>" readonly>
                </div>

                <div class="input-box">
                    <span class="details">Bank Account Name</span>
                    <input type="text" placeholder="" value="<?php echo empty($data['user']->bank_account_name) ? 'None' : $data['user']->bank_account_name; ?>" readonly>

                
                </div>
                <div class="input-box">
                    <span class="details">Bank Account Number</span>
                    <input type="text" placeholder="" value="<?php echo empty($data['user']->bank_account_no) ? 'None' : $data['user']->bank_account_no; ?>" readonly>
                </div>
                <div class="input-box">
                    <span class="details">Bank Name</span>
                    <input type="text" placeholder="" value="<?php echo empty($data['user']->bank) ? 'None' : $data['user']->bank; ?>" readonly>
                </div>
                <div class="input-box">
                    <span class="details">Branch of Bank</span>
                    <input type="text" placeholder="" value="<?php echo empty($data['user']->branch) ? 'None' : $data['user']->branch; ?>" readonly>
                </div>

           

                <div class="input-box">
                    <span class="details">Qualifications</span>
                    <?php if(empty($data['user']->qualifications)){ ?>
                        <button class="qualificationOne" disabled>No File to Download</button>
                    <?php } else {?>
                     <button class="qualificationTwo"><a download="<?php echo $data['user']->qualifications ?>"  href="<?php echo URLROOT?>/upload/qualification_files/<?php echo  $data['user']->qualifications ?>">Download</a></button>
                    <?php } ?>
                </div>

                </div>
            

            </form>
            </div>
        </div>
        </div>
    </div>

</div>


