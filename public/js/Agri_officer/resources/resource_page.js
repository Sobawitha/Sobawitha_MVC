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
    document.querySelector(".search_cont").placeholder='search by key-word';
    document.getElementById("cansel").style.display='none';
}

function setcolor(){
    document.querySelector(".search_cont").style.color='salmon';

}
