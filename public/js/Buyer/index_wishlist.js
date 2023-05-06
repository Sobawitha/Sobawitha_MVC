let dlt = document.getElementById('remove');
let  cart_adder = document.getElementById('add');

cart_adder.addEventListener("click", function(e) {


    let id =  e.target.closest('.wishlist-item').querySelector('#remove').getAttribute("data-id");
    console.log(id);
    let  xhr  = new XMLHttpRequest();
    xhr.open('GET', "http://localhost/Sobawitha/wishlist/addToCart/"+encodeURIComponent(id));
    xhr.onload = function() {
             
        if (xhr.status === 200 && xhr.readyState === 4)
        {
         console.log(xhr.responseText);   
         let  user  =  'user-'+id;
         const userRow = document.getElementById(user); 
         userRow.parentNode.removeChild(userRow);
         popUpOpen();
         console.log(userRow); 
         
        }

        else{

            console.error(xhr.statusText);
        }

    }
    xhr.send();
    
}


)
dlt.addEventListener("click",function(e) {
    
    let id =  e.target.getAttribute("data-id");
    console.log(id);
    let  xhr  = new XMLHttpRequest();
    xhr.open('GET', "http://localhost/Sobawitha_MVC/wishlist/delete/"+encodeURIComponent(id));
    xhr.onload = function() {
             
        if (xhr.status === 200)
        {
         console.log(xhr.responseText);    
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

function popUpOpen() {
    const deletePopup = document.getElementById('deletePopup')
  //   document.getElementById('delete').addEventListener('click',() => deletePopup.showModal());

  document.getElementById('cancelbtn').addEventListener('click',() => deletePopup.close());
  deletePopup.showModal();
//   document.getElementById('deletebtn').value=id;
  
}