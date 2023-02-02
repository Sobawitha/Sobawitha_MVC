<link rel="stylesheet" href="../css/component/sidebar.css"></link>

<div class="sidebar">
   <img src="../img/Sidebar/DevOne.jpg" alt="user_image" id="userprofileimage"><br>
    <div class="user_detail">
    <span class="uname"> Devin Yapa </span><br>
    <span class="position">Admin</span>
    </div>
    <ul>
        <li><a href="<?php echo URLROOT?>/Admin_dashboard/main_view" class="activeN"><i class="fas fa-table"></i>&nbsp;Dashboard</a></li><hr>
        <li><a href="<?php echo URLROOT?>/Admin_user_management/user_manage"><i class="fa-solid fa-users" aria-hidden="true"></i>&nbsp;User Management</a></li><hr>
        <li><a href="<?php echo URLROOT?>/Admin_forum_management/view_forum" class="activeN"><i class="fa-brands fa-forumbee" aria-hidden="true"></i>&nbsp;Forum Management</a></li><hr>
        <li><a href="<?php echo URLROOT?>/Admin_ad_management/review" class="activeN"><i class="fa-sharp fa-solid fa-rectangle-ad" aria-hidden="true"></i>&nbsp;Advertisement Management</a></li><hr>
        <li><a href="<?php echo URLROOT?>/Admin_feedback_management/feed_review_pending" class="activeN"><i class="fa-solid fa-message" aria-hidden="true"></i>&nbsp;Feedbacks Management</a></li><hr>
        <li><a href="<?php echo URLROOT?>/Admin_complaints_management/comp_review_pending" class="activeN"><i class="fa-solid fa-file" aria-hidden="true"></i>&nbsp;Complaints Management</a></li><hr>
        <li><a href="<?php echo URLROOT?>/Admin_payments/view_payments" class="activeN"><i class="fa-solid fa-credit-card"></i>&nbsp;Payments</a></li>
</ul>
</div