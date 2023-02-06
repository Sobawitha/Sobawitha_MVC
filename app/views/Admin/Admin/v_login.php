<link rel="stylesheet" href="../css/admin/login.css"></link>
<link rel="stylesheet" href="../css/component/alert_box.css"></link> 
<script src="../js/login.js"></script> 

<?php require APPROOT.'/views/inc/header.php'?>

        <!-- <div class="login_header">
        <a href="<?php echo URLROOT?>/Pages/home"><button class="home" name="home"><i class="fa fa-home" aria-hidden="true" id="homeImg"></i></button></a> -->

           
        <!-- <?php
        if(($data['login_err']) != ''){
            ?>
            <div id="overlap1">
                <div class="popup" id="pop_up">
                    <i class="fa fa-times-circle" aria-hidden="true" id="fail"></i>
                    <p><?php echo $data['login_err']?></p>
                </div>
            </div>
            <?php
        }
        ?> -->
        
            


        </div>
        <section class="login">
        <div class="loginContent">
            <form method="POST" action="<?php echo URLROOT?>/Admin_dashboard/main_view">
           
            <div>
            <h1>WELCOME TO SOBAWITHA</h1>
                <!-- <label>User Role</label><br><br><br>
                <select name="user_role" id="user_role" required="true">
                    <option value="admin">Admin</option>
                    <option value="buyer">Buyer</option>
                    <option value="seller">Seller</option>
                    <option value="supplier">Supplier</option>
                    <option value="agri_officer">Agri - Officer</option>
                </select><br> -->

                <label>Email</label>
                <input type="text" id="email" required="true" name="email" placeholder = "Enter your email..">

                <label>Password</label>
                <input type="password" id="password" required="true" name="password" placeholder="Enter your password..">
                <a href = "<?php echo URLROOT?>/Admin_dashboard/main_view"><button type="submit" name="submit">Log In</button></a>

            </div>
        </form>
</section>
  </div>
        <div>
            
        </div>


</body>

                    
                    