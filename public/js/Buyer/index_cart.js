let val1 =  document.getElementById('increment');
let val2 =  document.getElementById('decrement');
let dlt = document.getElementById('cancel_order');
let total_price = document.querySelector('.total_value');
// Get the flash message element and its child elements





dlt.addEventListener("click",function(e) {
    
    let id =  e.target.getAttribute("data-id");
    console.log(id);
    let  xhr  = new XMLHttpRequest();
    xhr.open('GET', "http://localhost/Sobawitha_MVC/cart/delete/"+encodeURIComponent(id));
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
           val1.closest('.input-group-text').querySelector('.input-qty').value = val
           price = val*price;
      
           val2.closest(".unit").nextElementSibling.querySelector('span').innerText = price;


       }
       
       let xhr =  new XMLHttpRequest();
       xhr.open('GET',"http://localhost/Sobawitha_MVC/cart/updateQuantity/"+encodeURIComponent(val) + "/" + encodeURIComponent(prod_id));
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
       val2.closest('.input-group-text').querySelector('.input-qty').value = val
       price = val*price;
      
       val2.closest(".unit").nextElementSibling.querySelector('span').innerText = price;
       
   }

    

   let xhr  = new XMLHttpRequest();
   xhr.open('GET',"http://localhost/Sobawitha_MVC/cart/updateQuantity/"+encodeURIComponent(val) + "/" + encodeURIComponent(prod_id));

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


