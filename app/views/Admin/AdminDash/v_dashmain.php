<link rel="stylesheet" href="../css/Users/dashboards/dashboard.css"></link>
<?php require APPROOT.'/views/Users/component/Header.php'?>
<?php require APPROOT.'/views/Admin/Admin/admin_topnavbar.php'?>
<?php require APPROOT.'/views/Admin/Admin/admin_Sidebar.php'?>



<div class="body">
    <div class="section_1">

    </div>
    <div class="section_2">
        <div class="dashboard">
            <div class='card' id="card1">
                <div class='content'>
                    <p class="count">Rs.<?php echo $data["tot_profit"]->total_profit ?></p>
                    <p class="topic">Total income</p>
                    <p class="time_period">For previous month</P>
                    <i class="fa-solid fa-coins" id="blog_icon"></i>
                    <i class="fa-sharp fa-solid fa-circle-info" id="demo"  onclick=()></i>
                </div>
            </div>

            <div class='card' id="card2">
                <div class='content'>
                    <p class="count"><?php echo $data["sellers_active"]->total_seller_count ?></p>
                    <p class="topic">Total Fertilizer Sellers</p>
                    <p class="time_period">All time</P>
                    <i class="fa-brands fa-sellsy" id="forum_icon"></i>
                    <i class="fa-sharp fa-solid fa-circle-info" id="demo"  onclick=()></i>
                </div>
            </div>
            <div class='card' id="card3">
                <div class='content'>
                    <p class="count"><?php echo $data['tot_sups']->total_supplier_count?></p>
                    <p class="topic">Registered suppliers</p>
                    <p class="time_period">All time</P>
                    <i class="fa-solid fa-truck-field" id="supplier_icon"></i>
                    <i class="fa-sharp fa-solid fa-circle-info" id="demo" onclick=()></i>
                </div>
            </div>

            <div class='card' id="card3">
                <div class='content'>
                    <p class="count"><?php echo $data['tot_agris']->total_agrio_count?></p>
                    <p class="topic">Total agri-officers</p>
                    <p class="time_period">All time</P>
                    <i class="fa-solid fa-user-secret" id="officer_icon" ></i>
                    <i class="fa-sharp fa-solid fa-circle-info" id="demo" onclick=()></i>
                </div>
            </div>

            <div class='card' id="card3">
                <div class='content'>
                    <p class="count"><?php echo $data['tot_fertilizer_ads']->total_fertilizer_adds_count?></p>
                    <p class="topic">Total fertilizer ads</p>
                    <p class="time_period">For previous month</P>
                    <i class="fa-solid fa-rectangle-ad" id="ad_icon"></i>
                    <i class="fa-sharp fa-solid fa-circle-info" id="demo" onclick=()></i>
                </div>
            </div>

            <var>
            <div class='card' id="card3">
                <div class='content'>
                    <p class="count"><?php echo $data['tot_complaints']->total_complaints?></p>
                    <p class="topic">complaints</p>
                    <p class="time_period">For previous month</P>
                    <i class="fa-solid fa-file"  id="complain_icon"></i>
                    <i class="fa-sharp fa-solid fa-circle-info" id="demo" onclick=()></i>
                </div>
            </div>
            </var>


        </div>

        <div class="demo">
            <!-- Demostration here -->
        </div>

    </div>

    <div class="last">

    </div>
</div>

<?php require APPROOT.'/views/Users/component/footer.php'?>
    