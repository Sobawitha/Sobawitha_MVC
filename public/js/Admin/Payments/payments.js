// alert();



function popUpOpen() {
    const addUserPopup = document.getElementById('addUserPopup')
      document.getElementById('addNewUser').addEventListener('click',() => addUserPopup.showModal());
      document.getElementById('closebtn').addEventListener('click',() => addUserPopup.close());
    }
    
    function popUpOpenDelete() {
      const deactivateUserPopup = document.getElementById('deactivateUserPopup')
        document.getElementById('deactive_user_button').addEventListener('click',() => deactivateUserPopup.showModal());
        document.getElementById('closebtntwo').addEventListener('click',() => deactivateUserPopup.close());
    }
    
    
    function open_cancel_btn(){
      document.getElementById("cancel").style.display='block';
    
    }
    
    
    
         
    
    