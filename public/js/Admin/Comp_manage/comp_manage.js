// alert();
function popUpOpenCompTakeAction(first_n,last_n,mail,typee,subjct,descr,datee) {
 
  document.getElementById('full-name').value = first_n + ' ' + last_n;
  document.getElementById('email').value = mail;
  document.getElementById('complaint-type').value = typee;
  document.getElementById('complaint-subject').value = subjct;
  document.getElementById('complaint-description').value = descr;
  document.getElementById('complaint-date').value = datee;

  document.getElementById('complaint-details-action').showModal();
}

function popUpOpenCompViewMore(first_name,last_name,email,type,subject,desc,date) {
 
  document.getElementById('full-namee').value = first_name + ' ' + last_name;
  document.getElementById('emaill').value = email;
  document.getElementById('complaint-typee').value = type;
  document.getElementById('complaint-subjectt').value = subject;
  document.getElementById('complaint-descriptionn').value = desc;
  document.getElementById('complaint-datee').value = date;

  document.getElementById('complaint-details').showModal();
}



function solveComplaint() {
  // Open mail client and pre-fill email details
  window.location.href = "mailto:" + document.getElementById('email').value + "?subject=Solved Complaint - " + document.getElementById('complaint-subject').value;

  document.getElementById('complaint-details').close();
} 

function popUpOpen() {
    const addUserPopup = document.getElementById('addUserPopup')
      document.getElementById('addNewUser').addEventListener('click',() => addUserPopup.showModal());
      document.getElementById('closebtn').addEventListener('click',() => addUserPopup.close());
    }
    
    // function popUpOpenCompViewMore() {
    //   const complaintDetails = document.getElementById('complaint-details')
    //     document.getElementById('view_more').addEventListener('click',() => complaintDetails.showModal());
    //     document.getElementById('closebtntwo').addEventListener('click',() => complaintDetails.close());
    // }
    
    
    function open_cancel_btn(){
      document.getElementById("cancel").style.display='block';
    
    }
    
    function clear_search_bar(){
      document.getElementById("searchBar").value = "";
      document.getElementById("cancel").style.display='none';
    
    }
  
    
    
    
         
    
    