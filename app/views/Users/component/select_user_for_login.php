<link rel="stylesheet" href="../css/Users/component/select_user_for_login.css"></link>
<?php require APPROOT.'/views/Users/component/Header.php'?>

<!-- <span class="site_name" id="part_a">SOBA</span><span id="part_b">WITHA</span> -->

<div class="body">
    <div class="section_1">
    </div>
    <div class="section_2">
        <span class="step">STEP <span class="step">1</span></span>
        <br>
        <span class="register_page_header">Select your user role</span>
        <div class="user_register_cards">
            <div class="register_card">
                <span class="register_card_header"></span>
                <i class="fa-solid fa-person-sign"></i>
                <img src="../images/seller.png" alt="" class="src" id="card_image">
                <br><br><br>
                <a href="<?php echo URLROOT?>/Seller/seller_register"><button type="submit" class="register_user_button">Seller register</button></a>
            </div>

            <div class="register_card">
                <span class="register_card_header"></span>
                <img src="../images/buyer.png" alt="" class="src" id="card_image">
                <br><br><br>
                <a href="<?php echo URLROOT?>/Buyer/buyer_register"><button type="submit" class="register_user_button">Buyer register</button></a>
            </div>

            <div class="register_card">
                <span class="register_card_header"></span>
                <img src="../images/supplier.png" alt="" class="src" id="card_image">
                <br><br><br>
                <a href="<?php echo URLROOT?>/Supplier/Supplier_register"><button type="submit" class="register_user_button">Supplier register</button></a>
            </div>
        </div>
    </div>

    <div class="last">

    </div>
</div>


<?php require APPROOT.'/views/Users/component/footer.php'?>
























