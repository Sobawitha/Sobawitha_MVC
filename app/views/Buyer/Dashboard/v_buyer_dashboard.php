<link rel="stylesheet" href= "../css/buyer/buyer_dashboard.css"></link>
<?php require APPROOT.'/views/Users/component/Header.php'?>
<?php require APPROOT.'/views/Buyer/Buyer/buyer_topnavbar.php'?>
<?php require APPROOT.'/views/Buyer/Buyer/buyer_Sidebar.php'?>
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
        <div class="dashboard">
            <div class='card' id="card1">
                <div class='content'>
                    <p class="count">Rs.50000.00</p>
                    <p class="topic">Total cost</p>
                    <p class="time_period">For last month</P>
                    <i class="fa-solid fa-coins" id="blog_icon"></i>
                    <i class="fa-sharp fa-solid fa-circle-info" id="demo"  onclick=()></i>
                </div>
            </div>

            <div class='card' id="card2">
                <div class='content'>
                    <p class="count">10</p>
                    <p class="topic">No of deals</p>
                    <p class="time_period">For last month</P>
                    <i class="fa-solid fa-handshake" id="deals"></i>
                    <i class="fa-sharp fa-solid fa-circle-info" id="demo"  onclick=()></i>
                </div>
            </div>

            <div class='card' id="card3">
                <div class='content'>
                    <p class="count">10</p>
                    <p class="topic">No of item</p>
                    <p class="time_period">In wish list</P>
                    <i class="fa-solid fa-list-ol" id="wishlist"></i>
                    <i class="fa-sharp fa-solid fa-circle-info" id="demo" onclick=()></i>
                </div>
            </div>

            <div class='card' id="card3">
                <div class='content'>
                    <p class="count">10</p>
                    <p class="topic">No of items</p>
                    <p class="time_period">In shopping cart</P>
                    <i class="fa-solid fa-cart-shopping" id="cart"></i>

                    <i class="fa-sharp fa-solid fa-circle-info" id="demo" onclick=()></i>
                </div>
            </div>

            <div class='card' id="card1">
                <div class='content'>
                    <p class="count">05</p>
                    <p class="topic">No of reviews</p>
                    <p class="time_period">For last month</P>
                    <i class="fa-solid fa-magnifying-glass" id="review"></i>
                    <i class="fa-sharp fa-solid fa-circle-info" id="demo"  onclick=()></i>
                </div>
            </div>

            

        </div>

        <div class="demo">
            
        
        <div class="charts">
              
              <div class="chart">
                  <h2>Fertilizer Type Distribution in Completed Orders</h2><br>
                  <div>
                      <canvas id="doughnut"></canvas>   
                  </div>
              </div>

              <div class="chart" id="doughnut-chart">
                  <h2>User types</h2><br>
                  <div>
                      <canvas id="doughnut"></canvas>
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


 fetch("http://localhost/Sobawitha/buyer_dashboard/fertilizer_type_donut_chart").then(response => response.json).then(results => {
        console.log(results);
        var labels = ["Liquid", "Solid", "Packet","Bottles"];
        var count = []
       
        console.log(labels, count);
        const fertilizer_type_donut_chart = new Chart(
            document.getElementById('doughnut'),
            {
                type: 'doughnut',
                data: {
                    labels: labels,
                    datasets: [
                        {
                            label: 'Count',
                            data:count,
                            backgroundColor: [
                        '#deeaee',
                        '#9bf4d5',
                        '#346357',
                        '#c94c4c',
                      
                    ],
                    borderColor: [
                        '#deeaee',
                        '#9bf4d5',
                        '#346357',
                        '#c94c4c',
                      
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true
            }
        });

    }
    ).catch(function(error){
        console.log(error);
    });







</script>