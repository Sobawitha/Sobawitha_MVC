<!--sidebar-->
<link rel="stylesheet" href="../css/component/sidebar.css"></link>
<script src="../js/component/sidebar.js"></script> 
<div class="sidebar">
    <div class="logo">
        <i class="fa-solid fa-leaf" id="leaf"></i>
        <span class="logo">SOBAWITHA</span>
        <i class="fa-solid fa-bars" id="equal"></i>
        <i class="fa-solid fa-play" id="shape"></i>
    </div>
    <img  src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($_SESSION['profile_image']);?>" id="userprofileimage"/>
     <div class="user_detail">
     <span class="uname"> <?php echo $_SESSION['username'] ," ",$_SESSION['lastname'] ?>  </span><br>
    <span class="position"><?php echo $_SESSION['position'] ?></span>
    </div>
    <ul>
        <li><a href="<?php echo URLROOT?>/Pages/home"><i class="fa-solid fa-house"></i>&nbsp;&nbsp;Home</a></li>
        <li><a href="<?php echo URLROOT?>/resources/resource_page"><i class="fa-solid fa-file-signature"></i>&nbsp;&nbsp;Resources</a></li>
        <li><a href="<?php echo URLROOT?>/forum/forum"><i class="fa-brands fa-forumbee"></i>&nbsp;&nbsp;Forum</a></li>
        <li><a href="#sell"><i class="fa-brands fa-sellsy"></i>&nbsp;&nbsp;Sell</a></li>
        <li><a href="dashboard.php" class="activeN"><i class="fas fa-table"></i>&nbsp;&nbsp;Dashboard</a></li>
        <li><a href="<?php echo URLROOT?>"><i class="fa-solid fa-users" aria-hidden="true"></i>&nbsp;&nbsp;User Mana.</a></li>
        <li><a href="#" class="activeN"><i class="fa-brands fa-forumbee" aria-hidden="true"></i>&nbsp;&nbsp;Forum Mana.</a></li>
        <li><a href="#" class="activeN"><i class="fa-sharp fa-solid fa-rectangle-ad" aria-hidden="true"></i>&nbsp;&nbsp;Ads Mana.</a></li>
        <li><a href="#" class="activeN"><i class="fa-solid fa-message" aria-hidden="true"></i>&nbsp;&nbsp;Feedbacks Mana.</a></li>
    </ul>
</div>