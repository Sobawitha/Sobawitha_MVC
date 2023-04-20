<link rel="stylesheet" href="../css/Users/dashboards/dashboard.css"></link>
<?php require APPROOT.'/views/Users/component/Header.php'?>
<?php require APPROOT.'/views/Agri_officer/Agri_officer/officer_topnavbar.php'?>
<?php require APPROOT.'/views/Agri_officer/Agri_officer/Officer_Sidebar.php'?>
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
                    <p class="count"> <?php echo (string)($data['no_of_blogposts'])?></p>
                    <p class="topic">Blog Posts</p>
                    <p class="time_period">For previous year</P>
                </div>
                <div class="p2" id="card_icon">
                    <i class="fa-solid fa-clipboard" id="blog_icon"></i>
                </div>
                </div>
            </div>

            <div class='card' id="card3">
                <div class='content'>
                    <div class="p1">
                    <p class="count"><?php echo (string)($data['no_of_category'])?></p>
                    <p class="topic">Post categories</p>
                    <p class="time_period">For previous month</P>
                    </div>
                    <div class="p2">
                    <i class="fa-solid fa-tag" id="category_icon"></i>
                    </div>  
                </div>
            </div>

            <div class='card' id="card2">
                <div class='content'>
                <div class="p1">
                    <p class="count"><?php echo (string)$data['no_of_forumposts']?></p>
                    <p class="topic">Forum Topics</p>
                    <p class="time_period">For previous year</P>
                </div>
                <div class="p2">
                    <i class="fa-brands fa-forumbee" id="forum_icon"></i>
                </div>
                </div>
            </div>
            <div class='card' id="card3">
                <div class='content'>
                    <div class="p1">
                    <p class="count"><?php echo (string)$data['no_of_complaints']?></p>
                    <p class="topic">Complaints</p>
                    <p class="time_period">For previous month</P>
                    </div>
                    <div class="p2">
                    <i class="fa fa-file-text" aria-hidden="true" id="complain_icon"></i>
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

            <br>
            <div class="chartsLevel2">
              
                <div class="chart">
                    <h2>Forum Topics</h2><br>
                    <div>
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
                    </div>
                </div>

                <div class="chart" id="bar-chart">
                    <h2>Complaints</h2><br>
                    <div>
                        <canvas id="barChart"></canvas>
                    </div>
                </div>


            </div>
                <script src="../js/Users/dashboard/officer_dashboard/blog_post_chart1.js"></script>
                <!-- <script src="../js/Users/dashboard/officer_dashboard/blog_post_chart2.js"></script> -->
                <script src="../js/Users/dashboard/officer_dashboard/complaint.js"></script>


        </div>

    </div>

    <div class="last">

    </div>
</div>

<br><br>
<?php require APPROOT.'/views/Users/component/footer.php'?>

<script>
fetch('<?php echo URLROOT ?>/dashboard/category_donut_chart')
    .then(response => response.json())
    .then(result => {
        if (result.success) {
            categories = result.data.map(item => item.category);
            count = result.data.map(item => item.num_category);

            // create chart after fetching data
            var ctx2 = document.getElementById('doughnut').getContext('2d');
            var myChart2 = new Chart(ctx2, {
                type: 'doughnut',
                data: {
                    labels: categories,
                    datasets: [{
                        label: 'Users',
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

            // print after fetch completes
            console.log("come here");
        }
    });

</script>