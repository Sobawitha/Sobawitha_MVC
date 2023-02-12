<link rel="stylesheet" href="../css/Users/dashboards/dashboard.css"></link>
<?php require APPROOT.'/views/Users/component/Header.php'?>
<?php require APPROOT.'/views/Raw_material_supplier/Raw_material_supplier/supplier_topnavbar.php'?>
<?php require APPROOT.'/views/Raw_material_supplier/Raw_material_supplier/supplier_Sidebar.php'?>


<div class="body">
    <div class="section_1">

    </div>
    <div class="section_2">
        <div class="dashboard">
            <div class='card' id="card1">
                <div class='content'>
                    <p class="count">Rs.50000.00</p>
                    <p class="topic">Total income</p>
                    <p class="time_period">For last month</P>
                    <i class="fa-solid fa-coins" id="blog_icon"></i>
                    <i class="fa-sharp fa-solid fa-circle-info" id="demo"  onclick=()></i>
                </div>
            </div>

            <div class='card' id="card2">
                <div class='content'>
                    <p class="count">10</p>
                    <p class="topic">Ongoing orders</p>
                    <p class="time_period">For last month</P>
                    <i class="fa-solid fa-boxes-packing" id="forum_icon"></i>
                    <i class="fa-sharp fa-solid fa-circle-info" id="demo"  onclick=()></i>
                </div>
            </div>

            <div class='card' id="card3">
                <div class='content'>
                    <p class="count">10</p>
                    <p class="topic">Completed orders</p>
                    <p class="time_period">For previous month</P>
                    <i class="fa-regular fa-circle-check" id="complete_icon"></i>
                    <i class="fa-sharp fa-solid fa-circle-info" id="demo" onclick=()></i>
                </div>
            </div>

            <div class='card' id="card3">
                <div class='content'>
                    <p class="count">10</p>
                    <p class="topic">Complaints</p>
                    <p class="time_period">For previous month</P>
                    <i class="fa fa-file-text" aria-hidden="true" id="complain_icon"></i>

                    <i class="fa-sharp fa-solid fa-circle-info" id="demo" onclick=()></i>
                </div>
            </div>

            


        </div>

        <div class="demo">
            <!-- Demostration here -->
        </div>

    </div>

    <div class="last">

    </div>
</div>
<br><br><br>
<?php require APPROOT.'/views/Users/component/footer.php'?>