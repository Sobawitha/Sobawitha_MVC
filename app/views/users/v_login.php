
<!-- <link rel="stylesheet" href="../css/users/login.css"></link> -->
<link rel="stylesheet" href="../css/component/alert_box.css"></link> 
<script src="../js/login.js"></script> 

<?php require APPROOT.'/views/inc/Header.php'?>

        <div class="login_header">
        <a href="<?php echo URLROOT?>/Pages/home"><button class="home" name="home"><i class="fa fa-home" aria-hidden="true" id="homeImg"></i></button></a>

           
        <?php
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
        ?>
        
        </div>
        <div class="login_content">
            <form method="POST" action="<?php echo URLROOT?>/Users/login">
                <div class="form_head">
                    <div class="title">LOG IN</div>
                </div>

                <br>

                <div class="form_body">
                    <label for="username" class="userN"><b>Username</b></label>
                    <div class="icon"><i class="fas fa-user"></i></div>
                    <input type="text" name="username"  placeholder="User name"  value="<?php echo $data['username']?>" required></input><br><br>

                    <label for="password" class="passW"><b>Password</b></label><br>
                    <div class="icon"><i class="fas fa-lock"></i></div>
                    <input type="password" name="password"  placeholder="Password" value="<?php echo $data['password']?>" required></input><br>
                    
                    <label for="foget_pw" ><a href="<?php echo URLROOT?>/Users/forgot_password" class="fogot_PW">Fogot password?</a></label><br>
                </div>

                <div class="form_footer">
                    <button type="submit" name="submit" class="login_butt">Login</button>
                </div>

            </form>

            <!--right side-->
            <div class=image_sec>
                <img src="../images/login2.jpg" class="image" width=50% >
            </div>
        </div>


</body>
</html>
                    
                    