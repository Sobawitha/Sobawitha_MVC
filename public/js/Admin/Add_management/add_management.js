// alert();
// function open_cancel_btn(){
//     document.getElementById("cancel").style.display='block';
  
//   }
  
  function clear_search_bar(){
    document.getElementById("searchBar").value = "";
    document.getElementById("cancel").style.display='none';
  }

  function open_cancel_btn() {
    if (document.getElementById("searchBar").value !== "") {
        document.getElementById("cancel").style.display = "inline-block";
    }
    else {
        document.getElementById("cancel").style.display = "inline-block";
    }
  }