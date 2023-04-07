function open_cansel_btn(){
    document.getElementById("cansel").style.display='block';
}

function clear_search_bar(){
    document.querySelector(".search_cont").value='';
    document.getElementById("cansel").style.display='none';
}


function popUpOpen(id) {
    const deletePopup = document.getElementById('deletePopup')
  //   document.getElementById('delete').addEventListener('click',() => deletePopup.showModal());

  document.getElementById('cancelbtn').addEventListener('click',() => deletePopup.close());
  deletePopup.showModal();
  document.getElementById('deletebtn').value=id;
  
}