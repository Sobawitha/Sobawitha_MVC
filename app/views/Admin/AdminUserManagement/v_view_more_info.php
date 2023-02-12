<link rel="stylesheet" href="../css/Admin/view_more_info.css"></link>
<?php require APPROOT.'/views/Users/component/Header.php'?>
<?php require APPROOT.'/views/Admin/Admin/admin_topnavbar.php'?>
<?php require APPROOT.'/views/Admin/Admin/admin_sidebar.php'?>


<div class="body">
    <div class="section_1">

    </div>
    <div class="section_2">  
        <div class="settings">
        
                
        </div>
        
        <div class="a_add_admin_maincontent">
        <div class="container">
            <div class="title">Account Information</div>
            <div class="profile_image">
                <img  src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($_SESSION['profile_image']);?>" id="userprofileimage_for_viewprofile"/>
                
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
                    
    </div>
</div>


<?php require APPROOT.'/views/Users/component/footer.php'?>