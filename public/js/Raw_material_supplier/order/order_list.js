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

let ongoing_orders =  document.getElementById('ongoing_progress');
let completed_orders = document.getElementById('ongoing_ready');


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

    
    fetch("http://localhost/Sobawitha/purchase/getOrderDetails/0", {
        "method" : "GET",
        "headers": {
            "Content-Type": "application/x-www-form-urlencoded"
        }


}).then((response) => response.json()).then((data) => {
    
    let rows = '';
   
    data.forEach((order) => {

      let URL  =  `http://localhost/Sobawitha/purchase/generatePDF.php?order_id=${order.order_id}`
      ;
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