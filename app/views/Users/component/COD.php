<link rel="stylesheet" href="../css/Users/component/orderpageII.css"></link>
<link rel="stylesheet" href="../css/Buyer/wish_list/wish_list.css"></link>
<?php require APPROOT.'/views/Users/component/Header.php';$sum = 0;?>

<div class="nav">
            <nav>
                <span class="site_name" id="part_a">SOBA</span><span id="part_b">WITHA</span>
                <ul>
                    <li class="home_link"><a href="<?php echo URLROOT?>/Pages/home">Home</a></li>
                    <li><a href="<?php echo URLROOT?>/resources/resource_page">Resources</a></li> 
                    <li><a href="<?php echo URLROOT?>/forum/forum">Forum</a></li> 
                    <li><a href="">Sell</a></li>
                    <li><a href="<?php echo URLROOT?>/Login/login"><i class="fa-regular fa-user" id="user_home"></i> Join Us</a></li>    
                </ul>
            </nav>
            <hr class="home_hr">
</div>

<div class="item-flex">

      <!--
       - checkout section
      -->
      <section class="checkout">

        <h2 class="section-heading">Billing Details</h2> 
           
         
</h2>
       
      

        <div class="payment-form">

         

          <form action="#">
           
               
            <div class="cardholder-name">
              <label for="cardholder-name" class="label-default">First Name</label>
              <input type="text" name="cardholder-name" id="cardholder-name" class="input-default"  value = "<?php  if(isset($data['user']->first_name)){echo $data['user']->first_name;}?>"/>
              <span></span>
            </div>

            <div class="card-number">
              <label for="card-number" class="label-default">Last name</label>
              <input type="text" name="card-number" id="card-number" class="input-default" value = "<?php  if(isset($data['user']->last_name)){echo $data['user']->last_name; } ?>" />
              <span></span>
            </div>
            <div class="card-number">
              <label for="card-number" class="label-default">Address</label>
              <input type="text" name="card-number" id="card-number" class="input-default" placeholder="House number and street name"/>
              <span></span>
              <br><br>
              <input type="text" name="card-number" id="card-number" class="input-default" placeholder="Apartment, suite, unit etc. (optional)" />
              <span></span>
            </div>
            <div class="card-number">
              <label for="card-number" class="label-default">Email</label>
              <input type="text" name="card-number" id="card-number" class="input-default" value = "<?php if(isset($data['user']->email)){echo $data['user']->email; } ?>" />
              <span></span>
            </div>

            <div class="input-flex">

              <div class="expire-date">
                <label for="expire-date" class="label-default">Phone No</label>

                <div class="input-flex">

                  <input type="text" name="day" id="expire-date"  class="input-default"  value="<?php if(isset($data['user']->contact_no)){echo $data['user']->contact_no;} ?>"/>
                  <span></span>
             

                </div>
              </div>
              
              <div class="expire-date">
                <label for="card-number" class="label-default">ZIP</label>  
                
                <div class="input-flex">
                 
                  <input type="text" name="day" id="expire-date" placeholder="31" min="1" max="31" class="input-default" />
                  <span></span>
             

                </div>
              </div>

            </div>

          </form>

        </div>

        <!-- <button class="btn btn-primary">
          <b>Pay</b> $ <span id="payAmount">2.15</span>
        </button> -->

      </section>


      <!--
        - cart section
      -->
      <section class="cart">

        <div class="cart-item-box">

          <h2 class="section-heading">Order Summary</h2>

          <div class="product-card">
      <?php foreach ($data['cart'] as $cart) : ?>
            <div class="card">

              <div class="img-box">
                <img src="./images/green-tomatoes.jpg" alt="" width="80px" class="product-img">
              </div>

              <div class="detail">

                <h4 class="product-name">
                  <?php echo $cart->product_name; ?></h4>

                <div class="wrapper">

                  <div class="product-qty">
                  

                    <span id="quantity"><?php echo $cart->quantity; ?>&times;</span>
                    <div class="price">
                  <span id="price"><?php echo $cart->product_price; ?></span>
                </div>
                  <?php $sum += $cart->quantity * $cart->product_price; ?>
              </div>

            </div>

            <button class="product-close-btn">
              <ion-icon name="close-outline"></ion-icon>
            </button>

          </div>
          
         
        </div>


        <?php endforeach; ?>
          

          <br/><br />

          <div class="amount">

            <div class="subtotal">
              <span>Subtotal</span> <span>$ <span id="subtotal"><?php echo $sum?></span></span>
            </div>

            <div class="tax">
              <span>Tax</span> <span>$ <span id="tax">0.10</span></span>
            </div>

            <div class="shipping">
              <span>Shipping</span> <span>$ <span id="shipping">0.00</span></span>
            </div>

            <hr>

            <div class="total">
              <span>Total</span> <span>$ <span id="total">2.15</span></span>
            </div>

          </div>
        

          <button class = "btn" onclick = "alertProcess()">
           Place an Order</a>
          </button>
      </section>

  
    
</div>
</div>
<div id="dialog-box" style="display: none;">
    
    <p>Are you sure you want confirm the order?</p>
    <button><a href="<?php echo URLROOT ?>/Cart/cashOnlyOrder">Yes</a></button>
    <button onclick="hideDialog()">No</button>
  </div>

<script>
  function alertProcess(){

    let inputs = document.querySelectorAll(".input-default");

    for(let i = 0; i < inputs.length; i++){
      let span = (inputs[i].nextElementSibling)
      span.textContent = "";
    }
    console.log(inputs)
   let flag = true;
    for(let i = 0; i < inputs.length; i++){
      let span = (inputs[i].nextElementSibling)
      if(inputs[i].value == ''){
        

        span.style.color = "red";
        flag = false;
       span.textContent = "Required*";

        
      }
    }
   

    if(flag == true)
    {(document.getElementById("dialog-box")).style.display = "block";}

  }

  function hideDialog(){
    document.getElementById("dialog-box").style.display = "none";
  }
  

</script>
<?php require APPROOT.'/views/Users/component/footer.php'?>
