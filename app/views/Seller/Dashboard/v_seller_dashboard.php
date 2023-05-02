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
                    <p class="count">Rs.<?php echo $data['tot_income']?></p>
                    <p class="topic">Total Income</p>
                    <p class="time_period">For last month</P>
                </div>
                <div class="p2" >
                    <i class="fa-solid fa-coins" id="icon_for_total_income"></i>
                </div>
                </div>
            </div>

            <div class='card' id="card2">
                <div class='content'>
                <div class="p1">
                    <p class="count"><?php echo $data['ongoing_order']?></p>
                    <p class="topic">Ongoing Orders</p>
                    <p class="time_period">For previous year</P>
                </div>
                <div class="p2">
                    <i class="fa-solid fa-bag-shopping" id="ongoin_order_icon"></i>
                </div>
                </div>
            </div>
            <div class='card' id="card3">
                <div class='content'>
                    <div class="p1">
                    <p class="count"><?php echo $data['ongoing_order']?></p>
                    <p class="topic">Completed orders</p>
                    <p class="time_period">For previous year</P>
                    </div>
                    <div class="p2">
                    <i class="fa-solid fa-list" id="complete_order_icon"></i>
                    </div>
                </div>
            </div>

            <div class='card' id="card3">
                <div class='content'>
                    <div class="p1">
                    <p class="count"><?php echo $data['no_of_complaint']?></p>
                    <p class="topic">Complaints</p>
                    <p class="time_period">For previous month</P>
                    </div>
                    <div class="p2">
                    <i class="fa-solid fa-file" id="complain_icon"></i>
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
                    <h2>Order status</h2><br>
                    <div>
                        <canvas id="doughnut"></canvas>
                    </div>
                </div>


            </div>
                <script src="../js/Users/dashboard/seller_chart_1.js"></script>
                <!-- <script src="../js/Users/dashboard/seller_chart_2.js"></script> -->

                <script>
                /* donut chart */
                fetch('<?php echo URLROOT ?>/seller_dashboard/order_status_donut_chart')
                    .then(response => response.json())
                    .then(result => {
                        console.log(result); // Check the data in console

                        var status = [];
                        var count = [];

                        if (result.success) {
                            result.data.forEach(item => {
                                status.push(item.status);
                                count.push(item.num_orders);
                            });

                            // create chart after fetching data
                            var ctx2 = document.getElementById('doughnut').getContext('2d');
                            var myChart2 = new Chart(ctx2, {
                                type: 'doughnut',
                                data: {
                                    labels: status, // Corrected from categories to status
                                    datasets: [{
                                        label: 'Count',
                                        data: count,
                                        backgroundColor: [
                                            '#deeaee',
                                            '#9bf4d5',
                                            '#346357',
                                            '#c94c4c'
                                        ],
                                        borderColor: [
                                            '#deeaee',
                                            '#9bf4d5',
                                            '#346357',
                                            '#c94c4c'
                                        ],
                                        borderWidth: 1
                                    }]
                                },
                                options: {
                                    responsive: true
                                }
                            });

                            // resize chart on window resize
                            $(window).resize(function() {
                                var width = $('#doughnut').width();
                                var height = $('#doughnut').height();
                                myChart2.canvas.width = width;
                                myChart2.canvas.height = height;
                                myChart2.resize();
                            });
                        }
                        else {
                            console.log("error");
                        }
                    })
                    .catch(error => {
                        console.error(error);
                    });
    </script>


        </div>

    </div>

    <div class="last">
</div>
</div>

<br><br>
<?php require APPROOT.'/views/Users/component/footer.php'?>