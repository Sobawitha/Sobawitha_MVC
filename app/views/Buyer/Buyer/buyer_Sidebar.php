<!--sidebar-->
<link rel="stylesheet" href="../css/Users/component/sidebar.css"></link>
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
        <li><a href="<?php echo URLROOT?>/dashboard/buyer_dashboard" class=""><i class="fas fa-table"></i>&nbsp;&nbsp;Dashboard</a></li>
        <li><a href="<?php echo URLROOT?>/purchase/display_all_purchases" class=""><i class="fa-solid fa-list-check"></i>&nbsp;&nbsp;Purchase</a></li>
        <li><a href="<?php echo URLROOT?>/wishlist/display_all_items" class=""><i class="fa-solid fa-heart-circle-check"></i>&nbsp;&nbsp;Wish List</a></li>
        <li><a href="<?php echo URLROOT?>/complaint/display_all_complaint" class=""><i class="fas fa-table"></i>&nbsp;&nbsp;Complaint</a></li>
    </ul>
</div>





























