// alert();
function popUpOpen() {
const addUserPopup = document.getElementById('addUserPopup')
  document.getElementById('addNewUser').addEventListener('click',() => addUserPopup.showModal());
  document.getElementById('closebtn').addEventListener('click',() => addUserPopup.close());
}

function open_cansel_btn(){
  document.getElementById("cansel").style.display='block';
}

function clear_search_bar(){
  document.querySelector(".search_cont").value='';
  document.getElementById("cansel").style.display='none';
}