<link rel="stylesheet" href= "../css/buyer/buyer_dashboard.css"></link>
<?php require APPROOT.'/views/Users/component/Header.php'?>
<?php require APPROOT.'/views/Buyer/Buyer/buyer_topnavbar.php'?>
<?php require APPROOT.'/views/Buyer/Buyer/buyer_Sidebar.php'?>
<script src='https://cdn.jsdelivr.net/npm/chart.js@4.2.1/dist/chart.umd.min.js'></script>



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
            
        
         
        <!-- Demostration here -->



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


 fetch("<?php echo URLROOT?>/Buyer/buyer_dashboard/fertilizer_type_donut_chart").then(response => response.json).then(data =>() => {
        console.log(data);
        var lables = ["Liquid", "Solid", "Packet","Bottles"];
        var count = []
        count = result.data.map(value => value.no_of_items);
        const fertilizer_type_donut_chart = new Chart(
            document.getElementById('fertilizer_type_donut_chart'),
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
                      
                    ],
                    borderColor: [
                        '#deeaee',
                        '#9bf4d5',
                      
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