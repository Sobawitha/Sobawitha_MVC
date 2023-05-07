<link rel="stylesheet" href="../css/Users/Users/view_profile.css"></link>
<?php require APPROOT.'/views/Users/component/Header.php'?>
<script src="../js/Users/Notifications/push_notifications_profile.js"></script>
<script src="../js/Admin/Profile/profile.js"></script>

<?php
if($_SESSION['user_flag'] == 1){
    require APPROOT.'/views/Admin/Admin/admin_topnavbar.php';
}
else if($_SESSION['user_flag'] == 3){
    require APPROOT.'/views/Seller/Seller/seller_topnavbar.php';
}
else if($_SESSION['user_flag'] == 2){
    require APPROOT.'/views/Buyer/Buyer/buyer_topnavbar.php';
}
else if($_SESSION['user_flag'] == 4){
    require APPROOT.'/views/Raw_material_supplier/Raw_material_supplier/supplier_topnavbar.php';
}
else if($_SESSION['user_flag'] == 5){
    require APPROOT.'/views/Agri_officer/Agri_officer/officer_topnavbar.php';
}

?>



<div class="body">
    <div class="section_1">
   
    </div>
    <div id="notification-container">   </div>
   
 

    <div class="section_2">  
        <div class="settings">
        <div class="three_btns">
                
        </div>
        </div>


    
        <div class="a_add_admin_maincontent">
          

        <div class="container">
            <div class="title">Account Information</div>
                <div class="profile_image">
                    <img  src="./../public/upload/user_profile_pics/<?php echo $data['profile_detail'][0]->profile_picture?>" id="userprofileimage_for_viewprofile"/>
                </div>
            </div>
            <div class="content">
            <form action="#">
                <div class="user-details">
                <div class="input-box">
                    <span class="details">First Name</span>
                    <input type="text" placeholder="Enter your fisrt name" value="<?php echo $data['profile_detail'][0]->first_name?>" readonly>
                </div>
                <div class="input-box">
                    <span class="details">Last Name</span>
                    <input type="text" placeholder="Enter your last name" value="<?php echo $data['profile_detail'][0]->last_name?>" readonly>
                </div>
                <div class="input-box">
                    <span class="details">Address Line 01</span>
                    <input type="text" placeholder="" value="<?php echo $data['profile_detail'][0] -> address_line_one?>" readonly>
                </div>
                <div class="input-box">
                    <span class="details">Address Line 02</span>
                    <input type="text" placeholder="" value="<?php echo $data['profile_detail'][0]->address_line_two?>" readonly>
                </div>
                <div class="input-box">
                    <span class="details">Address Line 03</span>
                    <input type="text" placeholder="" value="<?php echo $data['profile_detail'][0]->address_line_three?>" readonly>
                </div>
                <div class="input-box">
                    <span class="details">Address Line 04</span>
                    <input type="text" placeholder=""  value="<?php echo $data['profile_detail'][0]->address_line_four?>" readonly>
                </div>
                <div class="input-box">
                    <span class="details">Email</span>
                    <input type="text" placeholder="Enter your email" value="<?php echo $data['profile_detail'][0]->email?>" readonly>
                </div>
                <div class="input-box">
                    <span class="details">Phone Number</span>
                    <input type="text" placeholder="Enter your number" value="<?php echo $data['profile_detail'][0]->contact_no?>"readonly>
                </div>
                <div class="input-box">
                    <span class="details">NIC No</span>
                    <input type="text" placeholder="Enter your NIC no" value="<?php echo $data['profile_detail'][0]->nic_no?>"readonly>
                </div>
                <div class="input-box">
                    <span class="details">Birthday</span>
                    <input type="text" placeholder="" value="<?php echo $data['profile_detail'][0]->dob?>" readonly>
                </div>

                <div class="input-box">
                    <span class="details">Qualification File</span>
                    <?php if(empty($data['profile_detail'][0]->qualifications)){ ?>
                        <button class="qualificationOne" disabled>No File to Download</button>
                    <?php } else {?>
                     <button class="qualificationTwo"><a download="<?php echo $data['profile_detail'][0]->qualifications?>"  href="<?php echo URLROOT?>/upload/qualification_files/<?php echo  $data['profile_detail'][0]->qualifications ?>">Download</a></button>
                    <?php } ?>
                </div>
          
                </div>
            </form>
            </div>

            
        </div>
        </div>

    </div>

    <div class="last">
    </div>
</div>

<div id="footer">
<?php require APPROOT.'/views/Users/component/footer.php'?>
</div>
