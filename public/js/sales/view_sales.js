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