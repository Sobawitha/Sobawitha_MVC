<link rel="stylesheet" href="../css/Users/users/forgot_password.css"></link>
<?php require APPROOT.'/views/Users/component/Header.php'?>
<!-- <script src="../js/Login/login.js"></script> -->


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
                    
                    <h1> <i class="fa-solid fa-arrow-left"></i> &nbsp; &nbsp;<a href="<?php echo URLROOT?>/Login/login" id="back_home">Back to Login</a></h1>
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

                    <form method="POST" action="<?php echo URLROOT?>/Login/forgot_password" >
           
                        <div class="login_form_content">

                            <div class="login_header">
                                <h1>Forgot Password</h1>
                                <span class="error_msg"><?php echo $data['password_err'] ?></span>
                                <?php
                                  if(isset($_SESSION['status'])){
                                    ?>
                                          <div class="error_message">
                                                <h5><?php echo $_SESSION['status']; ?></h5>
                                          </div> 
                                     <?php
                                     unset($_SESSION['status']);     
                                  }
                                ?>
                             
                            </div>

                            <div class="login_inputs">
                                <label>Email</label><br>
                                <input type="text"  name="forgot_email" id="forgot_email"  placeholder = "Enter your email.."><br>
                                <span class="error_msg"><?php echo $data['email_err'] ?></span>
            
                                
                                <button type="submit" name="forgot_btn" id="forgot_btn">Send Password Reset Link</button>
                            
                            </div>
                        
                        </div>
                     </div>
                    </form>

            
        </div>
    </section>

