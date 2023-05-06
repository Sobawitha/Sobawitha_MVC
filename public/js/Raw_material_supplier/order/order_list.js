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


function dataloader(data){



     if(data != "")
     {

        var formdata = new FormData();
        formdata.append('data',data);
        let request = new XMLHttpRequest();
        request.open('POST','');
        request.onreadystatechange = function(){
                let html = ""
               if(request.readyState == 4 && request.status == 200)
               {
                   let response = JSON.parse(request.responseText);
                    
                   if(response.length > 0){
                   for(var i = 0; i < response.length; i++)
                   {
                    html += '<tr class="order">';
                    html += '<td><span class="p_name">'+response[i].ProductName+'</span></td>'
                    html +=  '<td><span class="amount">'+response[i].OrderID +'</span></td>'
                    html += '<td class="unit">'+'<span class="value">'+response[i].SellerName+'</span></td>'
                    html +=   '<td><span class="amount">'+response[i].Date +'</span></td>'
                    // <td><span class="price">Rs. 1000 x 4</span></td>
                   
                    html +=  '<td><span class="delete">'+'View'+'</span><i class="fa-solid fa-circle-info" id="more_detail"></i></td>'
                    html += '</tr>';
                   }


               }
               else{
                  html += '<tr class="order">';
                  html += '<td colspan = "5">'+ "No Data Found" +'</td>'
                  html += '</tr>';


               }
               document.querySelector(".order_list_table").innerHTML += html;
            //    document.getElementById("counter").innerHTML = response.length;
            }

            else{

                document.querySelector(".order_list_table").innerHTML += '<tr class="order"><td colspan = "5">'+ "No Data Found" +'</td></tr>';
            }

        }

     }


}


