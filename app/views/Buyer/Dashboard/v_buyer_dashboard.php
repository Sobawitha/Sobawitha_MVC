<link rel="stylesheet" href= "../css/Buyer/buyer_dashboard.css"></link>
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
                    <div class = "p1">
                    <p class="count"> <?php echo $data['purchases_count']->total_completed_orders  ?></p>
                    <p class="topic"> Completed Orders</p>
                    <p class="time_period">For last month</P>
</div>
              <div class="p2" id="card_icon">
                    <i class="fa-solid fa-clipboard" id="blog_icon"></i>
                </div>
                </div>
            </div>

            <div class='card' id="card2">
                <div class='content'>
                    <div class="p1">
                    <p class="count">10</p>
                    <p class="topic">No of deals</p>
                    <p class="time_period">For last month</P>
                    </div>
                    <div class="p2">
                    <i class="fa-solid fa-handshake" id="deals"></i>
                    </div>
                   
                </div>
            </div>
<!-- 
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
            </div> -->

            <div class='card' id="card3">
                <div class='content'>
                    <div class="p1">
                    <p class="count"><?php echo $data['review_count']->review_count ?></p>
                    <p class="topic">No of reviews</p>
                    <p class="time_period">For last month</P>
              
</div>
                    <div class="p2">
                    <i class="fa-solid fa-magnifying-glass" id="review"></i>
</div>
                </div>
            </div>

            

        </div>

        <div class="demo">
            
        
        <div class="charts">
              
              <div class="chart">
                  <h2>Crop types of Completed Orders</h2><br>
                  <div>
                      <canvas id="doughnut"></canvas>   
                  </div>
              </div>

              <div class="chart" id="doughnut-chart">
                  <h2>Fertilizer Type Distribution in Completed Orders</h2><br>
                  <div>
                      <canvas id="doughnut2"></canvas>
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


 fetch("http://localhost/Sobawitha/buyer_dashboard/fertilizer_type_donut_chart").then(response => response.json()).then(results => {
        console.log(results.fertilizer_type_details);
        console.log(results.crop_type_details);
        var labels1 = ["Liquid", "Solid", "Packets","Bottles"];
        var labels2 = [];
        var count1 = [0, 0, 0, 0];
        var count2 = [];


        (results.fertilizer_type_details).forEach(val => {
          if (val !== null && val.type !== null && val.count !== null) {
                    var index = labels1.indexOf(val.type);
         if (index !== -1) {
                    count1[index] = val.count;
    }
  }
});       
       (results.crop_type_details).forEach(val => {
          if (val !== null && val.type !== null && val.count !== null) {
                    labels2.push(val.crop_type);
          }
        }
       );
       (results.crop_type_details).forEach(val => {
          if (val !== null && val.crop_type !== null && val.count !== null) {
                   var index1 = labels2.indexOf(val.crop_type);
            if (index1 !== -1) {
                        count2[index1] = val.count;

          }
         
 }})


        console.log(count1);
        const fertilizer_type_donut_chart = new Chart(
            document.getElementById('doughnut2'),
            {
                type: 'doughnut',
                data: {
                    labels: labels1,
                    datasets: [
                        {
                            label: 'Count',
                            data:count1,
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

        var backgroundColors = [];
        for (var i = 0; i < labels2.length; i++) {
        
            backgroundColors.push(randomColor());
        }

        const crop_type_donut_chart = new Chart(
            document.getElementById('doughnut'),
            {
                type: 'bar',
                data: {
                    labels: labels2,
                    datasets: [
                        {
                            label: 'Count',
                            data:count2,
                            backgroundColor:backgroundColors,
                    borderColor: backgroundColors,
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






    function randomColor(){
        var color = "#";
 
        
       color = '#000000';
        return color;
    }


</script>