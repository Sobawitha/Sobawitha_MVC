<link rel="stylesheet" href="<?php echo URLROOT ?>/css/Admin/admin_dashboard.css"></link>
<?php require APPROOT.'/views/Users/component/Header.php'?>
<?php require APPROOT.'/views/Admin/Admin/admin_topnavbar.php'?>
<?php require APPROOT.'/views/Admin/Admin/admin_Sidebar.php'?>
<script src='https://cdn.jsdelivr.net/npm/chart.js@4.2.1/dist/chart.umd.min.js'></script>

<?php
    function setColor($type){
        if($type == 'faq') return 'set-green';
        if($type == 'feedback') return 'set-yellow';
        if($type == 'annousments') return 'set-orange';
        if($type == 'Jobs') return 'set-purple';
        if($type == 'Introductions') return 'set-blue';
    }

?>

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

            <div class='card' id="card3">
                <div class='content'>
                <div class="p1">
                    <p class="count"><?php echo $data['tot_raw_ads']->total_raw_adds_count?></p>
                    <p class="topic">Raw Material ads</p>
                    <p class="time_period">For previous month</P>
                    </div>
                    <div class="p2">
                    <i class="fa-solid fa-rectangle-ad" id="ad_icon"></i>
                    </div>
                
                </div>
            </div> 

            <div class='card' id="card3">
                <div class='content'>
                <div class="p1">
                    <p class="count"><?php echo $data['tot_forum_posts']->total_discussions ?></p>
                    <p class="topic">Total forum posts</p>
                    <p class="time_period">For previous month</P>
                    </div>
                    <div class="p2">
                    <id= class="fa-solid fa-file-pen" id="ad_icon"></i>
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
                    <h2>Advertisements (Past 12 months)</h2><br>
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

            <br>

            <div class="chartsLevel2">
              
                <div class="chart">
                    <h2>Latest 30 Forum Topics</h2><br>
                    <div>
                    <?php if(!empty($data['forum_post_detail'])): ?>
                        <table class="forum_post_detail_table">
                            <tr>
                                <th>#</th>
                                <th>Title</th>
                                <th>Date</th>
                                <th>Category</th>
                                <th>No of reply</th>
                               
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
                        <?php else: ?>
                            <div class="no-data-found">
                            <img src="<?php echo URLROOT ?>/images/No_Data_Found.png" alt="No Data Found">
                            <p>Sorry, no data found.</p>
                            </div>
                        <?php endif; ?>
                        <div class="pagination">
                            <?php
                                //$total_row_count = $data['no_of_forumposts'];
                                // $total_row_count = $data['forum_total_rows'];

                                $total_row_count = 30;
                                
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
            
                <div class="chart" id="bar-chart">
                    <h2>Complaints</h2><br>
                    <div class="chart-container">
                    <canvas id="barChart" ></canvas>
                    </div>
                    <h2>Top Rated Sellers</h2>
                    <br>
                    <div>

<div>
  <?php foreach ($data['top_rated_sellers'] as $top_rated_seller) { ?>
    <div class="top_sellers">
        <div>
      <span style="background-color: #f5f5f5; padding: 5px;"><?php echo $top_rated_seller->full_name; ?></span>
      </div>
      <?php $rating = floor($top_rated_seller->avg_rating); ?>
      <div class="progress">
        <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" style="width: <?php echo ($rating / 5) * 100; ?>%" aria-valuenow="<?php echo $rating; ?>" aria-valuemin="0" aria-valuemax="5">
          <?php echo $rating; ?>
        </div>
      </div>
    </div>
  <?php } ?>
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


<div id="footer">
<?php require APPROOT.'/views/Users/component/footer.php'?>
</div>

<script>


/*line chart */
fetch('<?php echo URLROOT ?>/Admin_dashboard/fertilizer_ads_linechart')
.then(response => response.json())
.then(result => {
    console.log(result); // Check the data in console
    var year = [];
    var month = [];
    var count = [];
    var count2 = [];

    if (result.success) {
        result.data.forEach(item => {
            // month.push(item.month);
            var monthName = item.month.substr(0, 3); // Get the first three letters of the month
            month.push(monthName + ' ' + item.year);
            count.push(item.count);
        });

        result.dataTwo.forEach(item => {
            count2.push(item.count);
        });

        // create chart after fetching data
        var ctx2 = document.getElementById('lineChart').getContext('2d');
        var myChart2 = new Chart(ctx2, {
            type: 'line',
            data: {
                labels: month,
                datasets: [{
                    label: 'Fertilizer Ads Count',
                    data: count,
                    backgroundColor: [
                        '#346357',   
                    ],
                    borderColor: [
                        '#9bf4d5',
                    ],
                    borderWidth: 1
                }, {
                    label: 'Raw Material Ads Count',
                    data: count2,
                    backgroundColor: [
                        '#864235',   
                    ],
                    borderColor: [
                        '#f4d59b',
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true
            }
        });

        // create a second chart
        var ctx3 = document.getElementById('lineChart2').getContext('2d');
        var myChart3 = new Chart(ctx3, {
            type: 'line',
            data: {
                labels: month,
                datasets: [{
                    label: 'Fertilizer Ads Count',
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

        // resize charts on window resize
        $(window).resize(function() {
            var width = $('#lineChart').width();
            var height = $('#lineChart').height();
            myChart2.canvas.width = width;
            myChart2.canvas.height = height;
            myChart2.resize();

            var width2 = $('#lineChart2').width();
            var height2 = $('#lineChart2').height();
            myChart3.canvas.width = width2;
            myChart3.canvas.height = height2;
            myChart3.resize();
        });
    }
    else{
        console.log("error");
    }
})
.catch(error => {
    console.error(error);
});

// Complaint bar chart
fetch('<?php echo URLROOT ?>/Admin_dashboard/complaint_bar_chart')
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
        var ctx2 = document.getElementById('barChart').getContext('2d');
        var myChart2 = new Chart(ctx2, {
            type: 'bar',
            data: {
                labels: month,
                datasets: [{
                    label: 'Count',
                    data: count,
                    backgroundColor: [
                        '#4a5568',   
                        '#4a5568',   
                        '#4a5568',   
                        '#4a5568',   
                        '#4a5568',   
                        '#4a5568',   
                        '#4a5568',   
                    ],
                    borderColor: [
                        '#9bf4d5',
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true,
                            fontColor: "#D1D5DB",
                            min:100
                        },
                        gridLines: {
                            color: "#4B5563"
                        }
                    }],
                    xAxes: [{
                        ticks: {
                            fontColor: "#D1D5DB",
                        },
                        gridLines: {
                            color: "#4B5563"
                        }
                    }]
                },
                legend: {
                    labels: {
                        fontColor: "#D1D5DB",
                    }
                }
            }
        });

        // resize chart on window resize
        $(window).resize(function() {
            var width = $('#barChart').width();
            var height = $('#barChart').height();
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

/*donut chart */
fetch('<?php echo URLROOT ?>/Admin_dashboard/type_donut_chart')
.then(response => response.json())
.then(result => {
    console.log(result); // Check the data in console

    var categories = [];
    var count = [];
     
    if (result.success) {
        labels= ['Admins','Buyers','Sellers','Suppliers','Agri-Officers'];
        counts = result.data.map(value => value.num_users)
        console.log(labels, counts);

        // create chart after fetching data
        var ctx2 = document.getElementById('doughnut').getContext('2d');
        var myChart2 = new Chart(ctx2, {
            type: 'doughnut',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Count',
                    data: counts,
                    backgroundColor: [
                        '#deeaee',
                        '#9bf4d5',
                        '#346357',
                        '#c94c4c',
                        '#acddde',
                    ],
                    borderColor: [
                        '#deeaee',
                        '#9bf4d5',
                        '#346357',
                        '#c94c4c',
                        '#acddde',
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
    } else {
        console.log("error");
    }
})
.catch(error => {
    console.error(error);
});






</script>