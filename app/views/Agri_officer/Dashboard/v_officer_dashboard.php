<link rel="stylesheet" href="../css/Users/dashboards/dashboard.css"></link>
<?php require APPROOT.'/views/Users/component/Header.php'?>
<?php require APPROOT.'/views/Agri_officer/Agri_officer/officer_topnavbar.php'?>
<?php require APPROOT.'/views/Agri_officer/Agri_officer/Officer_Sidebar.php'?>
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
                    <p class="count"> <?php echo (string)($data['no_of_blogposts'])?></p>
                    <p class="topic">Blog Posts</p>
                    <p class="time_period">For previous year</P>
                </div>
                <div class="p2" id="card_icon">
                    <i class="fa-sharp fa-solid fa-blog" id="blog_icon" ></i>
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

            <div class='card' id="card3">
                <div class='content'>
                    <div class="p1">
                    <p class="count">60</p>
                    <p class="topic">System usage</p>
                    <p class="time_period">For previous month</P>
                    </div>
                    <div class="p2">
                    <i class="fa-solid fa-user-gear" id="usage_icon"></i>
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
                <script src="../js/Users/dashboard/blog_post_chart1.js"></script>
                <script src="../js/Users/dashboard/blog_post_chart2.js"></script>


        </div>

    </div>

    <div class="last">

    </div>
</div>

<br><br>
<?php require APPROOT.'/views/Users/component/footer.php'?>