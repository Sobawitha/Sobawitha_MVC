<?php require APPROOT . '/views/Users/component/Header.php'?>
<link rel="stylesheet" href="../css/Buyer/purchase/CheckOutPage.css"></link>
<!-- <script src="../js/Buyer/index_cart.js" defer></script> -->
<?php require APPROOT . '/views/Buyer/Buyer/buyer_topnavbar.php';?>
<?php require APPROOT . '/views/Buyer/Buyer/buyer_Sidebar.php';?>
<script src="https://js.stripe.com/v3/"></script>
<script src="../js/Buyer/index_checkOut.js" defer></script>
<div class="body">
<div class="section_1">
<section class="checkout">

<h2 class="section-heading">Payment Details   
   
 
</h2>



<div class="payment-form">

  <div class="payment-method">

    <button class="method selected">
    

      Credit Card/Debit Card  <div>
        <i class="fa fa-cc-visa" style="color:navy;"></i>
        <i class="fa fa-cc-amex" style="color:blue;"></i>
        <i class="fa fa-cc-mastercard" style="color:red;"></i>
        <i class="fa fa-cc-discover" style="color:orange;"></i>
      </div>

      
    </button>
    
</div>

  <form action="#">
   
       
    <div class="cardholder-name">
      <label for="cardholder-name" class="label-default">Cardholder name</label>
      <input type="text" name="cardholder-name" id="cardholder-name" class="input-default">
    </div>

    <div id="card-element"></div>

    

  </form>
  


<button class="btn btn-primary">
  <b>Pay</b> $ <span id="payAmount">2.15</span>
</button>
</div>
</section>


</div>


<div class="section_2"> 
  <br><br>
    <h1 class="heading">
      Checkout
    </h1>

    <!-- <div class="item-flex"> -->

      <!--
       - checkout section
      -->
    

      <!--
        - cart section
      -->
      <section class="cart">

        <div class="cart-item-box">

          <h2 class="section-heading">Order Summary</h2>

          <div class="product-card">

            <div class="card">

              <div class="img-box">
                <img src="./images/green-tomatoes.jpg" alt="" width="80px" class="product-img">
              </div>

              <div class="detail">

                <h4 class="product-name">Coconut Apm (W)1 Kilo</h4>

                <div class="wrapper">

                  <div class="product-qty">
                  

                    <span id="quantity">1&times;</span>


                  <div class="price">
                    <span id="price">$1.25</span>
                  </div>

                </div>

              </div>

              <button class="product-close-btn">
                <ion-icon name="close-outline"></ion-icon>
              </button>

            </div>

          </div>
          <div class="card">

            <div class="img-box">
              <img src="./images/green-tomatoes.jpg" alt="" width="80px" class="product-img">
            </div>

            <div class="detail">

              <h4 class="product-name">
                Home Garden APM (W) 1 Kilo</h4>

              <div class="wrapper">

                <div class="product-qty">
                

                  <span id="quantity">1&times;</span>


                <div class="price">
                  <span id="price">$1.25</span>
                </div>

              </div>

            </div>

            <button class="product-close-btn">
              <ion-icon name="close-outline"></ion-icon>
            </button>

          </div>

        </div>

          <div class="product-card">

            <div class="card">

              <div class="img-box">
                <img src="./images/cabbage.jpg" alt="" width="80px" class="product-img">
              </div>

              <div class="detail">

                <h4 class="product-name">Dolomite</h4>

                <div class="wrapper">

                  <div class="product-qty">
                  
                    <span id="quantity">1&times;</span>

            

                  <div class="price">
                    $ <span id="price">0.80</span>
                  </div>

               
        

                </div>

              </div>

              <button class="product-close-btn">
                <ion-icon name="close-outline"></ion-icon>
              </button>

            </div>

          </div>
          <br/><br />

          <div class="amount">

            <div class="subtotal">
              <span>Subtotal</span> <span>$ <span id="subtotal">2.05</span></span>
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
        </div>

     

      </section>

    </div>

  </main>




</div>

</div>
</div>


<?php require APPROOT . '/views/Users/component/footer.php'?>