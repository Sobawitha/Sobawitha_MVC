let checkOutBtn = document.querySelector(".checkout");
let checkbox =  document.getElementById('checkvalue');
console.log(checkOutBtn);


var orderElements = document.getElementsByClassName("order");
let checkBoxVal =   document.getElementById("checkvalue").value;

checkOutBtn.addEventListener("click", async function () {
    let itemsToBuy = [];
   console.log("Clicked the button");


    if(checkbox.checked){
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

  const data = {
    items: itemsToBuy,
    checkboxvalue:checkBoxVal

  }

  let sessionRequest = await fetch("http://localhost/Sobawitha_MVC/Cart/checkOut", {
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