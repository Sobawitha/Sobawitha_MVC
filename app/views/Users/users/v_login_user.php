<link rel="stylesheet" href="../css/admin/user_view_more_info.css"></link>
<?php require APPROOT.'/views/inc/header.php'; ?>
<?php require APPROOT.'/views/inc/component/topnavbar.php'; ?>
<?php require APPROOT.'/views/inc/component/adminSidebar.php'; ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
<body>
<div class="a_add_admin_maincontent">
  <div class="container">
    <div class="title">Account Information</div>
    <div class="content">
      <form action="#">
        <div class="user-details">
          <div class="input-box">
            <span class="details">First Name</span>
            <input type="text" placeholder="Enter your fisrt name" value="Devin" required>
          </div>
          <div class="input-box">
            <span class="details">Last Name</span>
            <input type="text" placeholder="Enter your last name" value="Yapa" required>
          </div>
          <div class="input-box">
            <span class="details">Address Line 01</span>
            <input type="text" placeholder="" value="58/B" required>
          </div>
          <div class="input-box">
            <span class="details">Address Line 02</span>
            <input type="text" placeholder="" value="Yehiya Road" required>
          </div>
          <div class="input-box">
            <span class="details">Address Line 03</span>
            <input type="text" placeholder="" value="Issadeen Town" required>
          </div>
          <div class="input-box">
            <span class="details">Address Line 04</span>
            <input type="text" placeholder=""  value="Matara">
          </div>
          <div class="input-box">
            <span class="details">Email</span>
            <input type="text" placeholder="Enter your email" value="yapadevin@gmail.com" required>
          </div>
          <div class="input-box">
            <span class="details">Phone Number</span>
            <input type="text" placeholder="Enter your number" value="071 1234567"required>
          </div>
          <div class="input-box">
            <span class="details">NIC No</span>
            <input type="text" placeholder="Enter your NIC no" value="992142200V"required>
          </div>
          <div class="input-box">
            <span class="details">Birthday</span>
            <input type="text" placeholder="" value="1999.08.01" required>
          </div>
          <div class="input-box">
            <span class="details">Bank Account Name</span>
            <input type="text" placeholder="" value="D.P.D Yapa"required>
          </div>
          <div class="input-box">
            <span class="details">Bank Account Number</span>
            <input type="text" placeholder="" value="123456789" required>
          </div>
          <div class="input-box">
            <span class="details">Bank Name</span>
            <input type="text" placeholder="" value="Sampath" required>
          </div>
          <div class="input-box">
            <span class="details">Branch of Bank</span>
            <input type="text" placeholder="" value="Matara - Super" required>
          </div>
        </div>
        <div class="gender-details">
          <input type="radio" name="gender" checked="checked" id="dot-1">
          <input type="radio" name="gender" id="dot-2">
          <span class="gender-title">Gender</span>
          <div class="category">
            <label for="dot-1">
            <span class="dot one"></span>
            <span class="gender" >Male</span>
          </label>
          <label for="dot-2">
            <span class="dot two"></span>
            <span class="gender">Female</span>
          </label>
          </div>
        </div>
        <div class="three_btns">
        <div class="button" >
          <input type="submit" id="update_btn" value="Update">
        </div>
        <div class="button" >
          <input type="submit" id="change_pwd" value="Change Password">

Devin Aiya CS, [2/7/2023 7:27 PM]
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

Devin Aiya CS, [2/7/2023 7:27 PM]
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

Devin Aiya CS, [2/7/2023 7:28 PM]
<link rel="stylesheet" href="../css/admin/login.css"></link>
<link rel="stylesheet" href="../css/component/alert_box.css"></link> 
<!-- <script src="../js/login.js"></script>  -->

<?php require APPROOT.'/views/inc/header.php'?>
      
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