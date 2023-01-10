
<?php require APPROOT.'/views/inc/Header.php'?>
<?php require APPROOT.'/views/inc/component/Topnavbar.php'?>
<?php require APPROOT.'/views/inc/component/Sidebar.php'?>
    
<sectionc class="signup">

<div class="content">

        <h1 id="signupadmin">Sign Up as a Admin</h1>
        <form action="includes/signupadmin.inc.php" method="post">
            <div>
                <label>First name</label>
                <input type="text" id="first_name" name="first_name" required="true" placeholder="First Name..">

                <label>Last name</label>
                <input type="text" id="last_name" name="last_name" required="true" placeholder="Last Name..">

                <label>NIC</label>
                <input type="text" id="nic" name="nic" required="true" placeholder="Nic..">

                <label>Contact number</label>
                <input type="text" id="contact_number" name="contact_number" required="true" placeholder="Contact number..">
               
                <label>Birthday</label>
                <input type="date" id="birthday" name="birthday" required="true" placeholder="Birthday.." >

            </div>
            <div class="right">
                <label>Gender</label>
                
                <select name="gender" id="gender">
                <option value="male">Male</option>
               <option value="female">Female</option>
              

          </select><br><br>

                <label>Email</label>
                <input type="email" name="email" id="email" required="true" placeholder="email..">

                <label>Address</label>
                <input type="text" name="address" id="address" required="true" placeholder="Address..">


                <label>Password</label>
                <input type="password" name="password" id="password" required="true" placeholder="password..">

                <label>Confirm Password</label>
                <input type="password" name="passwordRepeat" id="passwordRepeat"  required="true" placeholder="Repeat password..">


                <button type="submit" name="submit">Sign Up</button>
            </div>



        </form>
        </body>
</div>
</section>   
    


<?php require APPROOT.'/views/inc/Footer.php'?>
