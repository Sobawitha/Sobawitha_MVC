<link rel="stylesheet" href="../css/Users/users/login.css"></link>
<?php require APPROOT.'/views/Users/component/Header.php'?>
      
    <section class="login">
        <div class="loginContent">
            
            <div class="login_details">
                
                <div class ="login_intro">
                    <h1><i class="fa-solid fa-arrow-left"></i> Back to Homepage</h1>
                    <h2>Welcome to Sobawitha</h2>
                    <p>Welcome to Sobawitha, your one-stop solution for all your fertilizer management needs. Our e-commerce platform makes it easy for you to 
                        manage your fertilizer orders and 
                        deliveries in a seamless and convenient manner. 
                        Whether you're a farmer, a agri-officer, or simply someone who wants to keep their garden healthy, Sobawitha has everything 
                        you need to get the job done. Login now to enjoy the benefits of our user-friendly 
                        platform and start managing your fertilizers with ease!</p>
                </div>

            </div>

                <div class="login_content">

                    <form method="POST" action="<?php echo URLROOT?>/Login/login" >
           
                        <div class="login_form_content">
                            
                            <div class="login_header">
                                <h1>LOGIN</h1>
                                <p> Don't have an account <a href="#">Sign Up</a></p>
                            </div>

                            <div class="login_inputs">
                                <label>Email</label><br>
                                <input type="text" id="email"  name="email" placeholder = "Enter your email.."><br>
                                <span class="error_msg"><?php echo $data['email_err'] ?></span><br>
                
                                <br><label>Password</label><br>
                                <input type="password" id="password"  name="password" placeholder="Enter your password.."><br>
                                <span class="error_msg"><?php echo $data['password_err'] ?></span><br>
                
                                <br><p id="forget_pw">Forgot password?</p> 
                                <button type="submit" name="submit">Log In</button>
                            
                            </div>
                        
                        </div>
                    </form>
                </div>
    
        </div>
    </section>