<link rel="stylesheet" href="../css/Users/users/login.css"></link>
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

                    <form method="POST" action="<?php echo URLROOT?>/Login/login" >
           
                        <div class="login_form_content">

                        <dialog id="addUserPopup">
                            <div class="addUserPopup">
                            <div class="dialog__heading">
                            <h2>Choose the user role for registrations</h2>
                            <button id="closebtn" type="button">
                                    <i class="fa fa-times-circle" aria-hidden="true"></i>
                            </button>
                            </div>
                            
                            <div class="dialog__content">
                            <a href="<?php echo URLROOT?>/Seller/seller_register" id="seller_reg"><i class="fa-brands fa-sellsy" id="icon_reg"></i><br>As seller</a>
                            <a href="<?php echo URLROOT?>/Buyer/buyer_register" id="buyer_reg"><i class="fa-sharp fa-solid fa-bag-shopping" id="icon_reg"></i><br>As buyer</a>
                            <a href="<?php echo URLROOT?>/Supplier/Supplier_register" id="supplier_reg"><i class="fa-solid fa-truck-field" id="icon_reg"></i><br>As supplier</a>    
                            </div>
                            </div>
                        </dialog>

                        
                            
                            <div class="login_header">
                                <h1>LOGIN</h1>
                                <p> Don't have an account <span onclick="popUpOpen()" id="sign_up">Sign Up</span></p>
                            </div>

                            <div class="login_inputs">
                                <label>Email</label><br>
                                <input type="text"  name="email" id="email"  placeholder = "Enter your email.."><br>
                                <span class="error_msg"><?php echo $data['email_err'] ?></span>
                
                                <br><label>Password</label><br>
                                <input type="password" name="password" id="password" placeholder="Enter your password.."><br>
                                <span class="error_msg"><?php echo $data['password_err'] ?></span><br>
                
                                <br><p id="forget_pw"><span onclick="window.location='<?php echo URLROOT?>/Login/forgot_password'" id="forgot_pwd">Forgot password?</p></span> 
                                
                                <button type="submit" name="login_btn" id="login_btn">Log In</button>
                            
                            </div>
                        
                        </div>

                        
                  

                    
                   
                    
                       
                        
                        
                    

              

                </div>
                    </form>

            
                       <!-- Forgot Password dialog -->
                       <!-- <dialog id="forgotPasswordDialog">
                            <div class="forgotPasswordDialog">
                            <div class="dialog__heading">
                            <h2>Forgot Password</h2>
                            <button id="closebtnforgot" type="button">
                                    <i class="fa fa-times-circle" aria-hidden="true"></i>
                            </button>
                            </div>
                            <form method="POST"> 
                            <div class="dialog__content_forgot">
                 
                            <label for="email" id="forgot_label">Enter your email address:</label> 
                            <input type="email" name="email_forgot" id="email_forgot" placeholder="Enter your account email.." name="email" required>  
                            <button type="submit" name="forgot_btn" id="forgot_btn">Submit</button>
                            
                            </div>
                            </form>
                            </div>
                        </dialog> -->
        </div>
    </section>

