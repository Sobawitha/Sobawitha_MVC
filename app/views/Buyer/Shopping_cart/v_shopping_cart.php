
<link rel="stylesheet" href="../css/Buyer/shopping_cart/shopping_cart.css"></link>

<?php require APPROOT . '/views/Users/component/Header.php'?>

<?php
$sum = 0;
if ($_SESSION['user_flag'] == 1) {
    require APPROOT . '/views/Admin/Admin/admin_topnavbar.php';
    require APPROOT . '/views/Admin/Admin/admin_Sidebar.php';
} else if ($_SESSION['user_flag'] == 2) {
    
    require APPROOT . '/views/Buyer/Buyer/buyer_topnavbar.php';
    require APPROOT . '/views/Buyer/Buyer/buyer_Sidebar.php';
} else if ($_SESSION['user_flag'] == 3) {
    require APPROOT . '/views/Seller/Seller/seller_topnavbar.php';
    require APPROOT . '/views/Seller/Seller/seller_Sidebar.php';
} else if ($_SESSION['user_flag'] == 4) {
    require APPROOT . '/views/Raw_material_supplier/Raw_material_supplier/supplier_topnavbar.php';
    require APPROOT . '/views/Raw_material_supplier/Raw_material_supplier/supplier_Sidebar.php';
} else if ($_SESSION['user_flag'] == 5) {
    require APPROOT . '/views/Agri_officer/Agri_officer/officer_topnavbar.php';
    require APPROOT . '/views/Agri_officer/Agri_officer/Officer_Sidebar.php';
}?>


<div class="body">
        <div class="section_1">

        </div>

        <div class="section_2">
         


  <?php if(isset($_SESSION['order_status']) && $_SESSION['order_status'] == 'success'): ?>
   <div id="flash-message" class="flash-success">
      <div class="flash-text">Your order was successful. Check your email for information.</div>
      <div class="flash-loading"></div>
   </div>
<?php elseif(isset($_SESSION['order_status']) && $_SESSION['order_status'] == 'failure'): ?>
   <div id="flash-message" class="flash-error">
      <div class="flash-text">Sorry, your order was unsuccessful. Please try again.</div>
      <div class="flash-loading"></div>
   </div>
<?php unset($_SESSION['order_status']); ?>
<?php endif; ?>





        <div class="order_list">
                <div class="orders">

                <table class="order_list_table">
                        <tr class="table_head">
                                <td>Product</td>
                                <td>Price</td>
                                <td>Qty</td>
                                <td>Total</td>
                                <td></td>
                        </tr>
                         <?php

foreach($data['cart'] as $cart):{
    ?>
                       <tr class="order" id = "user-<?php echo $cart->Product_id?>">
                                <div class="order_detail"  >
                                        <td>
                                            <div class="product_detail">
                                                <img src="http://localhost/Sobawitha/public/images/<?php echo $cart->product_img ?>" class="cart_image"></img>
                                                <i class="fa-solid fa-xmark" id="cancel_order" data-id="<?php echo $cart->Product_id ?>"></i><br><br>
                                                <span class="order_p_name"><?php echo $cart->product_name ?></span><br>
                                                <span class="order_p_id"><?php echo $cart->Product_id ?></span><br>
                                                <span class="size">500 g </span>
                                            </div>
                                        </td>
                                        <td><span class="price"><?php echo $cart->product_price ?></span></td>
                                        <td class="unit"><div class = "input-group-text"  data-id="<?php echo $cart->Product_id ?>"><button id = "decrement">-</button><input type="text" class = "input-qty "value = "<?php echo $cart->quantity?>" /><button id = "increment">+</button></div></td>
                                        <td><span class="tot_price"><?php echo $cart->product_price * $cart->quantity; $sum += $cart->product_price*$cart->quantity ?></span></td>

                                </div>

                        </tr>
                        <?php }?> 
<?php endforeach;?>
                       
                </table>


        </div>
    </div>
</div>

        <div class="section_3">
                <div class="total_price_section">
                        <hr id="cart_toatal_section_hr">
                        <span class="cart_total">Cart total <span class="total_value">Rs.<?php echo $sum ?></span></span><br>
                        <span class="discription">Shipping and taxes calculate at checkout.</span><br />
                        <input type="checkbox" name = "agree-terms" id  = "checkvalue" /><label class="agreement">I agree for <span class="term">terms & conditions</span></label><br><br>
                        <span id="terms_and_condition_check" >Please agree to the terms and conditions before proceeding to checkout.</span>
                        <button class="checkout">Online</button><br>
                        <button class="paypal"><a  href = "<?php  echo  URLROOT.'/Pages/orderpage'?>">Place an Order</a></button><br>
                        <i class="fa-solid fa-bag-shopping" id="bag"></i>
                </div>
        </div>









   



</div>
<script src="https://js.stripe.com/v3/" defer></script>
<script defer>
console.log("Hefew");
let checkOutBtn = document.querySelector(".checkout");
console.log(checkOutBtn);
var orderElements = document.getElementsByClassName("order");
let checkBoxVal =  document.getElementById("checkvalue");
let val1 =  document.getElementById('increment');
let val2 =  document.getElementById('decrement');
let dlt = document.getElementById('cancel_order');
let total_price = document.querySelector('.total_value');
let flashMessage =  document.getElementById('flash-message');

if (flashMessage) {
  // Select the elements within the flash message element
  var flashText = flashMessage.querySelector('.flash-text');
  var flashLoading = flashMessage.querySelector('.flash-loading');

  // Show the flash message by adding the "show" class
  flashMessage.classList.add('show');

  // Wait for the specified time and then hide the message
  setTimeout(function(){
    flashMessage.classList.remove('show');
  }, 5000);
}



dlt.addEventListener("click",function(e) {
    
    let id =  e.target.getAttribute("data-id");
    console.log(id);
    let  xhr  = new XMLHttpRequest();
    xhr.open('GET', `http://localhost/Sobawitha/cart/delete/${id}`);
    xhr.onload = function() {
             
        if (xhr.status === 200)
        {
          
         let  user  =  'user-'+id;
         const userRow = document.getElementById(user); 
         userRow.parentNode.removeChild(userRow);
         console.log(userRow);
    
        }

        else{

            console.error(xhr.statusText);
        }

    }
    xhr.send();
    
})







val1.addEventListener('click', function(e) {
  console.log("Hello");
       e.preventDefault();
       let qty = val1.closest('.input-group-text').querySelector('.input-qty').value;
       let prod_id =  val2.closest(".input-group-text").getAttribute("data-id");
       let price =        val2.closest(".unit").previousElementSibling.innerText;
       price = parseFloat(price);
       console.log(qty);
       let val    = parseInt(qty);
       val = isNaN(val) ? 0 : val;

       if(val  < 10)
       {

           val++;
           console.log(val);
           val1.closest('.input-group-text').querySelector('.input-qty').value = val;
           price = val*price;
      
           val2.closest(".unit").nextElementSibling.querySelector('span').innerText = price;


       }
       
       let xhr =  new XMLHttpRequest();
       xhr.open('GET',`http://localhost/Sobawitha/cart/updateQuantity/${val}/${prod_id}`);
       xhr.onload =  function(){

        if(xhr.readyState == 4 && xhr.status == 200)
        {
                
         console.log("Successfully updated ");
 
        }
 
        else{
    
          console.error(xhr.statusText);
        }
    }
 
 
    xhr.send();

   
})
val2.addEventListener('click',function(e) {
  console.log("Hello");
   e.preventDefault();
   let qty  = val2.closest('.input-group-text').querySelector('.input-qty').value;
   let prod_id =  val2.closest(".input-group-text").getAttribute("data-id");
   let price =        val2.closest(".unit").previousElementSibling.innerText;
   price = parseFloat(price);
   console.log(price);
   console.log(prod_id +"Hello");
   console.log(qty);
   let val  = parseInt(qty);
   val  =  isNaN(val) ? 0 : val;
   if(val  > 0)
   {
       val--;
       console.log(val);
       val2.closest('.input-group-text').querySelector('.input-qty').value = val;
       price = val*price;
      
       val2.closest(".unit").nextElementSibling.querySelector('span').innerText = price;
       
   }

    

   let xhr  = new XMLHttpRequest();
   xhr.open('GET',`http://localhost/Sobawitha/cart/updateQuantity/${val}/${prod_id}`);

   xhr.onload =  function() {

       if(xhr.readyState == 4 && xhr.status == 200)
       {
               
        console.log("Successfully updated ");

       }

       else{
   
         console.error(xhr.statusText);
       }
   }


   xhr.send();
   
})





checkOutBtn.addEventListener("click", async function () {
    let itemsToBuy = [];
   


    if(checkBoxVal.checked){
      console.log("Clicked the button");
  for (var i = 0; i < orderElements.length; i++) {
    var orderElement = orderElements[i];
    var productId = orderElement.getAttribute("id").split("-")[1];
    var productName = orderElement.getElementsByClassName("order_p_name")[0].innerText;
    var productPrice = parseFloat(orderElement.getElementsByClassName("price")[0].innerText);
    var quantity = parseInt(orderElement.getElementsByClassName("input-qty")[0].value);
    var total = parseFloat(orderElement.getElementsByClassName("tot_price")[0].innerText);
    

    var item = {
      productId: productId,
      productName: productName,
      productPrice: productPrice,
      quantity: quantity,
      total: total,
      

    };

  

    itemsToBuy.push(item);
  }

  const data = itemsToBuy;

  console.log(data);
  let sessionRequest = await fetch("http://localhost/Sobawitha/Cart/checkOut", {
    method: "POST",
    headers: {
      "Content-Type": "application/json",
      "Accept": "application/json"
    },
    body: JSON.stringify(
      data
     )
  });

  // Get the session data
  let session = await sessionRequest.json();
  console.log(session);
  // Redirect to Stripe Checkout
  stripe = new Stripe('pk_test_51MskWIIz6Y8hxLUJvtpGYLQGyi2MmZsfsPcVc989vHZ3HN6udWndjzWDkqP1QllvJRjzDUNmwapKzmyqzTYhKVc600LYFgrx7h');
  stripe.redirectToCheckout({
    sessionId: session.id,
    
  });
  

}





else{


    document.getElementById('terms_and_condition_check').style.display = "block";
  
  }



}
)


</script>



<?php require APPROOT . '/views/Users/component/footer.php'?>
