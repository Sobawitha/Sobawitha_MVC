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
                    
                        <span class="search_cont"  onclick="open_cansel_btn()"><input type="text" name="search_text" id="search_text" require/></span>
                        <button type="submit" class="search_btn" onclick="clear_search_bar()" value=""><i class="fa-solid fa-xmark" id="cansel"  ></i></button>
                        <span  class="search_btn" onclick="search()"><i class="fa fa-search" aria-hidden="true" id="search" ></i></span>
                        
                    
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
                    <p class="time_period">For previous year</P>
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
                    <p class="time_period">For previous year</P>
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

                <div class="chart" id="bar-chart">
                    <h2 class="bar_head">Complaints</h2><br>
                    <div>
                        <canvas id="barChart"></canvas>
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

/*donut chart */
fetch('<?php echo URLROOT ?>/dashboard/category_donut_chart')
.then(response => response.json())
.then(result => {
    console.log(result); // Check the data in console

    var categories = [];
    var count = [];

    if (result.success) {
        result.data.forEach(item => {
            categories.push(item.category);
            count.push(item.num_category);
        });

        // create chart after fetching data
        var ctx2 = document.getElementById('doughnut').getContext('2d');
        var myChart2 = new Chart(ctx2, {
            type: 'doughnut',
            data: {
                labels: categories,
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
    else{
        console.log("error");
    }
})
.catch(error => {
    console.error(error);
});


/*line chart */
fetch('<?php echo URLROOT ?>/dashboard/blog_posts_linechart')
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


fetch('<?php echo URLROOT ?>/dashboard/complaint_bar_chart')
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



</script>

<!-- <script>
    function search(){
        let search_text = document.getElementById("search_text").value;
        console.log(search_text);
    }
    
</script> -->