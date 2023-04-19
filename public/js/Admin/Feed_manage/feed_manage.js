// alert();
function popUpOpenFeedReview(receiver_nam,categoryy,rate,descc,datee) {

  document.getElementById('receiver-namee').value = receiver_nam;
  document.getElementById('feed_categoryy').value = categoryy;
  if(rate> 1){
    document.getElementById('ratingg').value = rate+' '+'Stars';
  }else{
    document.getElementById('ratingg').value = rate+' '+'Star';
  }
  
  document.getElementById('feedback-descriptionn').value = descc;
  document.getElementById('feedback-datee').value = datee;

  document.getElementById('feedback-details').showModal();
}


function popUpOpenFeedViewMore(receiver_name,category,rating,desc,date) {

  document.getElementById('receiver-name').value = receiver_name;
  document.getElementById('feed_category').value = category;
  if(rating > 1){
    document.getElementById('rating').value = rating+' '+'Stars';
  }else{
    document.getElementById('rating').value = rating+' '+'Star';
  }
  
  document.getElementById('feedback-description').value = desc;
  document.getElementById('feedback-date').value = date;

  document.getElementById('feedback-details-action').showModal();
}


function open_cancel_btn(){
  document.getElementById("cancel").style.display='block';

}

function clear_search_bar(){
  document.getElementById("searchBar").value = "";
  document.getElementById("cancel").style.display='none';

}

function reviewFeed() {
  document.getElementById('feedback-details').close();
} 

function rejectFeed() {
  document.getElementById('feedback-details').close();
} 

