<?php require APPROOT.'/views/Users/component/Header.php'?>
<?php require APPROOT.'/views/Seller/Seller/seller_topnavbar.php'?>
<?php require APPROOT.'/views/Seller/Seller/seller_sidebar.php'?>
<link rel="stylesheet" href="../css/Users/dashboards/dashboard.css"></link>

<script src='https://cdn.jsdelivr.net/npm/chart.js@4.2.1/dist/chart.umd.min.js'></script>

<div class="body">
    <div class="section_1">

    </div>
    <div class="section_2">
        <div class="dashboard_header">
            <h2>My tasks</h2>
            <form method="POST">
            <div class="search_bar">
                <div class="search_content">
                    
                        <span class="search_cont" onclick="open_cansel_btn()"><input type="text" name="search_text" require/></span>
                        <button type="submit" class="search_btn" onclick="clear_search_bar()" value=""><i class="fa-solid fa-xmark" id="cansel" ></i></button>
                        <button type="submit" class="search_btn"><i class="fa fa-search" aria-hidden="true" id="search"></i></button>
                    
                </div>
            </div>
            </form>
        </div>

        <div class="dashboard">
            <div class='card' id="card1">
                <div class='content'>
                <div class="p1">
                    <p class="count">Rs.500000</p>
                    <p class="topic">Total Income</p>
                    <p class="time_period">For last month</P>
                </div>
                <div class="p2" >
                    <i class="fa-sharp fa-solid fa-blog" id="total_income_icon" ></i>
                </div>
                </div>
            </div>

            <div class='card' id="card2">
                <div class='content'>
                <div class="p1">
                    <p class="count">10</p>
                    <p class="topic">Ongoing Orders</p>
                    <p class="time_period">For last month</P>
                </div>
                <div class="p2">
                    <i class="fa-brands fa-forumbee" id="ongoin_order_icon"></i>
                </div>
                </div>
            </div>
            <div class='card' id="card3">
                <div class='content'>
                    <div class="p1">
                    <p class="count">10</p>
                    <p class="topic">Completed orders</p>
                    <p class="time_period">For previous month</P>
                    </div>
                    <div class="p2">
                    <i class="fa fa-file-text" aria-hidden="true" id="complete_order_icon"></i>
                    </div>
                </div>
            </div>

            <div class='card' id="card3">
                <div class='content'>
                    <div class="p1">
                    <p class="count">10</p>
                    <p class="topic">Complaints</p>
                    <p class="time_period">For previous month</P>
                    </div>
                    <div class="p2">
                    <i class="fa-solid fa-user-gear" id="complain_icon"></i>
                    </div>  
                </div>
            </div>


        </div>

        <div class="demo">
            <div class="charts">
              
                <div class="chart">
                    <h2>Blog posts (Past 12 month)</h2><br>
                    <div>
                    <canvas id="lineChart"></canvas>   
                    </div>
                </div>

                <div class="chart" id="doughnut-chart">
                    <h2>Blog post type</h2><br>
                    <div>
                        <canvas id="doughnut"></canvas>
                    </div>
                </div>


            </div>
                <script src="../js/Users/dashboard/seller_chart_1.js"></script>
                <script src="../js/Users/dashboard/seller_chart_2.js"></script>


        </div>

    </div>

    <div class="last">
</div>
</div>

<br><br>
<?php require APPROOT.'/views/Users/component/footer.php'?>