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
    if(document.getElementById(`zoom_image-${id}`)){
      document.getElementById(`zoom_image-${id}`).style.display='none';
    }
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
    if(document.getElementById(`zoom_image_for_reply-${id}`)){
      document.getElementById(`zoom_image_for_reply-${id}`).style.display='none';
    }
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

function zoomimage_popup_open(image){
    const zoom_image_popup = document.getElementById('image_display_popup');
    document.getElementById('close_popup').addEventListener('click',() => zoom_image_popup.close());
    zoom_image_popup.showModal();
    var imageElement = document.getElementById('zoom_popup_image');
    var imgURL = ".././public/upload/forum_images/"+image;
    imageElement.setAttribute('src', imgURL); 
    
  // Get the image and the popup element
var img = document.getElementById("zoom_popup_image");
var popup = document.getElementById("image_display_popup");

// Set the initial zoom level and the maximum zoom level
var zoomLevel = 1;
var maxZoomLevel = 3;

// Set the zoom area to be the width and height of the popup element
var zoomAreaWidth = popup.offsetWidth;
var zoomAreaHeight = popup.offsetHeight;

// Add event listeners for zoom in and zoom out buttons
document.getElementById("zoom_in_btn").addEventListener("click", function() {
  if (zoomLevel < maxZoomLevel) {
    zoomLevel += 0.1;
    updateImageTransform();
  }
});

document.getElementById("zoom_out_btn").addEventListener("click", function() {
  if (zoomLevel > 1) {
    zoomLevel -= 0.1;
    updateImageTransform();
  }
});

//Add event listener to close the popup when the user clicks outside of the image
popup.addEventListener("click", function(e) {
  if (e.target === popup) {
    popup.style.display = "none";
  }
});

// Add event listeners for drag and drop functionality
var isDragging = false;
var dragStartX, dragStartY;

img.addEventListener("mousedown", function(e) {
  isDragging = true;
  dragStartX = e.clientX;
  dragStartY = e.clientY;
});

img.addEventListener("mousemove", function(e) {
  if (isDragging) {
    var dragX = e.clientX - dragStartX;
    var dragY = e.clientY - dragStartY;
    var imgRect = img.getBoundingClientRect();
    var popupRect = popup.getBoundingClientRect();
    var maxX = popupRect.width - imgRect.width;
    var maxY = popupRect.height - imgRect.height;
    var newX = Math.max(0, Math.min(imgRect.left + dragX, maxX));
    var newY = Math.max(0, Math.min(imgRect.top + dragY, maxY));
    img.style.left = newX + "px";
    img.style.top = newY + "px";
    dragStartX = e.clientX;
    dragStartY = e.clientY;
  }
});

img.addEventListener("mouseup", function(e) {
  isDragging = false;
});

// Function to update the transform of the image based on the current zoom level and zoom area
function updateImageTransform() {
  var zoomAreaLeft = (zoomAreaWidth - (zoomAreaWidth / zoomLevel)) / 2;
  var zoomAreaTop = (zoomAreaHeight - (zoomAreaHeight / zoomLevel)) / 2;

  img.style.transform = "scale(" + zoomLevel + ") translate(" + zoomAreaLeft + "px, " + zoomAreaTop + "px)";
}

}

/*alert message */
window.addEventListener('load', function() {
  var msgBox = document.querySelector('.error-msg');
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


/*for forum post */
document.getElementById("annousments_for_other").setAttribute("disabled", true);



