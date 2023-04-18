// alert();
function popUpOpenCompViewMore(complaint) {
 
  document.getElementById('full-name').value = complaint.user_first_name + ' ' + complaint.user_last_name;
  document.getElementById('email').value = complaint.email;
  document.getElementById('complaint-type').value = complaint.type;
  document.getElementById('complaint-subject').value = complaint.subject;
  document.getElementById('complaint-description').value = complaint.discription;
  document.getElementById('complaint-date').value = complaint.created_at;

  document.getElementById('complaint-details').showModal();
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
    
    
    
         
    
    