// alert();






function open_cancel_btn(){
    document.getElementById("cancel").style.display='block';
  
  }
  
  function clear_search_bar(){
    document.getElementById("searchBar").value = "";
    document.getElementById("cancel").style.display='none';
  
  }


function popUpOpen(id,current_status) {
    const deletePopup = document.getElementById('deletePopup')

  deletePopup.showModal();
  document.getElementById('deletebtn').value=id;
  document.getElementById('fer_current_status').value=current_status;

  
}

function closepopup() {
  const deletePopup = document.getElementById('deletePopup')
  deletePopup.close();
}