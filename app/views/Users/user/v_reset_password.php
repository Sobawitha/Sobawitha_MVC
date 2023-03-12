<link rel="stylesheet" href="../css/Users/users/reset_password.css"></link>
<?php require APPROOT.'/views/Users/component/Header.php'?>
<script src="../js/Login/login.js"></script>


<section class="login">
        <div class="loginContent">
            
            <div class="login_details" style="background-image: linear-gradient(rgba(0,0,0,0.6),rgba(40, 40, 40, 0.6)),url(../public/images/background3.jpg);
                                background-size: cover;
                                height:100%;
                                -webkit-background-size:cover ;
                                background-position:center;
                                margin:0px;
                                padding:0px;">
                
                <div class ="login_intro">
                    
                    <h1> <i class="fa-solid fa-arrow-left"></i> &nbsp; &nbsp;<a href="<?php echo URLROOT?>/Pages/home" id="back_home">Back to Homepage</a></h1>
                    <i class="fa-solid fa-leaf" id="leaf"></i>
                    <h2>Welcome to Sobawitha</h2>
                    <p>Welcome to Sobawitha, your one-stop solution for all your fertilizer management needs. Our e-commerce platform makes it easy for you to 
                        manage your fertilizer orders and 
                        deliveries in a seamless and convenient manner. With Sobawitha, you can easily manage your 
                        sales, deliveries and orders all in one place. Sign up 
                        now to gain access to our platform and start expanding 
                        your reach in the fertilizer industry. Maximize your 
                        potential as a seller and join Sobawitha today!
                        </p>
                </div>

            </div>

                <div class="login_content">

                    <form method="POST" action="" >
           
                        <div class="login_form_content">
                        
                            
                            <div class="login_header">
                                <h1>Change Password</h1><br>
                                <span class="error_msg"><?php echo $data['empty_token_err'] ?></span><br>
                                <span class="error_msg" ><?php echo $data['token_expire_err'] ?></span><br>
                                <!-- <span class="error_msg"><?php echo $data['old_password_err'] ?></span><br> -->
                                <span class="error_msg"><?php echo $data['retype_new_password_err'] ?></span><br>
                            </div>

                            <div class="login_inputs">

                                <input type="hidden" name ="pwd_token" id="pwd_token" value="<?php if(isset($_GET['token'])){ echo $_GET['token'];} ?>" ><br>

                                <label>Email</label><br>
                                <input type="text"  name="email" id="email"  value="<?php if(isset($_GET['email'])){ echo $_GET['email'];} ?>" placeholder = "Autofill when you request a password reset." required readonly><br><br>
                                
                                <label>New Password</label><br>
                                <input type="password"  name="new_pwd" id="new_pwd"  placeholder = "Enter your new password.."><br>
                                <span class="error_msg"><?php echo $data['new_pwd_err'] ?></span>
                
                                <br><label>Confirm Password</label><br>
                                <input type="password" name="password" id="password" placeholder="Enter your new password again.."><br>
                                <span class="error_msg"><?php echo $data['confirm_password_err'] ?></span><br>
                                <span class="error_msg"><?php echo $data['password_err'] ?></span><br>
        
                                
                                <button type="submit" name="change_pw_btn" id="change_pw_btn">Change Password</button>
                            
                            </div>
                        
                        </div>
                    </div>
            </form>
        </div>
    </section>

