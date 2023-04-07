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

function updatepopUpOpen(id,email, type, subject, help) {
    const updatePopup = document.getElementById('updatePopup');
    document.getElementById('closebtn').addEventListener('click',() => updatePopup.close());
    updatePopup.showModal();
    document.getElementById('updatebutton').value=id;
    document.getElementById('email').placeholder=title;
    document.getElementById('type').placeholder=type;
    document.getElementById('subject').placeholder=subject;
    
  if(type == 'order_status_product_availability'){
      document.getElementById('order_status').checked = true;
  }
  else if(type=='account_access'){
      document.getElementById('account_access').checked = true;
  }
  else if(type=='technical_issues'){
      document.getElementById('technical_issues').checked = true;
  }
  else if(type=='buisness_partnership'){
      document.getElementById('buisness_partnership').checked = true;
  }
  else if(type=='legal_and_private_question'){
    document.getElementById('legal_and_private_question').checked = true;
  }
  else if(type=='payments'){
        document.getElementById('payments').checked = true;
  }
  document.getElementById('help').value=help;
  document.getElementById('updatebutton').value=id;
    
}