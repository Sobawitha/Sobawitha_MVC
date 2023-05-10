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
            <button id="openDialog">Help</button>
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
                <li><a href="<?php echo URLROOT?>/Pages/home">Home</a></li>
                <li><a href="<?php echo URLROOT?>/Pages/#buying_section">Products</a></li>
                <li><a href="<?php echo URLROOT?>/resources/resource_page">Resources</a></li>
                <li><a href="<?php echo URLROOT?>/forum/forum">Forum</a></li>
                

                <?php 
                if(isset($_SESSION['user_email']))  {
                    $userEmail = $_SESSION['user_email'];
                }else{
                    $userEmail = '';
                }
                ?>

                <dialog id="helpDialog" class="dialog-box">
                    <form method="POST">
                        <button class="dialog-close">&times;</button>
                        <h2 class="dialog-title">Help</h2>
                        <label for="email">Email:</label>
                        <input type="email" id="email" value="<?php echo $userEmail; ?>" name="victim_mail" required>
                        <label for="content">Content:</label>
                        <textarea id="content" name="content" required></textarea>
                        <button type="submit" class="dialog-submit" formaction="<?php echo URLROOT ?>/Users/help_center/">Submit</button>
                    </form>
                    </dialog>

                <script>
                    const openDialogBtn = document.querySelector('#openDialog');
                    const dialog = document.querySelector('#helpDialog');

                    openDialogBtn.addEventListener('click', function() {
                    dialog.showModal();
                    });

                    dialog.querySelector('.dialog-close').addEventListener('click', function() {
                    dialog.close();
                    });



                </script>




            </ul>
        </div>

        <div class="coloumn-4">
            <?php 
                $baseUrl = "localhost";
                $currentUrl = $baseUrl . $_SERVER['REQUEST_URI'];
            ;?>

            
            <form method="POST" action="<?php echo URLROOT?>/Users/register_as_new_sletter?current_url=<?php echo $currentUrl ?>">
                <h3>Newsletter</h3>
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

