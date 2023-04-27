// alert();






function open_cancel_btn(){
    document.getElementById("cancel").style.display='block';
  
  }
  
  function clear_search_bar(){
    document.getElementById("searchBar").value = "";
    document.getElementById("cancel").style.display='none';
  
  }


function popUpOpen(id) {
    const deletePopup = document.getElementById('deletePopup')
  //   document.getElementById('delete').addEventListener('click',() => deletePopup.showModal());

  document.getElementById('cancelbtn').addEventListener('click',() => deletePopup.close());
  deletePopup.showModal();
  document.getElementById('deletebtn').value=id;
  
}