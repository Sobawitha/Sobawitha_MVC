<!-- <link rel="stylesheet" href="../css/Users/users/verify_email.css"></link> -->
<?php require APPROOT.'/views/Users/component/Header.php'?>
<link rel="stylesheet" href="<?php echo URLROOT ?>/css/Users/users/verify_email.css"></link>
<!-- <script src="../js/Login/login.js"></script> -->


<section class="login">
        <div class="loginContent">
            
            <div class="login_details" style="background-image: linear-gradient(rgba(0,0,0,0.6),rgba(40, 40, 40, 0.6)),url(http://localhost/Sobawitha_MVC/public/images/background3.jpg);
                                background-size: cover;
                                height:100%;
                                -webkit-background-size:cover ;
                                background-position:center;
                                margin:0px;
                                padding:0px;">
                
                <div class ="login_intro">
                    
                    <h1> <i class="fa-solid fa-arrow-left"></i> &nbsp; &nbsp;<a href="<?php echo URLROOT?>/Pages/Home" id="back_home">Back to Homepage</a></h1>
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
                                <h1>Verify Email Address</h1>
                                <span class="error_msg"><?php echo $data['code_err'] ?></span>
                           </div>

                            <div class="login_inputs">
                                
                            <label>Email</label><br>
                

                                <input type="text"  name="verify_email" id="verify_email"  value="<?php echo $data['email'] ?>" placeholder = "Autofill when you request a password reset." required readonly><br><br>
                                <span class="error_msg"><?php echo $data['email_err'] ?></span><br>

                                <label>Verification Code</label><br>
                                <input type="text"  name="verify_code" id="verify_code"  placeholder = "Enter verification code that sent to the email.."><br>
                                <span class="error_msg"><?php echo $data['token_unmatch_err'] ?></span><br>
                                <span class="error_msg"><?php echo $data['token_err'] ?></span>
            
                                
                                <button type="submit" name="verify_btn" id="verify_btn">Verify</button>
                            
                            </div>
                        
                        </div>
                     </div>
                    </form>

            
        </div>
    </section>

