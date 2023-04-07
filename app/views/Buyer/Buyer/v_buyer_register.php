
<link rel="stylesheet" href="../css/Buyer/buyer_register.css"></link>
<?php require APPROOT.'/views/Users/component/Header.php'?>

<div class="signup_seller_container">
<div class="signup_seller_intro">
    <a href="<?php echo URLROOT?>/Login/login"><h1><i class="fa-solid fa-arrow-left"></i> Back to Login page</h1></a><br>
    <i class="fa-solid fa-leaf" id="leaf"></i>    
    <h2>Sobawitha </h2>
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
    
    <div class="signup_seller_content">
        <div class="seller_signup_part_one">
        
        <div class="s_input_box">
        <!-- <h1 id="sign_up_word"> Buyer Sign Up  </h1> -->
        </div>

        <div class="s_input-box">
            <span class="ssu_details">First Name</span><br>
            <input type="text" placeholder="Enter your fisrt name" name="first_name">
          </div>

          <div class="s_input-box">
            <span class="ssu_details">Last Name</span><br>
            <input type="text" placeholder="Enter your last name" name="last_name">
          </div>

          <div class="s_input-box">
            <span class="ssu_details">Email</span><br>
            <input type="email" placeholder="Enter your email" required>
          </div>

          <div class="s_input-box">
            <span class="ssu_details">Contact No</span><br>
            <input type="text" placeholder="Enter your mobile number" required>
          </div>

          <div class="s_input-box">
            <span class="ssu_details">Nic No</span><br>
            <input type="text" placeholder="Enter your nic no" required>
          </div>
        

          <div class="s_input-box">
            <span class="ssu_details">Address Line 01</span><br>
            <input type="text" placeholder="Enter your house no: " required>
          </div>

          <div class="s_input-box">
            <span class="ssu_details">Address Line 02</span><br>
            <input type="text" placeholder="Enter your street name: " required>
          </div>

       
        </div>


        <div class="seller_signup_part_two">


        <div class="s_input-box">
            <span class="ssu_details">Address Line 03</span><br>
            <input type="text" placeholder="Enter your city: " required>
          </div>

          <div class="s_input-box">
            <span class="ssu_details">Address Line 04</span><br>
            <input type="text" placeholder="Enter your district: " >
          </div>

        <div class="s_input-box">
            <span class="ssu_details" >Birthday</span><br>
            <input type="date" required>
          </div>

          <div class="s_input-box">
            <span class="ssu_details">Choose Profile Picture</span><br>
            <input type="file" id="pro_pic" required>
          </div> 

          <div class="s_input-box">
            <span class="ssu_details">Gender</span><br>
            <select name="ssu_gender" id="ssu_gender">
                <option value="Male">Male</option>
                <option value="Female">Female</option>
            </select>
         </div>



        
     

          <div class="s_input-box">
            <span class="ssu_details">Password</span><br>
            <input type="password" placeholder="Enter your password" required>
          </div>

          <div class="s_input-box">
            <span class="ssu_details">Confirm Your Password</span><br>
            <input type="password" placeholder="Confirm your Password" required>
          </div>

          <div class="sign_up_seller_btn">
          <input type="submit" id="sign_up_sell_btn" value="Sign Up">
          </div>

        </div>
        
    </div>
</div>