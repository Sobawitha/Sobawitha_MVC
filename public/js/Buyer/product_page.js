let viewMore =  document.querySelector('.view_more'); 
let allBrands = document.querySelector('.all_brands');
const recentProductCardSection = document.querySelector('.recent_product_card_section');
let liveResults =  document.querySelector(".live-search-result");
console.log(recentProductCardSection);
let inputs = document.getElementsByTagName('input');
let search_input = document.querySelector(".search_cont input");
let list_input =  document.querySelector(".live-search-result .search-result");
let best_match =document.querySelector('.dropdown-content');
let  product_list = document.querySelectorAll('.adv_card');
const elements = document.querySelectorAll('[class*=fa-heart]');

console.log(elements.length)
elements.forEach(element => {
    element.addEventListener('click', () => {
        console.log(element.classList);
       if(element.classList.contains('fa-solid')){
        element.classList.remove('fa-solid');
        element.classList.add('fa-regular');

        let productID =  element.dataset.productId;
        console.log(productID);
        // Send an AJAX request to delete the product from the wishlist
        var xhr = new XMLHttpRequest();
        xhr.open('DELETE', `http://localhost/Sobawitha/wishlist/delete/${productID}`);
        xhr.onload = function() {
        if (xhr.status === 200) {
          console.log("successfully deleted");
        }
        else {
            alert('Request failed.  Returned status of ' + xhr.status);
        }
        };
        xhr.send();
    }
    else if(element.classList.contains('fa-regular')){
        element.classList.remove('fa-regular');
        element.classList.add('fa-solid');
        let productID =  element.dataset.productId;
        // Send an AJAX request to delete the product from the wishlist
        var xhr = new XMLHttpRequest();
        xhr.open('POST', `http://localhost/Sobawitha/wishlist/addToWishlist/${productID}`);
        xhr.onload = function() {
        if (xhr.status === 200) {
            // Reload the page or update the UI to reflect the removed product
            console.log("successfully added");
        }
        else {
            alert('Request failed.  Returned status of ' + xhr.status);
        }
        };
        xhr.send();
    }
})

});





// document.querySelectorAll('.dropdown-content a')[0].addEventListener('click', () => {

//   console.log("Hello");
//   let sorted_Cards_Asc = Array.from(product_list).sort((a,b) => {

//     var  price_a = Number(a.querySelector('.price').textContent);
//     var price_b = Number(b.querySelector('.price').textContent);
//     return price_a - price_b;
//   })
  
//   console.log(sorted_Cards_Asc)
//   recentProductCardSection.innerHTML = ''
//   sorted_Cards_Asc.forEach(card => {
  
//   recentProductCardSection.appendChild(card);



// })
// })

// document.querySelectorAll('.dropdown-content a')[1].addEventListener('click', () => {
//   console.log("Hello");
//   let sorted_Cards_Desc = Array.from(product_list).sort((a,b) => {

//     var  price_a = Number(a.querySelector('.price').textContent);
//     var price_b = Number(b.querySelector('.price').textContent);
//     return price_b - price_a;
//   })

//   console.log(sorted_Cards_Desc)
  
//   recentProductCardSection.innerHTML = ''
//   sorted_Cards_Desc.forEach(card => {
  
//   recentProductCardSection.appendChild(card);
  


// })
// })
    







// search_input.addEventListener("keyup", (e) => {
//   let search_input = e.target.value;
//   fetch(`http://localhost/Sobawitha/Users/search?keyword=${search_input}`,
//   {

//       method:'GET',
//       headers: {
//         "Content-Type": "application/json",
//         "Accept": "application/json"
//       }

//   }).then(response => response.json()).then(data =>
//     {  console.log(data);
//        let html = '<li>Search Results</li>';
//        let html2 ='';
//         if(data.length > 0){

//           for(let i = 0;i < 8;i++){
//             html += `
            
//             <a href="http://localhost/Sobawitha/fertilizer_product/view_individual_product?product_id=${data[i].Product_id}">
//              <li>${data[i].product_name}&nbsp(${data[i].manufacturer})${data[i].price}</li>
        
//             </a>
//             `
//             console.log("Hello"+data[i].Product_id);
//           }
//           for (let i = 0; i < data.length; i++) {
           
//             console.log(data);

//             html2 += `<div class="adv_card">
//             <a href="http://localhost/Sobawitha/fertilizer_product/view_individual_product?product_id=${data[i].Product_id}">
//             <div class="card_image" style="background: url(../images/${data[i].fertilizer_img}.jpg); background-size: cover;
//                                             height:75%;
//                                             -webkit-background-size:cover ;
//                                             background-position:center;
//                                             margin:0px;
//                                             padding:0px;">
//                 <div class="product_detail">
                  
//                     <span class="owner">${data[i].manufacturer}</span><br>
//                 </div>
//                 </a>
//             </div>

//             <i class="fa-regular fa-heart" id="heart"></i>

//             <div class="discription">
//                 <i class="fa-solid fa-star" id="star"></i>
//                 <i class="fa-solid fa-star" id="star"></i>
//                 <i class="fa-solid fa-star" id="star"></i>
//                 <i class="fa-regular fa-star" id="star"></i>
//                 <i class="fa-regular fa-star" id="star"></i>
//                 <span class="price">${data[i].price}</span>
                
//             </div>
//         </div>`


//             }
//         }
//         else{
//           // html += '<img src="Sobawitha/public/images/search_result.png" ></img>';
//           // html2 += '<h1 style = "text-align:center;color:green;">No results found</h1>';

//           html2 += '<div style="text-align: center;">';
//           html2 += '<h1 style="color: #9FA078;">No results found</h1>';
//           html2 += '<img src=".././public/images/search_result.png" alt="No results image" style="width:450px; height:450px" />';
//           html2 += '</div>';

//         }


//         liveResults.innerHTML = html;
//         recentProductCardSection.innerHTML = html2;
//     }
    
//     );

// });
// window.addEventListener('load', function() {
//     let inputs = document.getElementsByTagName('input');
//     for (let i = 0; i < inputs.length; i++) {
//       inputs[i].addEventListener('change', filterProducts);
//     }
//   });
  

function open_sorttype(){

    if(document.querySelector('.dropdown-content').style.display == "flex")
    {
      document.querySelector('.dropdown-content').style.display = "none"
    }
    else{
    document.querySelector('.dropdown-content').style.display = "flex" 
    }
}

viewMore.addEventListener("click", () =>{
    fetch("http://localhost/Sobawitha/pages/view_more/",
    {
        method: 'GET',
        headers: {
          'Content-Type': 'application/json'
        }
      }).then(response =>  response.json()).then(data => {
       
   
    for (let i = 2; i < data.length; i++){
      let label = document.createElement('label');
      label.setAttribute('for', 'brand_1');
      label.setAttribute('id', 'brand_1');
      let checkbox = document.createElement('input');
      checkbox.setAttribute('type', 'checkbox');
      checkbox.setAttribute('id', 'brand_1');
      checkbox.setAttribute('name', 'brands');
      checkbox.setAttribute('value', data[i].brand);
      label.appendChild(checkbox);
      label.appendChild(document.createTextNode(data[i].brand));
      allBrands.appendChild(label);
    }
    viewMore.style.display = "none";}).catch(error => console.error(error));
  });






// function getFilter(testingCriteria){
// let tests= [];
// const checkboxes = document.querySelectorAll(testingCriteria);


// for (let i = 0; i < checkboxes.length; i++) {
//     if(checkboxes[i].checked){

//    console.log(checkboxes[i].value);
//   tests.push(checkboxes[i].value);
  
  
//     }

// }
// console.log(tests.length);
// // log the list of checked brands
// return tests;

// }


// function filterProducts() {
//    var minPrice =  document.querySelectorAll('input[type="number"]')[0].value;
//    var maxPrice =  document.querySelectorAll('input[type="number"]')[1].value;
//    var brands =   getFilter('.all_brands input[type = "checkbox"]'); 
//    var type =   getFilter('.all_types input[type = "checkbox"]');

//    var quantity =  document.querySelector('.all_quantity input[type="radio"]').value;
//    var location = getFilter('.all_locations input[type = "checkbox"]');
   

//    let data = {
//     minPrice: minPrice,
//     maxPrice: maxPrice,
//     brands: brands,
//     type: type,
 
//     quantity: quantity,    
//     location: location
//    }
//    var  xhr =  new XMLHttpRequest();
//    xhr.open('POST',"http://localhost/Sobawitha/Users/filter_data" , true);
//    xhr.setRequestHeader('Content-Type', 'application/json');
   
//    xhr.onload = function () {

//      if(this.readyState == 4 && this.status == 200){
//         {
              
//               var results =  JSON.parse(this.responseText);
//                console.log(results);
//                 var html = '';

//                if(results.length > 0){
//                  console.log(results)
//                 for (let i = 0; i < results.length; i++) {


//               //     html +=`<div class="adv_card">
//               //     <div class="card_image" style="background: url(../images/${results[i].fertilizer_img}.jpg); background-size: cover;
//               //                                     height:75%;
//               //                                     -webkit-background-size:cover ;
//               //                                     background-position:center;
//               //                                     margin:0px;
//               //                                     padding:0px;">
//               //         <div class="product_detail">
//               //             <span class="product_name">${results[i].product_name}</span><br>
//               //             <span class="owner">${results[i].manufacturer}</span><br>
//               //         </div>
//               //     </div>
  
//               //     <i class="fa-regular fa-heart" id="heart"></i>
  
//               //     <div class="discription">
//               //         <i class="fa-solid fa-star" id="star"></i>
//               //         <i class="fa-solid fa-star" id="star"></i>
//               //         <i class="fa-solid fa-star" id="star"></i>
//               //         <i class="fa-regular fa-star" id="star"></i>
//               //         <i class="fa-regular fa-star" id="star"></i>
//               //         <span class="price">${results[i].price}</span>
                      
//               //     </div>
//               // </div>`

//                   html += `<div class="adv_card">
//                   <a href="http://localhost/Sobawitha/fertilizer_product/view_individual_product?product_id=${results[i].Product_id}"><div class="card_image" style="background: url(<?php echo URLROOT;?>/upload/fertilizer_images/${results[i].fertilizer_img}; background-size: cover);
//                                                               height:75%;
//                                                               -webkit-background-size:cover ;
//                                                               background-position:center;
//                                                               margin:0px;
//                                                               padding:0px;">
//                   <div class="product_detail">
//                       <span class="product_name">${results[i].product_name} </span><br>
//                       <span class="owner">${results[i].manufacturer}</span>
//                   </div>
//                   </a>
//                   </div>
                  
              
//                               <i class="fa-regular fa-heart" id="heart"></i>
              
//                               <div class="discription">
//                               <?php $avg_rating = round(${results[i].$avg_rating}); ?>
                             
//                               <?php 
//                               for ($i = 1; $i <= 5; $i++) {
//                               $checked = ($i <= $avg_rating) ? 'checked' : '';
//                               echo '<span class="fas fa-star ' . $checked . ' "></span>';
//                               }
//                               ?>
//                               <span class="price"> Rs.${results[i].price}</span>
//                               </div>
//                           </div>`
//                 }
//         }

//         else{
//             html += '<div style="text-align: center;">';
//             html += '<h1 style="color: #9FA078;">No results found</h1>';
//             html += '<img src=".././public/images/search_result.png" alt="No results image" style="width:450px; height:450px" />';
//             html += '</div>';

//         }

//         recentProductCardSection.innerHTML = html;

//     }

//     }

       
// }

// //sending the data to the server in json format
//  xhr.send(JSON.stringify(data));
// //we can sebd the data in form of urlencoded
// //in that case we have to use the following code 
// // xhr.send('brands='+brands+'&type='+type+'&price='+price+'&quantity='+quant+'&location='+location);
// }




function open_cansel_btn(){
  document.getElementById("cansel").style.display='block';
}


function clear_search_bar(){
  document.querySelector(".search_cont input[type = text]").value='';
  document.getElementById("cansel").style.display='none';
}





