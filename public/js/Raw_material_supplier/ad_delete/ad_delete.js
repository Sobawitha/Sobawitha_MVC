function popUpOpen(id) {
    const deletePopup = document.getElementById('deletePopup')
  //   document.getElementById('delete').addEventListener('click',() => deletePopup.showModal());

  document.getElementById('cancelbtn').addEventListener('click',() => deletePopup.close());
  deletePopup.showModal();
  document.getElementById('deletebtn').value=id;
  
}