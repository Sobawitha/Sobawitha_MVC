<link rel="stylesheet" href="../css/Users/users/changePW.css"></link>
<?php require APPROOT.'/views/Users/component/Header.php'?>

<?php if($_SESSION['user_flag'] ==1){ ?> 
        <?php require APPROOT.'/views/Admin/Admin/admin_topnavbar.php'?>
        <?php require APPROOT.'/views/Admin/Admin/admin_sidebar.php'?>
<?php }else if($_SESSION['user_flag'] == 2){ ?> 
        <?php require APPROOT.'/views/Buyer/Buyer/buyer_topnavbar.php'?>
        <?php require APPROOT.'/views/Buyer/Buyer/buyer_Sidebar.php'?>
<?php }else if($_SESSION['user_flag'] == 3){ ?> 
       <?php require APPROOT.'/views/Seller/Seller/seller_topnavbar.php'?>
        <?php require APPROOT.'/views/Seller/Seller/seller_sidebar.php'?>
<?php }else if($_SESSION['user_flag'] == 4){ ?> 
    <?php require APPROOT.'/views/Raw_material_supplier/Raw_material_supplier/supplier_topnavbar.php'?>
        <?php require APPROOT.'/views/Raw_material_supplier/Raw_material_supplier/supplier_sidebar.php'?>
<?php }else if($_SESSION['user_flag'] == 5){ ?> 
    <?php require APPROOT.'/views/Agri_officer/Agri_officer/officer_topnavbar.php'?>
        <?php require APPROOT.'/views/Agri_officer/Agri_officer/officer_sidebar.php'?>  
<?php
}
?>

<div class="body">
    <div class="section_1">

    </div>
    <div class="section_2">
        &nbsp<div class="a_add_admin_maincontent">
          &nbsp<div class="add_container">
            <div class="title">Change Password</div>
            <div class="add_content">
              
            <form action="<?php echo URLROOT ?>/Users/updatePW/<?php echo $_SESSION['user_id'];?>" method="POST">
                <div class="user_details">

                  <div class="input-box">
                    <span class="details">Current Password</span>
                    <input type="password" placeholder="Enter current password" name="current_password" >
                    <span class="error_msg"><?php echo $data['current_password_err'] ?></span>
                  </div>

                  <div class="input-box">
                    <span class="details">Password</span>
                    <input type="password" placeholder="Enter new password"  name="new_password">
                    <span class="error_msg"><?php echo $data['new_password_err'] ?></span>
                  </div>

                  <div class="input-box">
                    <span class="details">Confirm Password</span>
                    <input type="password" placeholder="Confirm new password" name="retype_new_password" >
                    <span class="error_msg"><?php echo $data['retype_new_password_err'] ?></span>
                  </div>
                
                </div>

                <div class="changepw_button">
                  <input type="submit" value="Change Password" >
                </div>

              </form>
            </div>
          </div>
        </div>
    </div>

    <div class="last">

    </div>
</div>











