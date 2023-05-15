<?php require APPROOT.'/views/Users/component/Header.php'?>
<?php require APPROOT.'/views/Seller/Seller/seller_topnavbar.php'?>
<?php require APPROOT.'/views/Seller/Seller/seller_sidebar.php'?>
<link rel="stylesheet" href="../css/Users/dashboards/dashboard.css"></link>

<script src='https://cdn.jsdelivr.net/npm/chart.js@4.2.1/dist/chart.umd.min.js'></script>

<div class="body">
    <div class="section_1">

    </div>
    <div class="section_2">
        <!-- <div class="dashboard_header">
            <h2>My tasks</h2>
            <form method="POST">
            <div class="search_bar">
                <div class="search_content">
                    
                        <span class="search_cont"  onclick="open_cansel_btn()"><input type="text" name="search_text" id="search_text" require/></span>
                        <button type="submit" class="search_btn" onclick="clear_search_bar()" value=""><i class="fa-solid fa-xmark" id="cansel"  ></i></button>
                        <span  class="search_btn" onclick="search()"><i class="fa fa-search" aria-hidden="true" id="search" ></i></span>
                        
                    
                </div>
            </div>
            </form>
        </div> -->

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
                    <p class="count"><?php echo $data['complete_order']?></p>
                    <p class="topic">complete Orders</p>
                    <p class="time_period">For previous year</P>
                </div>
                <div class="p2">
                    <i class="fa-solid fa-bag-shopping" id="complete_order_icon"></i>
                </div>
                </div>
            </div>
            <div class='card' id="card3">
                <div class='content'>
                    <div class="p1">
                    <p class="count"><?php echo $data['wishlist_items']?></p>
                    <p class="topic">Wishlist items</p>
                    <p class="time_period">For previous month</P>
                    </div>
                    <div class="p2">
                    <i class="fa-solid fa-gift" id="complete_order_icon"></i>
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

                <div class="chart" id="bar-chart">
                    <h2>Supply item counts</h2><br>
                    <div>
                        <canvas id="bar"></canvas>
                    </div>
                </div>

                
<script>
                /*for search bar */
            function search(){
                let searchTerm = document.getElementById("search_text").value;
                if (searchTerm) {
                const regex = new RegExp(searchTerm, 'gi');
                const elements = document.querySelectorAll('body *');
                for (let i = 0; i < elements.length; i++) {
                    const element = elements[i];
                    if (element.childNodes.length === 1 && element.childNodes[0].nodeType === 3) {
                    const text = element.childNodes[0].textContent;
                    if (text.match(regex)) {
                        const highlightedText = text.replace(regex, '<span class="highlight">$&</span>');
                        element.innerHTML = highlightedText;
                    }
                    }
                }
                }

            }

            function open_cansel_btn(){
                document.getElementById("cansel").style.display='block';
            }

            function clear_search_bar(){
                document.querySelector(".search_cont").value='';
                document.getElementById("cansel").style.display='none';
            }
                
                
                /* donut chart */
                /*line chart */
                fetch('<?php echo URLROOT ?>/seller_dashboard/get_supply_item_details_chart')
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
                            var ctx2 = document.getElementById('bar').getContext('2d');
                            var myChart2 = new Chart(ctx2, {
                                type: 'bar',
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
                                var width = $('#bar').width();
                                var height = $('#bar').height();
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




            </div>

            <!-- <div class="chartsLevel3">
              
                <div class="chart">
                    <h2>Stock details</h2><br>
                    <div>
                        <table class="forum_post_detail_table">
                            <tr>
                                <th>#</th>
                                <th>Product name</th>
                                <th>Quantity</th>
                                <th>Soled</th>
                                <th>Available</th>
                            </tr><?php 

                            if(!empty($data['stock_details'])){
                            foreach($data['stock_details'] as $stock_details):
                                ?>
                            <tr>
                                <td><?php echo $stock_details->product_id?></td>
                                <td><?php echo $stock_details->product_name?></td>
                                <td><?php echo $stock_details->supplied_quantity?></td>
                                <th><span class=""><?php echo ($stock_details->supplied_quantity - $stock_details->quantity)?></th>
                                <?php if(($stock_details->quantity) ==0){?>
                                    <td><span id="out_stock"><?php echo $stock_details->quantity ?></span></td>
                                <?php
                                }else{
                                ?>
                                    <td><span><?php echo $stock_details->quantity ?></span></td>
                                <?php
                                }?>
                                
                            </tr>
                                <?php endforeach;
                            ?>    
                        </table>
                        <div class="pagination">
                            <?php
                                $total_row_count = $data['no_of_products'];
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
                            }else{
                                ?>
                                No found
                                <?php
                            }
                            ?>

                        </div>
                    </div>
                </div>
        </div> -->

    </div>
    </div>

    <div class="last">
</div>
</div>

<br><br>
<?php require APPROOT.'/views/Users/component/footer.php'?>



