<link rel="stylesheet" href="../css/Seller/seller_register.css"></link>
<?php require APPROOT.'/views/Users/component/Header.php'?>

<div class="signup_seller_container">
    <div class="signup_seller_intro">
    <a href="<?php echo URLROOT?>/Login/login"><h1><i class="fa-solid fa-arrow-left"></i> Back to Login page</h1></a>
        <h2>SOBAWITHA </h2>
        <span class="sign_up">Seller Sign Up<span>
        <br><br>
        <p>Join Sobawitha and become a part 
            of our growing community of fertilizer sellers! Our 
            e-commerce platform provides a reliable and efficient 
            way for you to reach new customers and sell your 
            products. With Sobawitha, you can easily manage your 
            sales, deliveries and orders all in one place. Sign up 
            now to gain access to our platform and start expanding 
            your reach in the fertilizer industry. Maximize your 
            potential as a seller and join Sobawitha today!</p>
    </div>
    
    <form method="POST" action="<?php echo URLROOT?>/Seller/seller_register" enctype="multipart/form-data">
    <div class="signup_seller_content">

    

        <div class="seller_signup_part_one">
        
       
        <div class="s_input_box">
        <h1 id="sign_up_word"> Seller Sign Up  </h1>
        </div>

        <div class="s_input-box">
            <span class="ssu_details">First Name</span><br>
            <input type="text" placeholder="Enter your fisrt name" name="first_name"><br>
            <span class="error_msg"><?php echo $data['first_name_err'] ?></span>
          </div>

          <div class="s_input-box">
            <span class="ssu_details">Last Name</span><br>
            <input type="text" placeholder="Enter your last name" name="last_name"><br>
            <span class="error_msg"><?php echo $data['last_name_err'] ?></span>
          </div>

          <div class="s_input-box">
            <span class="ssu_details">Email</span><br>
            <input type="email" placeholder="Enter your email" name="email"><br>
            <span class="error_msg"><?php echo $data['email_err'] ?></span>
          </div>

          <div class="s_input-box">
            <span class="ssu_details">Contact No</span><br>
            <input type="text" placeholder="Enter your mobile number" name="contact_number"><br>
            <span class="error_msg"><?php echo $data['contact_number_err'] ?></span>
          </div>

          <div class="s_input-box">
            <span class="ssu_details">Nic No</span><br>
            <input type="text" placeholder="Enter your nic no" name="nic"><br>
            <span class="error_msg"><?php echo $data['nic_err'] ?></span>
          </div>
        

          <div class="s_input-box">
            <span class="ssu_details">Address Line 01</span><br>
            <input type="text"  name="address_line_one"><br>
            <span class="error_msg"><?php echo $data['address_line_one_err'] ?></span>          
          </div>

          <div class="s_input-box">
            <span class="ssu_details">Address Line 02</span><br>
            <input type="text"  name="address_line_two"><br>
            <span class="error_msg"><?php echo $data['address_line_two_err'] ?></span>
          </div>

          <div class="s_input-box">
            <span class="ssu_details">Address Line 03</span><br>
            <input type="text"  name="address_line_three"><br>
            <span class="error_msg"><?php echo $data['address_line_three_err'] ?></span>
          </div>

          <div class="s_input-box">
            <span class="ssu_details">Address Line 04</span><br>
            <input type="text"  name="address_line_four"><br>
          </div>

        </div>


        <div class="seller_signup_part_two">

        <div class="s_input-box">
            <span class="ssu_details" >Birthday</span><br>
            <input type="date" name="birthday"><br>
            <span class="error_msg"><?php echo $data['birthday_err'] ?></span>
          </div>
<div class="s_input-box">
            <span class="ssu_details">Choose Profile Picture</span><br>
            <input type="file" id="propic" name="propic"><br>
            <span class="error_msg"><?php echo $data['propic_err'] ?></span>
          </div> 

          <div class="s_input-box">
            <span class="ssu_details">Gender</span><br>
            <select name="ssu_gender" id="ssu_gender">
                <option value="Male">Male</option>
                <option value="Female">Female</option>
            </select>
         </div>

            <div class="s_input-box">
            <span class="ssu_details">Bank Account Number</span><br>
            <input type="text" placeholder="Enter your bank account no" name="bank_account_no"><br>
            <span class="error_msg"><?php echo $data['bank_account_no_err'] ?></span>
          </div> 

          <div class="s_input-box">
            <span class="ssu_details">Bank</span><br>
            <input type="text" placeholder="Enter your bank name" name="bank"><br>
            <span class="error_msg"><?php echo $data['bank_err'] ?></span>
          </div> 

          <div class="s_input-box">
            <span class="ssu_details">Branch</span><br>
            <input type="text" placeholder="Enter your bank branch" name="branch"><br>
            <span class="error_msg"><?php echo $data['branch_err'] ?></span>
          </div> 

          <div class="s_input-box">
            <span class="ssu_details">Bank Account Name</span><br>
            <input type="text" placeholder="Enter your bank account name" name="bank_account_name"><br>
            <span class="error_msg"><?php echo $data['bank_account_no_err'] ?></span>
          </div>

          <div class="s_input-box">
            <span class="ssu_details">Password</span><br>
            <input type="password" placeholder="Enter your password" name="password"><br>
            <span class="error_msg"><?php echo $data['bank_account_no_err'] ?></span>          
          </div>

          <div class="s_input-box">
            <span class="ssu_details">Confirm Your Password</span><br>
            <input type="text" placeholder="Confirm your Password" name="confirm_password"><br>
            <span class="error_msg"><?php echo $data['bank_account_no_err'] ?></span>
          </div>

          <div class="sign_up_seller_btn">
          <input type="submit" id="sign_up_sell_btn" value="Sign Up">
          </div>

        </div>
   
    </div>
</div>
</form>