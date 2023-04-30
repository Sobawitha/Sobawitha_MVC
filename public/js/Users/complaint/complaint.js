function open_cansel_btn(){
    document.getElementById("cansel").style.display='block';
}

function clear_search_bar(){
    document.querySelector(".search_cont").value='';
    document.getElementById("cansel").style.display='none';
}

function display_admin_reply(id){
    if(document.getElementById(`display_admin_reply-${id}`).style.display=='none'){
        document.getElementById(`display_admin_reply-${id}`).style.display='block';
        document.getElementById(`display_reply_btn_icon-${id}`).innerHTML=document.getElementById(`arrow_down-${id}`).innerHTML;

    }
    else{
        document.getElementById(`display_admin_reply-${id}`).style.display='none';
        document.getElementById(`display_reply_btn_icon-${id}`).innerHTML=document.getElementById(`arrow_up-${id}`).innerHTML;
    }
}

function popUpOpen(id) {
    const deletePopup = document.getElementById('deletePopup')
    document.getElementById('cancelbtn').addEventListener('click',() => deletePopup.close());
    deletePopup.showModal();
    document.getElementById('delete').value=id;
    
}

// function updatepopUpOpen(id,email, type, subject,help) {
//     const updatePopup = document.getElementById('updatePopup');
//     document.getElementById('closebtn').addEventListener('click',() => updatePopup.close());
//     updatePopup.showModal();
//     document.getElementById('updatebutton').value=id;
//     document.getElementById('email').value=email;
//     document.getElementById('type').value=type;
//     document.getElementById('subject').value=subject;
    
//   if(type == 'order_status_product_availability'){
//       document.getElementById('order_status').checked = true;
//   }
//   else if(type=='account_access'){
//       document.getElementById('account_access').checked = true;
//   }
//   else if(type=='technical_issues'){
//       document.getElementById('technical_issues').checked = true;
//   }
//   else if(type=='buisness_partnership'){
//       document.getElementById('buisness_partnership').checked = true;
//   }
//   else if(type=='legal_and_private_question'){
//     document.getElementById('legal_and_private_question').checked = true;
//   }
//   else if(type=='payments'){
//         document.getElementById('payments').checked = true;
//   }
//   document.getElementById('help').value=help;
//   document.getElementById('updatebutton').value=id;
    
// }


function updatepopUpOpen(id, email, type, subject, help) {
    const updatePopup = document.getElementById('updatePopup');
    document.getElementById('closebtn').addEventListener('click', () => updatePopup.close());
    updatePopup.showModal();
    document.getElementById('updatebutton').value = id;
    document.getElementById('email').value = email;
    document.getElementById('subject').value = subject;
    document.getElementById('help').value = help;
    
    if (type == 'order_status_product_availability') {
      document.getElementById('order_status').checked = true;
    } else if (type == 'account_access') {
      document.getElementById('account_access').checked = true;
    } else if (type == 'technical_issues') {
      document.getElementById('technical_issues').checked = true;
    } else if (type == 'business_partnership') {
      document.getElementById('business_partnership').checked = true;
    } else if (type == 'legal_and_private_question') {
      document.getElementById('legal_and_private_question').checked = true;
    } else if (type == 'payments') {
      document.getElementById('payments').checked = true;
    }
    
    document.getElementById('type').value = type;
    document.getElementById('updatebutton').value = id;
  }

/*for alert message */
// window.onload = function() {
//     create_blogpost_popup = document.getElementById("popup");
//     document.getElementById("popup").style.display = "block";
//     //Set timeout to hide popup after 5 seconds
//     setTimeout(function() {
//         create_blogpost_popup.style.display = "none";
//     }, 5000);
//   };



window.addEventListener('load', function() {
  var msgBox = document.querySelector('.success-msg');
  if (msgBox) {
    var progressBar = document.querySelector('.progress-bar');
    var width = 0;
    var intervalId = setInterval(function() {
      if (width >= 100) {
        clearInterval(intervalId);
        setTimeout(function() {
          msgBox.style.display = 'none';
          progressBar.style.display = 'none';
        }, 500);
      } else {
        width += 1;
        progressBar.style.width = width + '%';
      }
    }, 20);
  }
});