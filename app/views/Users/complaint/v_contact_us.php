<script src="../js/complaint/complaint.js"></script>
<link rel="stylesheet" href="../css/Users/complaint/contact_us.css"></link>
<?php require APPROOT.'/views/Users/component/Header.php'?>

<?php
if($_SESSION['user_flag'] == 1){
    require APPROOT.'/views/Admin/Admin/admin_topnavbar.php';
    require APPROOT . '/views/Admin/Admin/admin_Sidebar.php';
}
else if($_SESSION['user_flag'] == 3){
    require APPROOT.'/views/Seller/Seller/seller_topnavbar.php';
    require APPROOT . '/views/Seller/Seller/seller_Sidebar.php';
}
else if($_SESSION['user_flag'] == 2){
    require APPROOT.'/views/Buyer/Buyer/buyer_topnavbar.php';
    require APPROOT . '/views/Buyer/Buyer/buyer_Sidebar.php';
}
else if($_SESSION['user_flag'] == 4){
    require APPROOT.'/views/Raw_material_supplier/Raw_material_supplier/supplier_topnavbar.php';
    require APPROOT . '/views/Raw_material_supplier/Raw_material_supplier/supplier_Sidebar.php';
}
else if($_SESSION['user_flag'] == 5){
    require APPROOT.'/views/Agri_officer/Agri_officer/officer_topnavbar.php';
    require APPROOT . '/views/Agri_officer/Agri_officer/Officer_Sidebar.php';
}?>



<div class="body">
    <div class="section_1">
            
    </div>
    <div class="section_2">
        <span class="topic"> All help categories </span><br>
        <div class="complaint_category">
        
        <div class="category_card">
            <i class="fa-solid fa-cart-flatbed-suitcase" id="icon_category"></i>
            <span class="meaning_of_icon">Order status,product availability.</span>
        </div>

        <div class="category_card">
            <i class="fa-solid fa-circle-user" id="icon_category"></i>
            <span class="meaning_of_icon">Account access.</span>
        </div>

        <div class="category_card">
            <i class="fa-solid fa-gears" id="icon_category"></i>
            <span class="meaning_of_icon">Technical issues.</span>
        </div>

        <div class="category_card">
            <i class="fa-solid fa-handshake" id="icon_category"></i>
            <span class="meaning_of_icon">Buissness partnership.</span>
        </div>

        <div class="category_card">
            <i class="fa-solid fa-scale-unbalanced-flip" id="icon_category"></i>
            <span class="meaning_of_icon">Legal & Private questions.</span>
        </div>

        <div class="category_card">
            <i class="fa-solid fa-sack-dollar" id="icon_category"></i>
            <span class="meaning_of_icon">Paymets.</span>
        </div>

        </div>

        <span class="topic_for_contact_us_type">Contact us</span><br>

        <div class="contact_us_type" class="topic_icon">

            <div class="contact_us_card">
                <i class="fa-regular fa-comments" id="icon_contact_type"></i><br>
                <a href="<?php echo URLROOT?>/forum/forum"><button class="contact_button">Forum access</button></a>
                <p class="date">Monday - Sunday</p>
                <p class="time">24 Hours / 7 Days-a Week</p>
            </div>

            <div class="contact_us_card">
                <i class="fa-solid fa-paper-plane" id="icon_contact_type"></i><br>
                <a href="mailto:sobawitha@gmail.com"><button class="contact_button">Email us</button></a>
                <p class="stmt">Our team help in Wice will get back to you in no time.</p>
            </div>

            <div class="contact_us_card">
                <i class="fa-solid fa-phone" id="icon_contact_type"></i><br>
                <button class="contact_button">+77 777 777</button>
                <p class="date">Monday - Sunday</p>
                <p class="time">8.00a.m - 8.00p.m</p>
            </div>

            <div class="contact_us_card">
                <i class="fa-brands fa-forumbee" id="icon_contact_type"></i><br>
                <a href="#wrapper"><button class="contact_button">post now</button></a>
                <p class="date">Monday - Sunday</p>
                <p class="time">24 Hours / 7 Days-a Week</p>
            </div>

        </div>

        <div id="wrapper">
        <div class="contact_us_form">
        <form method="POST" action="<?php echo URLROOT?>/complaint/add_complaint" enctype="multipart/form-data">

                    <a href=""><label for="" class="closebtn"><i class="fa fa-times-circle" aria-hidden="true"></i></label></a><br>
                    <img src=".././public/images/customcare.png" id="custom_care"/>
                    <p class="contact_form_discription">Please select a topic below related to your inquiry. We'll show blog posts & forum that provide answers to some most common quections. If you dont find what you need, click 
                        through the prompts to access our contact form. </p>
                    <label for="email" class="label"><b>Your Email Address</b></label><br>
                    <input type="text" name="email"  class="input_field" value=<?php echo $_SESSION['user_email']?>  disabled></input><br><br>
                    
                    <label for="type" class="label"><b>Type</b></label><br>

                    <div class="f_filter_section">
                        <label for="order_status_product_availability" id="filter_label"> <input type="radio" id="order_status" name="type" value="order_status_product_availability">Order status,product availability</label>
                        <label for="account_access" id="filter_label"> <input type="radio" id="account_access" name="type" value="account_access">Account access</label><br>
                        <label for="technical_issues" id="filter_label"><input type="radio" id="technical_issues" name="type" value="technical_issues">Technical issues</label>
                        <label for="buisness_partnership" id="filter_label"><input type="radio" id="buisness_partnership" name="type" value="buisness_partnership">Buisness partnership</label><br>
                        <label for="legal_and_private_question" id="filter_label"><input type="radio" id="legal_and_private_question" name="type" value="legal_and_private_question">Legal & private question</label>
                        <label for="payments" id="filter_label"><input type="radio" id="payments" name="type" value="payments">Payments</label>
                    </div>
                    

                    <label for="subject" class="label"><b>Subject</b></label><br>
                    <input type="text" name="subject" class="input_field" placeholder=""   required></input><br><br>
                    

                    <label for="discription" class="label"><b>How can we help you</b></label><br>
                    <textarea width="250px" height="500px" class="discription" name="discription" required></textarea>
                    

                    <div class="foot">
                        <input type="submit" class="send" name="submit" value="submit"/>
                    </div>
        </form>
        </div>
        </div>


    </div>

    <div class="section_3">
        
    </div>

    </div>
</div>

<div id="footer">
<?php require APPROOT.'/views/Users/component/footer.php'?>
</div>



