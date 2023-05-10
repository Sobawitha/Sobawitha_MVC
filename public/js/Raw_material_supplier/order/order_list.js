let ongoing_orders =  document.getElementById('ongoing_progress');
let completed_orders = document.getElementById('ongoing_ready');
const orderTypeRadio = document.querySelectorAll('input[type="radio"]:checked');


function open_cansel_btn(){
    document.getElementById("cansel").style.display='block';
}

function clear_search_bar(){
    document.querySelector(".search_cont").value='';
    document.getElementById("cansel").style.display='none';
}

function display_order_detail(){
    if(document.getElementById('order_more_details').style.display=='none'){
        document.getElementById('order_more_details').style.display='block';

    }
    else{
        document.getElementById('order_more_details').style.display='none';
    }
}



completed_orders.addEventListener('click',() =>
{
  console.log("completed");
// Step 1: Parse the JSON response data
fetch(`http://localhost/Sobawitha/purchase/getOrderDetails/1`, {
  "method" : "GET",
  headers: {
    "Content-Type": "application/x-www-form-urlencoded"
  }
}).then((response) => response.json()).then((data) => {
  // Step 2: Generate HTML table rows dynamically
  let rows = '';
  if(data.lenth > 0){
  Array.from(data).forEach((order) => {
    rows += `
      <tr class="order">
        <td><span class="p_name">${order.product_name}</span></td>
        <td><span class="amount">${order.seller_name}</span></td>
        <td class="unit"><span class="value">${order.order_id}</span></td>
        <td><span class="price">${order.date}</span></td>
        <td>
         
        <span class="disabled"><a href="/pdf/view-order?id=?>&type=buyer" class="link">Review</a></span>          
        </td>
        <td>
          <a href="/pdf/view-order?id=${order.order_id}&type=buyer" class="link">View Order</a>
        </td>
      </tr>
    `;
  });

  // Step 3: Replace the existing table rows with the new ones
  let orderListTable = document.querySelector('.order_list_table');
  let tableHead = orderListTable.querySelector('.table_head');
  orderListTable.innerHTML = '';
  orderListTable.appendChild(tableHead);
  orderListTable.innerHTML += rows;
}

else{
    
      let orderListTable = document.querySelector('.order_list_table');
      let tableHead = orderListTable.querySelector('.table_head');
      orderListTable.innerHTML = '';
      orderListTable.appendChild(tableHead);
      orderListTable.innerHTML += '<tr class="order" align = "center"><td colspan = "5" rowspan = "5">'+ "No Data Found" +'</td></tr>';
}
}).catch((err) => console.log(err));



}

);

ongoing_orders.addEventListener('click',() =>
{
        console.log("clicked");
    
    fetch("http://localhost/Sobawitha/purchase/getOrderDetails/0", {
        "method" : "GET",
        "headers": {
            "Content-Type": "application/x-www-form-urlencoded"
        }


}).then((response) => response.json()).then((data) => {
    
    let rows = '';
   
    data.forEach((order) => {

      let URL  =  'http://localhost/Sobawitha/purchase/generatePDF?order_id='+order.order_id;

      
      rows += `
        <tr class="order">
          <td><span class="p_name">${order.product_name}</span></td>
          <td><span class="amount">${order.seller_name}</span></td>
          <td class="unit"><span class="value">${order.order_id}</span></td>
          <td><span class="price">${order.date}</span></td>
         
          <td>
            <a href="${URL}" class="link">View Order</a>
          </td>
        </tr>
      `;
    });
  
    // Step 3: Replace the existing table rows with the new ones
    let orderListTable = document.querySelector('.order_list_table');
    let tableHead = orderListTable.querySelector('.table_head');
    orderListTable.innerHTML = '';
    orderListTable.appendChild(tableHead);
    orderListTable.innerHTML += rows;
  }




    ).catch((err) => console.log(err))
}
)

// get references to the search bar and the order list table
// const searchInput = document.querySelector('input[name="search_text"]');
// const orderTable = document.querySelector('.order_list_table');
// const orderTypeRadio = document.querySelectorAll('input[name="order_type"]');

// add an event listener to the search bar to handle keyup events
console.log(document.querySelector('.search_content input[type="text"]'));
(document.querySelector('.search_content')).addEventListener('keyup', (event) => {
  const searchText = event.target.value.trim();
  console.log(searchText);
 console.log("Hello World")

  if(ongoing_orders.checked){


  let orderType = 'ongoing';
  const xhr = new XMLHttpRequest();
  xhr.open('POST', "http://localhost/Sobawitha/purchase/SearchPurchases/");
  xhr.setRequestHeader('Content-Type', 'application/json');
  xhr.onload = () => {
    if (xhr.status === 200) {
      const searchResults = JSON.parse(xhr.responseText);
      let URL  =  'http://localhost/Sobawitha/purchase/generatePDF?order_id='+order.order_id;
  
      let tableRows = '';
    
      if (searchResults.length > 0) {
        searchResults.forEach(order => {
            
      tableRows += `
      <tr class="order">
        <td><span class="p_name">${order.product_name}</span></td>
        <td><span class="amount">${order.seller_name}</span></td>
        <td class="unit"><span class="value">${order.order_id}</span></td>
        <td><span class="price">${order.date}</span></td>
       
        <td>
          <a href="${URL}" class="link">View Order</a>
        </td>
      </tr>
    `;
  });


  orderTable.innerHTML = `
  <tr class="table_head">
    <td>Product Name</td>
    <td>Seller</td>
    <td>Order ID</td>
    <td>Date</td>
    <td>Actions</td>
  </tr>
  ${tableRows}
`;
} 
     
    

else{

  let orderListTable = document.querySelector('.order_list_table');
  let tableHead = orderListTable.querySelector('.table_head');
  orderListTable.innerHTML = '';
  orderListTable.appendChild(tableHead);
  orderListTable.innerHTML += '<tr class="order" align = "center"><td colspan = "5" rowspan = "5">'+ "No Data Found" +'</td></tr>';
}

}
  console.log(JSON.stringify({ searchText, orderType }));

  xhr.send(JSON.stringify({ searchText, orderType }));
}





  }


else if(completed_orders.checked){
  
  
  
}


});
