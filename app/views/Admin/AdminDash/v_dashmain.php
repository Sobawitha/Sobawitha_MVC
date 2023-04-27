<link rel="stylesheet" href="../css/Admin/admin_dashboard.css"></link>
<?php require APPROOT.'/views/Users/component/Header.php'?>
<?php require APPROOT.'/views/Admin/Admin/admin_topnavbar.php'?>
<?php require APPROOT.'/views/Admin/Admin/admin_Sidebar.php'?>
<script src='https://cdn.jsdelivr.net/npm/chart.js@4.2.1/dist/chart.umd.min.js'></script>


<div class="body">
    <div class="section_1">

    </div>
    <div class="section_2">
       <h3>Admin Dashboard</h3>
        <hr>

        <div class="dashboard">
            <div class='card' id="card1">
                <div class='content'>
                    <div class="p1">
                    <p class="count"><?php echo empty($data["tot_profit"]->total_profit) ? 'Rs.0.00' : 'Rs.' . $data["tot_profit"]->total_profit ?></p>

                    <p class="topic">Total income</p>
                    <p class="time_period">For previous month</P>
                    </div>
                    <div class="p2" id="card_icon">
                    <i class="fa-solid fa-coins" id="blog_icon"></i>
                    </div>
                    <!-- <i class="fa-sharp fa-solid fa-circle-info" id="demo"  onclick=()></i> -->
                
                </div>
            </div>

            <div class='card' id="card2">
                <div class='content'>
                <div class="p1">
                    <p class="count"><?php echo $data["sellers_active"]->total_seller_count ?></p>
                    <p class="topic">Total Sellers</p>
                    <p class="time_period">All time</P>
                    </div>
                    <div class="p2">
                    <i class="fa-brands fa-sellsy" id="forum_icon"></i>
                    </div>
                
                </div>
            </div>

            <div class='card' id="card3">
                <div class='content'>
                <div class="p1">
                    <p class="count"><?php echo $data['tot_sups']->total_supplier_count?></p>
                    <p class="topic">Total Suppliers</p>
                    <p class="time_period">All time</P>
                    </div>
                    <div class="p2">
                    <i class="fa-solid fa-truck-field" id="supplier_icon"></i>
                    </div>
                </div>
                
            </div>

            <div class='card' id="card3">
                <div class='content'>
                <div class="p1">
                    <p class="count"><?php echo $data['tot_agris']->total_agrio_count?></p>
                    <p class="topic">Total agri-officers</p>
                    <p class="time_period">All time</P>
                    </div>
                    <div class="p2">
                    <i class="fa-solid fa-user-secret" id="officer_icon" ></i>
                    </div>
                
                </div>
            </div>

            <div class='card' id="card3">
                <div class='content'>
                <div class="p1">
                    <p class="count"><?php echo $data['tot_fertilizer_ads']->total_fertilizer_adds_count?></p>
                    <p class="topic">Total fertilizer ads</p>
                    <p class="time_period">For previous month</P>
                    </div>
                    <div class="p2">
                    <i class="fa-solid fa-rectangle-ad" id="ad_icon"></i>
                    </div>
                
                </div>
            </div>

            <var>
            <div class='card' id="card3">
                <div class='content'>
                <div class="p1">
                    <p class="count"><?php echo $data['tot_complaints']->total_complaints?></p>
                    <p class="topic">complaints</p>
                    <p class="time_period">For previous month</P>
                    </div>
                    <div class="p2">
                    <i class="fa-solid fa-file"  id="complain_icon"></i>
                    </div>
                
                </div>
            </div>
            </var>


        </div>

        <div class="demo">
        <div class="charts">
              
              <div class="chart">
                  <h2>Fertilizer Ads (Past 12 months)</h2><br>
                  <div>
                  <canvas id="lineChart"></canvas>   
                  </div>
              </div>

              <div class="chart" id="doughnut-chart">
                  <h2>User types</h2><br>
                  <div>
                      <canvas id="doughnut"></canvas>
                  </div>
              </div>


          </div>
              <script src="../js/Admin/Dashboard/fertilizer_ads_chart.js"></script>
              <script src="../js/Admin/Dashboard/user_type_chart.js"></script>
        </div>

    </div>

    <div class="last">

    </div>
</div>

<?php require APPROOT.'/views/Users/component/footer.php'?>
    