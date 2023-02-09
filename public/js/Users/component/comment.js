//for comment section
function open_save_cancel_btn(){
    document.querySelector(".btn").style.display='block';
}

function clear_comment(){
    document.querySelector(".comment-body").value='';
    document.querySelector(".btn").style.display='none';
}

function save_comment(){
    document.querySelector(".btn").style.display='none';
}



//for reply-section
function open_save_cancel_btns(id){
    document.getElementById(`btn-${id}`).style.display='block';
}

function open_replyform(id){
    document.getElementById(`reply_form-${id}`).style.display='block';
}

function clear_reply(id){
    document.getElementById(`reply-body-${id}`).value='';
    document.getElementById(`btn-${id}`).style.display='block';
}

function save_reply(id){
    document.getElementById(`btn-${id}`).style.display='none';
    
}
function display_reply(id){
    if(document.getElementById(`display_reply_all-${id}`).style.display=='none'){
        document.getElementById(`display_reply_all-${id}`).style.display='block';
        document.getElementById(`display_reply_btn_icon-${id}`).innerHTML=document.getElementById(`arrow_down-${id}`).innerHTML;

    }
    else{
        document.getElementById(`display_reply_all-${id}`).style.display='none';
        document.getElementById(`display_reply_btn_icon-${id}`).innerHTML=document.getElementById(`arrow_up-${id}`).innerHTML;
    }
}