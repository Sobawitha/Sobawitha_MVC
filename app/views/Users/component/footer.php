<?php require APPROOT.'/views/Users/component/Header.php'?>

<link rel="stylesheet" href="<?php echo URLROOT ?>/css/Users/component/footer.css"></link>
<script src="../js/Users/component/footer.js"></script>

<div class="footer_section">
    <div class="footer_content">
        <div class="coloumn-1">
        <i class="fa-solid fa-leaf" id="leaf_footer"></i>
        <span class="logo_footer">SOBAWITHA</span>
            <p class="about_us">We are a young company always looking for new and creative ideas to help you with our product ain your
                everyday work.</p>
        </div>

        <div class="coloumn-2">
            <h3>Contact</h3>
            <ul type="" class="lists">
                <li><i class="fa fa-map-marker" aria-hidden="true" id="contact_icons"></i> No 456,Reid Evenue, Colombo-07.</li>
                <li><i class="fa fa-phone" aria-hidden="true" id="contact_icons"></i> Phone: (041) 22 55 666</li>
                <li><i class="fa fa-mobile" aria-hidden="true" id="contact_icons"></i> Mobile: (077) 6 666 666</li>
                <li><i class="fa fa-envelope" aria-hidden="true" id="contact_icons"></i> Email: sobawitha@gamil.com</li>
            </ul>
        </div>

        <div class="coloumn-3">
            <h3>Links</h3>
            <ul type="" class="lists">
                <li><a href="">Home</a></li>
                <li><a href="">Products</a></li>
                <li><a href="">Resources</a></li>
                <li><a href="">Forum</a></li>
            </ul>
        </div>

        <div class="coloumn-4">
            <?php 
                $baseUrl = "localhost";
                $currentUrl = $baseUrl . $_SERVER['REQUEST_URI'];
            ;?>

            
            <form method="POST" action="<?php echo URLROOT?>/Users/register_as_new_sletter?current_url=<?php echo $currentUrl ?>">
                <h3>New Sletter</h3>
                <span class="new_sletter_form">
                    <input type="email" name="email" class="sign_up" placeholder="sign_up for free"></input>
                    <button type="sign_up" class="signup_btn">Sign-up</button>
                </span>
                <?php 
                    if(isset($_SESSION['error'])){
                        if($_SESSION['error'] == 'Email is already taken' or $_SESSION['error'] == 'Some thing happening wrong' ){
                        ?>
                            <span class="error" id="set_message"><?php echo $_SESSION['error']?></span>
                        <?php
                        }else{
                            ?>
                            <span class="success" id="set_message"><?php echo $_SESSION['error']?></span>
                            <?php
                        }
                        ?>
                        
                    <?php
                    }
                    unset($_SESSION['error']);
                ?>
            </form>
        </div>
    </div>
    <div class="copy-rights-section">
        <hr>
        <p class="copyright"><i class="fa fa-copyright" aria-hidden="true" id="copyright_icon"></i>2022 Copyright: <span class="developers">SobawithaDevelopers</span></p>
    </div>
</div>

</body>
</html>

