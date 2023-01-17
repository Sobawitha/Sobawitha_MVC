<link rel="stylesheet" href="../css/dashboards/officer_dashboard.css"></link>
<?php require APPROOT.'/views/inc/Header.php'?>
<?php require APPROOT.'/views/inc/component/Topnavbar.php'?>
<?php require APPROOT.'/views/inc/component/Sidebar.php'?>



<div class="body">
    <div class="section_1">

    </div>
    <div class="section_2">
        <div class="dashboard">
            <div class='card' id="card1">
                <div class='content'>
                    <p class="count">10</p>
                    <p class="topic">Blog Posts</p>
                    <p class="time_period">For previous year</P>
                    <i class="fa-sharp fa-solid fa-blog" id="blog_icon"></i>
                    <i class="fa-sharp fa-solid fa-circle-info" id="demo"  onclick=()></i>
                </div>
            </div>

            <div class='card' id="card2">
                <div class='content'>
                    <p class="count">10</p>
                    <p class="topic">Forum Topics</p>
                    <p class="time_period">For previous year</P>
                    <i class="fa-brands fa-forumbee" id="forum_icon"></i>
                    <i class="fa-sharp fa-solid fa-circle-info" id="demo"  onclick=()></i>
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
            Demostration here
        </div>

    </div>

    <div class="last">

    </div>
</div>
