/*for search bar */
function open_cansel_btn(){
    document.getElementById("cansel").style.display='block';
}

function clear_search_bar(){
    document.querySelector(".search_cont").value='';
    document.getElementById("cansel").style.display='none';
}


/*start discussion */

function add_new_discussion(){
    document.querySelector('.add_forum').style.display = "block"    
}

function close_add_new_discussion_form(){
    document.querySelector('.add_forum').style.display = "none"    
}

function open_cansel_btn(){
    document.getElementById("cancel").style.display='block';
}

function clear_search_bar(){
    document.querySelector(".search_cont").value='';
    document.getElementById("cancel").style.display='none';
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


function edit_forum_post(id){
    document.getElementById(`forum_discription-${id}`).disabled = false;
    document.getElementById(`forum_discription-${id}`).style.backgroundColor = "rgb(241, 252, 237)";
    document.getElementById(`forum_discription-${id}`).focus();
    document.getElementById(`button_section-${id}`).style.display = "block";
    if(  document.getElementById(`upload_image_link-${id}`).disabled == true){
        document.getElementById(`upload_image_link-${id}`).disabled = false;
        document.getElementById(`upload_images-${id}`).style.display = "block";
    }
}

function cancel_edit(id){
    document.getElementById(`forum_discription-${id}`).disabled = true;
    document.getElementById(`forum_discription-${id}`).style.backgroundColor = "rgb(241, 252, 237)";
    document.getElementById(`button_section-${id}`).style.display = "none";
    if(  document.getElementById(`upload_image_link-${id}`).disabled == false){
        document.getElementById(`upload_image_link-${id}`).disabled = true;
        document.getElementById(`upload_images-${id}`).style.display = "none";
    }
    
}

function edit_forum_post_reply(id){
    document.getElementById(`forum_reply_discription-${id}`).disabled = false;
    document.getElementById(`forum_reply_discription-${id}`).style.backgroundColor = "rgb(241, 252, 237)";
    document.getElementById(`forum_reply_discription-${id}`).focus();
    document.getElementById(`reply_button_section-${id}`).style.display = "block";
    if(  document.getElementById(`upload_reply_image_link-${id}`).disabled == true){
        document.getElementById(`upload_reply_image_link-${id}`).disabled = false;
        document.getElementById(`upload_reply_images-${id}`).style.display = "block";
    }
}


/*change post image when it edit */
var loadFile_for_forumpost = function(event,id) {
	var image = document.getElementById(`upload_image-${id}`);
	image.src = URL.createObjectURL(event.target.files[0]);
};



/*reply image*/
var loadFile_for_reply = function(event,id) {
	var image = document.getElementById(`upload_reply_image-${id}`);
	image.src = URL.createObjectURL(event.target.files[0]);
};


/**limit no of characters in the line */
document.addEventListener("DOMContentLoaded", function(event) {
    var myInput = document.querySelector('.forum_discription');
    console.log(myInput.value);
    console.log(myInput.value.length);

    myInput.addEventListener('input', function() {
        console.log("call");
        if (myInput.value.length > 10) { // Limit to 10 characters per line
            myInput.value = myInput.value.substring(0, 10) + '\n' + myInput.value.substring(10);
        }
    });
});

/*for alert message */
window.onload = function() {
    create_blogpost_popup = document.getElementById("popup");
    document.getElementById("popup").style.display = "block";
    //Set timeout to hide popup after 5 seconds
    setTimeout(function() {
        create_blogpost_popup.style.display = "none";
    }, 5000);
  };


