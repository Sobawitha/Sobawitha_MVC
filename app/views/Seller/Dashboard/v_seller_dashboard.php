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
                    <h2>Income change (Past 12 month)</h2><br>
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

            <div class="chartsLevel3">
              
                <div class="chart">
                    <h2>Forum Topics</h2><br>
                    <div>
                        <table class="forum_post_detail_table">
                            <tr>
                                <th>#</th>
                                <th>Product name</th>
                                <th>Quantity</th>
                                <th>Soled</th>
                                <th>Available</th>
                            </tr><?php 
                            foreach($data['forum_post_detail'] as $forum_post_detail):
                                ?>
                            <tr>
                                <td><?php echo $forum_post_detail->discussion_id?></td>
                                <td><?php echo $forum_post_detail->subject?></td>
                                <td><?php echo $forum_post_detail->date?></td>
                                <th><span class="<?php echo Setcolor($forum_post_detail->type)?>"><?php echo $forum_post_detail->type ?></span></th>
                                <td><?php echo $forum_post_detail->no_of_reply?></td>
                            </tr>
                                <?php endforeach;
                            ?>    
                        </table>
                        <div class="pagination">
                            <?php
                                $total_row_count = $data['no_of_forumposts'];
                                //$total_row_count = 27;
                                $uri = $_SERVER['REQUEST_URI'];
                                $total_pages = ceil($total_row_count / $_SESSION['num_per_page']);
                            
                                if(isset($_GET['page'])){
                                    $page = $_GET['page'];
                                }
                                else{
                                    $page = 1;
                                }
                            
                                if($page>1){ 
                                    echo "<a href='?page=".($page - 1)." '><span class=''><i class='fa fa-angle-double-left' aria-hidden='true' id='backword_bracket'></i></span></a>" ;
                                }
                            
                                for($i=1; $i<=$total_pages;$i++){
                                    $class = ($page == $i) ? "current_page" : ""; // add this line
                                    echo "<a href='?page=".($i)." '><span class='pagination_number $class'>$i</span></a>";
                                }
                            
                                if($i-1>$page){
                                    echo "<a href='?page=".($page + 1)." '><span class='' onclick='setcolor()'><i class='fa fa-angle-double-right' aria-hidden='true' id='forward_bracket'></i></span></a>";
                                }
                            ?>

                        </div>
                    </div>
                </div>
        </div>

    </div>
    </div>

    <div class="last">
</div>
</div>

<br><br>
<?php require APPROOT.'/views/Users/component/footer.php'?>




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

                
                    /*line chart */
                    fetch('<?php echo URLROOT ?>/seller_dashboard/income_linechart')
                    .then(response => response.json())
                    .then(result => {
                        console.log('result'); // Check the data in console

                        var month = [];
                        var count = [];

                        if (result.success) {
                            result.data.forEach(item => {
                                month.push(item.month);
                                count.push(item.count);
                            });

                            // create chart after fetching data
                            var ctx2 = document.getElementById('lineChart').getContext('2d');
                            var myChart2 = new Chart(ctx2, {
                                type: 'line',
                                data: {
                                    labels: month,
                                    datasets: [{
                                        label: 'Count',
                                        data: count,
                                        backgroundColor: [
                                            '#346357',   
                                        ],
                                        borderColor: [
                                            '#9bf4d5',
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
                                var width = $('#lineChart').width();
                                var height = $('#lineChart').height();
                                myChart1.canvas.width = width;
                                myChart1.canvas.height = height;
                                myChart1.resize();
                            });
                        }
                        else{
                            console.log("error");
                        }
                    })
                    .catch(error => {
                        console.error(error);
                    });


                </script>