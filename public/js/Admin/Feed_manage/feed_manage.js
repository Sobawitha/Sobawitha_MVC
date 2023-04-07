// alert();
function open_cancel_btn(){
  const selectElement = document.getElementById('category');
  const selectedValue = selectElement.value;

  if (selectedValue === 'seller' || selectedValue === 'supplier') {
    document.getElementById("cancel").style.display='block';
  } else {
    document.getElementById("cancel").style.display='none';
  }
}

  function clear_search_bar(){
    document.getElementById("searchBar").value = "";
    document.getElementById("cancel").style.display='none';
  }

