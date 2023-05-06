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

fetch('<?php echo  URLROOT ?>/Buyer_dashboard/fertilizer_type_donut_chart')
 .then(res =>  res.json())
 .then(results =>{



    console.log(data);
    var type = [];
    var count = [];
    var colors = [];
    if(results.success) {


        result.data.forEach(element => {
            type.push(element.type);
            count.push(element.count);
        });




    }   
   
   
    for(let i = 0; i < count.length; i++){
       
        colors.push(getRandomColor());
    }


    var ctx2 =  document.getElementById('dougnut').getContext('2d');
    var myChart2 =  new Chart(ctx2, {
       type:'doughnut',
       data:{
            
        labels: type,
         datasets:[{

            data:
         }]

 



       }




    })

 })








 function getRandomColor()
 {

    var letters = '0123456789ABCDEF';
    var color = '#';
    for(var i = 0; i < 6; i++)
    {
        color += letters[Math.floor(Math.random() * 16)];
    }
    return color;
 }















</script>