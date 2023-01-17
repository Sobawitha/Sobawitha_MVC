// function filter_change(id){
//     var category=document.getElementById(`tag_discription-${id}`).innerHTML;
//     var filterbtn=document.querySelector(".filter_btn");
//     document.getElementById('discription').innerHTML=category;
//     if(category=='Production'){
//         filterbtn.style.color='green';
//         filterbtn.style.border='1px solid green';
//     }
//     if(category=='Knowledge'){
//         filterbtn.style.color='rgb(134, 134, 53)';
//         filterbtn.style.border='1px solid rgb(134, 134, 53)';
//     }
//     if(category=='Innovations'){
//         filterbtn.style.color='crimson';
//         filterbtn.style.border='1px solid crimson';
//     }
//     if(category=='Other'){
//         filterbtn.style.color='rgb(9, 10, 84)';
//         filterbtn.style.border='1px solid rgb(9, 10, 84)';
//     }

// }

function set_default(){
var filterbtn=document.getElementById("filter");
document.getElementById('discription').innerHTML="All categories";
filterbtn.style.color='rgb(162, 162, 89)';
filterbtn.style.border='1px solid rgb(162, 162, 89)';

}


function open_cansel_btn(){
    document.getElementById("cansel").style.display='block';
}

function clear_search_bar(){
    document.querySelector(".search_cont").value='';
    document.getElementById("cansel").style.display='none';
}

function setcolor(){
    document.querySelector(".search_cont").style.color='salmon';
}