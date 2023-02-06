<link rel="stylesheet" href="../css/component/sidebar.css"></link>

<div class="sidebar">
   <img src="../img/Sidebar/dp1.jpeg" alt="user_image" id="userprofileimage"><br>
    <div class="user_detail">
        <span class="uname"> Punsara Deshan </span><br>
        <span class="position">Seller</span>
    </div>
    <ul>
        <li><a href="<?php echo URLROOT?>/seller_dashboard/view_dash" class="activeN"><i class="fas fa-table"></i>&nbsp;Dashboard</a></li>
        <li><a href="<?php echo URLROOT?>/seller_ad_management/view_listing" class="activeN"><i class="fa-sharp fa-solid fa-rectangle-ad" aria-hidden="true"></i>&nbsp;Advertisement Management</a></li>
        <li><a href="<?php echo URLROOT?>/seller_order_list/view_orders"><i class="fa-solid fa-sack-dollar"></i>&nbsp;Orders</a></li>
        <li><a href="#" class="activeN"><i class="fa-solid fa-shop"></i>&nbsp;Buy Raw Materials</a></li>

        <li><a href="<?php echo URLROOT?>/seller_feedback/view_feed" class="activeN"><i class="fa-solid fa-message" aria-hidden="true"></i>&nbsp;Feedbacks</a></li>
        <li><a href="<?php echo URLROOT?>/seller_complaints/view_complaints" class="activeN"><i class="fa-solid fa-file" aria-hidden="true"></i>&nbsp;Complaints</a></li>
        <li><a href="<?php echo URLROOT?>/seller_payment/view_payment" class="activeN"><i class="fa-solid fa-credit-card"></i>&nbsp;Payments</a></li>
    </ul>
</div>
