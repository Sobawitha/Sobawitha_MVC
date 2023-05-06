// let val1 =  document.getElementById('increment');
// let val2 =  document.getElementById('decrement');
// let dlt = document.getElementById('cancel_order');
// let total_price = document.querySelector('.total_value');
// // Get the flash message element and its child elements





// dlt.addEventListener("click",function(e) {
    
//     let id =  e.target.getAttribute("data-id");
//     console.log(id);
//     let  xhr  = new XMLHttpRequest();
//     xhr.open('GET', "http://localhost/Sobawitha_MVC/cart/delete/"+encodeURIComponent(id));
//     xhr.onload = function() {
             
//         if (xhr.status === 200)
//         {
          
//          let  user  =  'user-'+id;
//          const userRow = document.getElementById(user); 
//          userRow.parentNode.removeChild(userRow);
//          console.log(userRow);
    
//         }

//         else{

//             console.error(xhr.statusText);
//         }

//     }
//     xhr.send();
    
// })







// val1.addEventListener('click', function(e) {
//        e.preventDefault();
//        let qty = val1.closest('.input-group-text').querySelector('.input-qty').value;
//        let prod_id =  val2.closest(".input-group-text").getAttribute("data-id");
//        let price =        val2.closest(".unit").previousElementSibling.innerText;
//        price = parseFloat(price);
//        console.log(qty);
//        let val    = parseInt(qty);
//        val = isNaN(val) ? 0 : val;

//        if(val  < 10)
//        {

//            val++;
//            console.log(val);
//            val1.closest('.input-group-text').querySelector('.input-qty').value = val
//            price = val*price;
      
//            val2.closest(".unit").nextElementSibling.querySelector('span').innerText = price;


//        }
       
//        let xhr =  new XMLHttpRequest();
//        xhr.open('GET',"http://localhost/Sobawitha_MVC/cart/updateQuantity/"+encodeURIComponent(val) + "/" + encodeURIComponent(prod_id));
//        xhr.onload =  function(){

//         if(xhr.readyState == 4 && xhr.status == 200)
//         {
                
//          console.log("Successfully updated ");
 
//         }
 
//         else{
    
//           console.error(xhr.statusText);
//         }
//     }
 
 
//     xhr.send();

   
// })
// val2.addEventListener('click',function(e) {

//    e.preventDefault();
//    let qty  = val2.closest('.input-group-text').querySelector('.input-qty').value;
//    let prod_id =  val2.closest(".input-group-text").getAttribute("data-id");
//    let price =        val2.closest(".unit").previousElementSibling.innerText;
//    price = parseFloat(price);
//    console.log(price);
//    console.log(prod_id +"Hello");
//    console.log(qty);
//    let val  = parseInt(qty);
//    val  =  isNaN(val) ? 0 : val;
//    if(val  > 0)
//    {
//        val--;
//        console.log(val);
//        val2.closest('.input-group-text').querySelector('.input-qty').value = val
//        price = val*price;
      
//        val2.closest(".unit").nextElementSibling.querySelector('span').innerText = price;
       
//    }

    

//    let xhr  = new XMLHttpRequest();
//    xhr.open('GET',"http://localhost/Sobawitha_MVC/cart/updateQuantity/"+encodeURIComponent(val) + "/" + encodeURIComponent(prod_id));

//    xhr.onload =  function() {

//        if(xhr.readyState == 4 && xhr.status == 200)
//        {
               
//         console.log("Successfully updated ");

//        }

//        else{
   
//          console.error(xhr.statusText);
//        }
//    }


//    xhr.send();
   
// })


console.log("Hefew");
let checkOutBtn = document.querySelector(".checkout");
console.log(checkOutBtn);
var orderElements = document.getElementsByClassName("order");
let checkBoxVal =  document.getElementById("checkvalue");
let val1 =  document.getElementById('increment');
let val2 =  document.getElementById('decrement');
let dlt = document.getElementById('cancel_order');
let total_price = document.querySelector('.total_value');
// Get the flash message element and its child elements
var flashMessage = document.querySelector('#flash-message');
var flashText = flashMessage.querySelector(".flash-text");
var flashLoading = flashMessage.querySelector(".flash-loading");

// Set the time for the message to disappear


// Show the message and loading animation
flashMessage.classList.add("show");


// Wait for the specified time and then hide the message
setTimeout(function(){
  flashMessage.classList.remove("show");
}, hideTime);






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




