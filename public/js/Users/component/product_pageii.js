
// let viewMore =  document.querySelector('.view_more'); 
// let allBrands = document.querySelector('.all_brands');
// const recentProductCardSection = document.querySelector('.recent_product_card_section');
// console.log(recentProductCardSection);
// let inputs = document.getElementsByTagName('input');


// window.addEventListener('load', function() {
//     let inputs = document.getElementsByTagName('input');
//     for (let i = 0; i < inputs.length; i++) {
//       inputs[i].addEventListener('change', filterProducts);
//     }
//   });
  

// function open_sorttype(){
//     document.querySelector('.dropdown-content').style.display = "flex" 
// }




// viewMore.addEventListener('click',() => {

// let request = new XMLHttpRequest();
// request.open('GET',`Sobawitha/Pages/view_more`,true);
// request.setRequestHeader('Content-type','application/x-www-form-urlencoded');
// request.onload = function(){
//     let html  = ''
//     if(request.status === 200 &&  request.readyState === 4){
//         let data = JSON.parse(request.responseText);
//         console.log(data);
        
//         for (let i = 2; i < data.length; i++) {
           
//             let label  =  document.createElement('label');
//             label.setAttribute('for','brand_1');
//             label.setAttribute('id','brand_1');
//             let checkbox = document.createElement('input');
//             checkbox.setAttribute('type','checkbox');
//             checkbox.setAttribute('id','brand_1');
//             checkbox.setAttribute('name','brands');
//             checkbox.setAttribute('value',data[i].brand);
//             label.appendChild(checkbox);
//             label.appendChild(document.createTextNode(data[i].brand));
//         }

//         allBrands.appendChild(label);
//         viewMore.style.display = "none";
//     }

// }
// request.send();
// })




// // get all checked input elements with id "brand_1"


// // loop through the selected elements and get their values
// function getFilter(testingCriteria){
// let tests= [];
// const checkboxes = document.querySelectorAll(testingCriteria);
// console.log(checkboxes);
// // let checkboxes = document.querySelectorAll(`input[id="${brand}"]:checked`); 

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
//               console.log(this.responseText);
//               var results =  JSON.parse(this.responseText);

//                 var html = '';

//                if(results.length > 0){
//                 console.log(results.length);
//                 for (let i = 0; i < results.length; i++) {


//                   html +=`<div class="adv_card">
//                   <div class="card_image" style="background: url(../images/${results[i].fertilizer_img}.jpg); background-size: cover;
//                                                   height:75%;
//                                                   -webkit-background-size:cover ;
//                                                   background-position:center;
//                                                   margin:0px;
//                                                   padding:0px;">
//                       <div class="product_detail">
//                           <span class="product_name">${results[i].product_name}</span><br>
//                           <span class="owner">${results[i].manufacturer}</span><br>
//                       </div>
//                   </div>
  
//                   <i class="fa-regular fa-heart" id="heart"></i>
  
//                   <div class="discription">
//                       <i class="fa-solid fa-star" id="star"></i>
//                       <i class="fa-solid fa-star" id="star"></i>
//                       <i class="fa-solid fa-star" id="star"></i>
//                       <i class="fa-regular fa-star" id="star"></i>
//                       <i class="fa-regular fa-star" id="star"></i>
//                       <span class="price">${results[i].price}</span>
                      
//                   </div>
//               </div>`







//                 }
//         }

//         else{
//             html += '<h1 style = {text-align:center}>No results found</h1>';
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





