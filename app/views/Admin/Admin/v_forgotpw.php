<?php require APPROOT.'/views/inc/Header.php'?>
<?php require APPROOT.'/views/inc/component/Topnavbar.php'?>
<link rel="stylesheet" href="../css/users/profile.css"></link>
<div class="body">
        <div class="section_1">
            <a href="<?php echo URLROOT?>/Users/login"><button class="previous"><i class="fa fa-angle-double-left" aria-hidden="true"></i></button></a>
        </div>
        <div class="profile_detail">
            <form>
            <table >
                <tr>
                    <td><label>User email <label></td>
                    <td><input type="text" name="user email" require/></td>
                <tr>
                <tr>
                    <td><label>New password <label></td>
                    <td><input type="password" name="New password" require/></td>
                <tr>
                <tr>
                    <td><label>Confirm new password <label></td>
                    <td><input type="password" name="Confirm new password" require/></td>
                <tr>
            </table>
            </form>

            <div class="button_section">
                <button type="submit" class="update" onclick="update_pw()">Change Password</button>
            </div>
            
        </div>

        <div class="last">
        </div>
</div>
<?php require APPROOT.'/views/inc/Footer.php'?>