function openReportSection(){
    document.getElementByID('report_btn').style.display = "block"    
}

function add_new_discussion(){
    document.querySelector('.add_forum').style.display = "block"    
}

function close_add_new_discussion_form(){
    document.querySelector('.add_forum').style.display = "none"    
}

function open_cansel_btn(){
    document.getElementById("cansel").style.display='block';
}

function clear_search_bar(){
    document.querySelector(".search_cont").value='';
    document.getElementById("cansel").style.display='none';
}

function popUpOpen(id) {
  const deletePopup = document.getElementById('deletePopup')
  document.getElementById('cancelbtn').addEventListener('click',() => deletePopup.close());
  deletePopup.showModal();
  document.getElementById('deletebtn').value=id;
  
}


function reply_delete_popUpOpen(id) {
  const deletePopup = document.getElementById('deletereplyPopup')
  document.getElementById('canceldeletereplybtn').addEventListener('click',() => deletePopup.close());
  deletePopup.showModal();
  document.getElementById('deletereplybtn').value=id;
  
}

/*for reply */
function open_replyform(id){
    document.getElementById(`add_reply-${id}`).style.display='block';
}

function close_reply_form(id){
    document.getElementById(`add_reply-${id}`).style.display='none';  
}

function open_l2_replyform(id){
    document.getElementById(`add_l2_reply-${id}`).style.display='block';
}

function close_l2_reply_form(id){
    document.getElementById(`add_l2_reply-${id}`).style.display='none';  
}



function display_reply(id){
    if(document.getElementById(`display_all_replies-${id}`).style.display=='none'){
        document.getElementById(`display_all_replies-${id}`).style.display='block';
        document.getElementById(`display_reply_btn_icon-${id}`).innerHTML=document.getElementById(`arrow_down-${id}`).innerHTML;

    }
    else{
        document.getElementById(`display_all_replies-${id}`).style.display='none';
        document.getElementById(`display_reply_btn_icon-${id}`).innerHTML=document.getElementById(`arrow_up-${id}`).innerHTML;
    }
}