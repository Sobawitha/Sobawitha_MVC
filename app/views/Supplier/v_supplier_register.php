<link rel="stylesheet" href="../css/supplier/supplier_register.css"></link>
<?php require APPROOT.'/views/inc/header.php'; ?>

<div class="signup_supplier_container">
    <div class="signup_supplier_intro">
        <a href="<?php echo URLROOT?>/Login/login"><h1><i class="fa-solid fa-arrow-left"></i> Back to Login page</h1></a>
        <h2>SOBAWITHA Supplier Sign Up<h2>
        <p>Join Sobawitha as a raw material supplier and become a 
            part of a thriving community of suppliers and buyers in 
            the fertilizer industry. Our e-commerce platform provides
             a seamless and efficient way for you to showcase your 
             products and reach new customers. Whether you're a 
             producer of raw materials used in fertilizer production 
             or a supplier of essential ingredients, Sobawitha can 
             help you grow your business and reach your goals. Sign 
             up now to take advantage of all the benefits that 
             Sobawitha has to offer and start connecting with 
             potential buyers today!</p>
    </div>
    <div class="signup_supplier_content">
        <div class="supplier_signup_part_one">
        
        <div class="s_input_box">
        <h1 id="sign_up_word">  Supplier Sign Up  </h1>
        </div>

        <div class="s_input-box">
            <span class="ssu_details">First Name</span><br>
            <input type="text" placeholder="Enter your fisrt name" required>
          </div>

          <div class="s_input-box">
            <span class="ssu_details">Last Name</span><br>
            <input type="text" placeholder="Enter your last name" required>
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
            <input type="text"  required>
          </div>

          <div class="s_input-box">
            <span class="ssu_details">Address Line 02</span><br>
            <input type="text"  required>
          </div>

          <div class="s_input-box">
            <span class="ssu_details">Address Line 03</span><br>
            <input type="text"  required>
          </div>

          <div class="s_input-box">
            <span class="ssu_details">Address Line 04</span><br>
            <input type="text"  >
          </div>

        </div>


        <div class="supplier_signup_part_two">

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
            <span class="ssu_details">Bank Account Number</span><br>
            <input type="text" placeholder="Enter your bank account no" required>
          </div> 

          <div class="s_input-box">
            <span class="ssu_details">Bank</span><br>
            <input type="text" placeholder="Enter your bank name" required>
          </div> 

          <div class="s_input-box">
            <span class="ssu_details">Branch</span><br>
            <input type="text" placeholder="Enter your bank branch" required>
          </div> 

          <div class="s_input-box">
            <span class="ssu_details">Bank Account Name</span><br>
            <input type="text" placeholder="Enter your bank account name" required>
          </div>

          <div class="s_input-box">
            <span class="ssu_details">Password</span><br>
            <input type="password" placeholder="Enter your password" required>
          </div>

          <div class="s_input-box">
            <span class="ssu_details">Confirm Your Password</span><br>
            <input type="text" placeholder="Confirm Your Password" required>
          </div>

          <div class="sign_up_supplier_btn">
          <input type="button" id="sign_up_sell_btn" value="Sign Up">
          </div>

        </div>
        
    </div>
</div>